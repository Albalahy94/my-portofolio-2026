<?php

namespace App\Livewire;

use Livewire\Component;

class CommentsSection extends Component
{
    public $model; // Post or Project
    public $name = '';
    public $email = '';
    public $body = '';

    protected function rules()
    {
        return [
            'name' => auth()->check() ? 'nullable' : 'required|string|max:255',
            'email' => auth()->check() ? 'nullable' : 'required|email|max:255',
            'body' => 'required|string|min:5|max:1000',
        ];
    }

    public function mount($model)
    {
        $this->model = $model;
        if (auth()->check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
    }

    public function submitComment()
    {
        $this->validate();

        $comment = $this->model->comments()->create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body,
            'is_approved' => auth()->check() && auth()->user()->isAdmin() ? true : false,
        ]);

        if (!$comment->is_approved) {
            \Illuminate\Support\Facades\Notification::route('mail', 'ceo@albalahy4u.com')
                ->notify(new \App\Notifications\NewCommentPending($comment));

            // Notify Admins in Dashboard
            \App\Models\AdminNotification::create([
                'user_id' => null,
                'type' => 'info',
                'title' => 'New Comment Pending',
                'message' => 'New comment from ' . $this->name . ': "' . \Illuminate\Support\Str::limit($this->body, 50) . '"',
                'data' => [
                    'comment_id' => $comment->id,
                    'model_type' => get_class($this->model),
                    'model_id' => $this->model->id
                ]
            ]);
        }

        $this->reset(['body']);
        if (!auth()->check()) {
            $this->reset(['name', 'email']);
        }

        session()->flash('message', __('Your comment has been submitted and is pending approval.'));
    }

    public function render()
    {
        return view('livewire.comments-section', [
            'comments' => $this->model->comments()->where('is_approved', true)->latest()->get(),
        ]);
    }
}
