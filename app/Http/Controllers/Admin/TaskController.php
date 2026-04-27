<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'tasks' => Task::with('assignee')->orderBy('position')->get(),
            'users' => \App\Models\User::all(['id', 'name'])
        ];

        if ($request->wantsJson()) {
            return $data;
        }

        return view('admin.tasks.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'status' => 'nullable|string'
        ]);

        return Task::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'status' => $request->status ?? 'todo',
            'position' => Task::where('status', $request->status ?? 'todo')->count()
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->only('title', 'description', 'status', 'priority', 'assigned_to', 'position');
        
        // Handle Links
        if ($request->has('links')) {
            $links = $request->input('links');
            if (is_string($links)) {
                $linksArray = array_filter(array_map('trim', explode("\n", $links)));
                $data['links'] = array_values($linksArray);
            } else {
                $data['links'] = $links;
            }
        }

        // Handle File Attachments
        if ($request->hasFile('attachments')) {
            $attachments = $task->attachments ?? [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('tasks/attachments', 'public');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'url'  => \Illuminate\Support\Facades\Storage::url($path),
                    'type' => $file->getClientMimeType()
                ];
            }
            $data['attachments'] = $attachments;
        }

        // Handle Attachment Deletion
        if ($request->has('remove_attachments')) {
            $attachments = $task->attachments ?? [];
            $removeKeys = $request->input('remove_attachments');
            $removeKeys = is_array($removeKeys) ? $removeKeys : [$removeKeys];
            
            foreach ($removeKeys as $key) {
                if (isset($attachments[$key])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($attachments[$key]['path']);
                    unset($attachments[$key]);
                }
            }
            $data['attachments'] = array_values($attachments);
        }

        $originalAssignee = $task->assigned_to;
        $originalStatus = $task->status;

        $task->update($data);

        // Notification Logic
        if ($task->assigned_to && $task->assigned_to != $originalAssignee) {
            \App\Models\AdminNotification::create([
                'user_id' => $task->assigned_to,
                'type' => 'info',
                'title' => 'New Task Assigned',
                'message' => 'You have been assigned to task: ' . $task->title,
                'data' => ['task_id' => $task->id]
            ]);
        }

        if ($task->status === 'done' && $originalStatus !== 'done') {
            \App\Models\AdminNotification::create([
                'user_id' => null,
                'type' => 'success',
                'title' => 'Task Completed',
                'message' => 'Task has been marked as done: ' . $task->title,
                'data' => ['task_id' => $task->id]
            ]);
        }

        return $task->load('assignee');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['success' => true]);
    }
}
