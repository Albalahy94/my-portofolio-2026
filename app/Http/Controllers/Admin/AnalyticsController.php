<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        $days = 30;
        $startDate = Carbon::now()->subDays($days);

        // 1. Visits over time (Last 30 days)
        $visitsOverTime = Visit::real()
            ->where('created_at', '>=', $startDate)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 2. Top Countries
        $topCountries = Visit::real()
            ->select('country_name', 'country_code', DB::raw('count(*) as count'))
            ->whereNotNull('country_name')
            ->groupBy('country_name', 'country_code')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // 3. Top Pages
        $topPages = Visit::real()
            ->select('url', DB::raw('count(*) as count'))
            ->groupBy('url')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // 4. Device Distribution
        $devices = Visit::real()
            ->select('device', DB::raw('count(*) as count'))
            ->groupBy('device')
            ->get();

        // 5. Browser Distribution
        $browsers = Visit::real()
            ->select('browser', DB::raw('count(*) as count'))
            ->groupBy('browser')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        // 6. Keywords/Referrers (SEO Insight)
        $referrers = Visit::real()
            ->select('referer', DB::raw('count(*) as count'))
            ->whereNotNull('referer')
            ->groupBy('referer')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // Extract keywords from referrers where possible
        $keywords = Visit::real()
            ->where('referer', 'like', '%q=%')
            ->orWhere('referer', 'like', '%query=%')
            ->get()
            ->map(function ($visit) {
                parse_str(parse_url($visit->referer, PHP_URL_QUERY), $query);
                return $query['q'] ?? $query['query'] ?? null;
            })
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10);

        // 7. Unique Sessions
        $uniqueSessions = Visit::real()
            ->where('created_at', '>=', $startDate)
            ->distinct('session_id')
            ->count('session_id');

        // 8. Time of Day Distribution
        // SQLite uses strftime('%H', created_at), MySQL uses HOUR(created_at).
        // For compatibility (Laravel abstracting it is tricky with raw), we can pull down last week's and group in PHP or use standard raw.
        // Given we might be on MySQL/MariaDB: DB::raw('HOUR(created_at) as hour')
        // We'll use get() and group in PHP to be safe from DB engine differences for something small like 30 days of data.
        $timeOfDay = Visit::real()
            ->where('created_at', '>=', Carbon::now()->subDays(7)) // Last 7 days for hour trends
            ->get()
            ->groupBy(function($visit) {
                return Carbon::parse($visit->created_at)->format('H'); // Hour 00-23
            })
            ->map->count();
        
        // Ensure all 24 hours exist
        $hourlyData = [];
        for ($i = 0; $i < 24; $i++) {
            $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
            $hourlyData[$hour] = $timeOfDay->get($hour, 0);
        }
        ksort($hourlyData);

        return view('admin.analytics', compact(
            'visitsOverTime', 
            'topCountries', 
            'topPages', 
            'devices', 
            'browsers', 
            'referrers',
            'keywords',
            'uniqueSessions',
            'hourlyData'
        ));
    }
}
