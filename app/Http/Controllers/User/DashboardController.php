<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $stats = [
            'total_comments' => Comment::where('user_id', $user->id)->count(),
            'total_reviews'  => 0, // Will be updated if Review model exists
        ];

        // Load reviews count if Review model exists
        if (class_exists(\App\Models\Review::class)) {
            $stats['total_reviews'] = \App\Models\Review::where('user_id', $user->id)->count();
        }

        return view('user.dashboard', compact('stats', 'user'));
    }
}
