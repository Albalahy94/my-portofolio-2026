<?php

namespace App\Services;

use App\Models\Visit;
use App\Models\AdminNotification;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InsightService
{
    /**
     * Generate smart insights based on traffic data.
     */
    public function generateInsights()
    {
        $this->checkGeoSpikes();
        $this->checkTrendingPosts();
        $this->checkMilestones();
    }

    protected function checkGeoSpikes()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $stats = Visit::real()
            ->select('country_name', DB::raw('count(*) as count'))
            ->whereDate('created_at', $today)
            ->groupBy('country_name')
            ->get();

        foreach ($stats as $stat) {
            if (!$stat->country_name) continue;

            $yesterdayCount = Visit::real()
                ->where('country_name', $stat->country_name)
                ->whereDate('created_at', $yesterday)
                ->count();

            if ($yesterdayCount > 0 && $stat->count > $yesterdayCount * 1.5) {
                $increase = round((($stat->count - $yesterdayCount) / $yesterdayCount) * 100);
                
                AdminNotification::firstOrCreate([
                    'type' => 'trend',
                    'title' => "Traffic Spike from {$stat->country_name}",
                    'message' => "Visitors from {$stat->country_name} increased by {$increase}% today ({$stat->count} vs {$yesterdayCount} yesterday).",
                    'data' => ['country' => $stat->country_name, 'increase' => $increase],
                    'created_at' => Carbon::now()
                ]);
            }
        }
    }

    protected function checkTrendingPosts()
    {
        // Simple logic: Posts with more than 10 hits in the last 6 hours
        $threshold = 10;
        $sixHoursAgo = Carbon::now()->subHours(6);

        $trending = Visit::real()
            ->select('url', DB::raw('count(*) as count'))
            ->where('created_at', '>=', $sixHoursAgo)
            ->where('url', 'like', '%/blog/%')
            ->groupBy('url')
            ->having('count', '>', $threshold)
            ->get();

        foreach ($trending as $item) {
            $slug = last(explode('/', $item->url));
            $post = Post::where('slug', $slug)->first();

            if ($post) {
                AdminNotification::firstOrCreate([
                    'type' => 'success',
                    'title' => "Trending Post: {$post->title}",
                    'message' => "This article is getting unusual attention right now with {$item->count} visits in the last 6 hours.",
                    'data' => ['post_id' => $post->id, 'hits' => $item->count],
                    'created_at' => Carbon::now()
                ]);
            }
        }
    }

    protected function checkMilestones()
    {
        $totalVisits = Visit::real()->count();
        $milestones = [100, 500, 1000, 5000, 10000];

        foreach ($milestones as $m) {
            if ($totalVisits >= $m && $totalVisits < $m + 10) { // Small window to prevent duplicates
                AdminNotification::firstOrCreate([
                    'type' => 'milestone',
                    'title' => "New Milestone Reached!",
                    'message' => "Congratulations! Your site has reached {$m} total real visitors.",
                    'data' => ['milestone' => $m],
                    'created_at' => Carbon::now()
                ]);
            }
        }
    }
}
