<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = AdminNotification::where(function ($q) use ($user) {
            $q->whereNull('user_id')->orWhere('user_id', $user->id);
        })->orderBy('created_at', 'desc');

        if ($request->has('type') && $request->type != 'all') {
            $query->where('type', $request->type);
        }

        if ($request->has('status')) {
            if ($request->status == 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status == 'read') {
                $query->where('is_read', true);
            }
        }

        $notifications = $query->paginate(15);
        
        if ($request->wantsJson()) {
            return $notifications;
        }

        return view('admin.notifications.index', compact('notifications'));
    }

    public function markAsRead(AdminNotification $notification)
    {
        $notification->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        $user = auth()->user();
        AdminNotification::where('is_read', false)
            ->where(function ($q) use ($user) {
                $q->whereNull('user_id')->orWhere('user_id', $user->id);
            })
            ->update(['is_read' => true]);
        return back()->with('success', 'All notifications marked as read.');
    }

    public function destroy(AdminNotification $notification)
    {
        $notification->delete();
        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $user = auth()->user();
        $query = AdminNotification::where('is_read', false)
            ->where(function ($q) use ($user) {
                $q->whereNull('user_id')->orWhere('user_id', $user->id);
            });

        return response()->json([
            'count' => $query->count(),
            'latest' => (clone $query)->latest()->take(5)->get()
        ]);
    }
}
