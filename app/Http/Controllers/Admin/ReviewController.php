<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = \App\Models\Review::with(['reviewable', 'user'])->latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(\App\Models\Review $review)
    {
        $review->update(['is_approved' => true]);
        return back()->with('success', __('Review approved successfully.'));
    }

    public function destroy(\App\Models\Review $review)
    {
        $review->delete();
        return back()->with('success', __('Review deleted successfully.'));
    }
}
