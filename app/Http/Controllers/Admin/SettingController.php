<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $activeTheme = Setting::where('key', 'active_theme')->value('value') ?? 'default';
        $themes = config('themes');
        return view('admin.settings.index', compact('activeTheme', 'themes'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'required|string',
        ]);

        Setting::updateOrCreate(
            ['key' => 'active_theme'],
            ['value' => $validated['theme']]
        );

        // Optional: Clear cache if you cache config
        // Artisan::call('config:clear');

        return redirect()->back()->with('success', 'Theme updated successfully.');
    }
}
