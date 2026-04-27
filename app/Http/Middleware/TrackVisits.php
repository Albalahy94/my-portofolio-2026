<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Track only GET requests to public routes
        if ($request->isMethod('GET') && !$request->is('admin*') && !$request->ajax()) {
            $this->track($request);
        }

        return $response;
    }

    protected function track(Request $request): void
    {
        $userAgent = $request->header('User-Agent');
        $isBot = $this->isBot($userAgent);

        // Simple Geo-IP (Only for non-bots to save performance/limits)
        $geoData = ['country_code' => null, 'country_name' => null, 'city' => null];
        if (!$isBot && !in_array($request->ip(), ['127.0.0.1', '::1'])) {
            try {
                $response = Http::timeout(2)->get("http://ip-api.com/json/{$request->ip()}?fields=status,country,countryCode,city");
                if ($response->successful() && $response->json('status') === 'success') {
                    $geoData = [
                        'country_code' => $response->json('countryCode'),
                        'country_name' => $response->json('country'),
                        'city' => $response->json('city'),
                    ];
                }
            } catch (\Exception $e) {
                // Ignore geo errors
            }
        }

        // Track session ID for grouping unique visits
        if (!$request->session()->has('visit_session_id')) {
            $request->session()->put('visit_session_id', Str::uuid()->toString());
        }
        $sessionId = $request->session()->get('visit_session_id');

        Visit::create([
            'ip_address' => $request->ip(),
            'session_id' => $sessionId,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'referer' => $request->header('referer'),
            'user_agent' => $userAgent,
            'country_code' => $geoData['country_code'],
            'country_name' => $geoData['country_name'],
            'city' => $geoData['city'],
            'device' => $this->getDevice($userAgent),
            'browser' => $this->getBrowser($userAgent),
            'platform' => $this->getPlatform($userAgent),
            'is_bot' => $isBot,
        ]);
    }

    protected function isBot(?string $userAgent): bool
    {
        if (!$userAgent) return false;
        return (bool) preg_match('/bot|crawl|slurp|spider|mediapartners/i', $userAgent);
    }

    protected function getDevice(string $userAgent): string
    {
        if (preg_match('/tablet|ipad/i', $userAgent)) return 'tablet';
        if (preg_match('/mobile|iphone|android|phone/i', $userAgent)) return 'mobile';
        return 'desktop';
    }

    protected function getBrowser(string $userAgent): string
    {
        if (preg_match('/msie|trident/i', $userAgent)) return 'IE';
        if (preg_match('/firefox/i', $userAgent)) return 'Firefox';
        if (preg_match('/safari/i', $userAgent) && !preg_match('/chrome/i', $userAgent)) return 'Safari';
        if (preg_match('/chrome/i', $userAgent)) return 'Chrome';
        if (preg_match('/opera|opr/i', $userAgent)) return 'Opera';
        if (preg_match('/edge/i', $userAgent)) return 'Edge';
        return 'Unknown';
    }

    protected function getPlatform(string $userAgent): string
    {
        if (preg_match('/windows/i', $userAgent)) return 'Windows';
        if (preg_match('/linux/i', $userAgent)) return 'Linux';
        if (preg_match('/macintosh|mac os x/i', $userAgent)) return 'macOS';
        if (preg_match('/android/i', $userAgent)) return 'Android';
        if (preg_match('/iphone|ipad|ipod/i', $userAgent)) return 'iOS';
        return 'Unknown';
    }
}
