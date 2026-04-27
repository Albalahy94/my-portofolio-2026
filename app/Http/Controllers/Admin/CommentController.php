<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = \App\Models\Comment::with(['commentable', 'user'])->latest()->paginate(15);
        return view('admin.comments.index', compact('comments'));
    }

    public function approve(\App\Models\Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        return back()->with('success', __('Comment approved successfully.'));
    }

    public function destroy(\App\Models\Comment $comment)
    {
        $comment->delete();
        return back()->with('success', __('Comment deleted successfully.'));
    }
}
