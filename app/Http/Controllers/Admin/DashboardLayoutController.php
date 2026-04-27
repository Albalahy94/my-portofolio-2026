<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardLayoutController extends Controller
{
    /**
     * Save the dashboard layout for the authenticated user.
     */
    public function update(Request $request)
    {
        $request->validate([
            'layout' => 'required|array',
        ]);

        $user = auth()->user();
        $user->dashboard_layout = $request->layout;
        $user->save();

        return response()->json(['success' => true]);
    }
}
