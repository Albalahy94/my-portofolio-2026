<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share active theme with all views
        try {
            $activeThemeKey = \App\Models\Setting::where('key', 'active_theme')->value('value') ?? 'default';
            $themes = config('themes');
            $activeTheme = $themes[$activeThemeKey] ?? $themes['default'];
            
            view()->share('activeTheme', $activeTheme);
        } catch (\Exception $e) {
            // Fallback if DB not ready or migration running
            view()->share('activeTheme', config('themes.default'));
        }
    }
}
