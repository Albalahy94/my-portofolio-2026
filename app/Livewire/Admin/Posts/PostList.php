<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class PostList extends Component
{
    use WithPagination;

    public $status = '';

    public function mount()
    {
        $this->status = request('status', '');
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    #[On('confirm-delete')]
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم حذف المقال بنجاح.']]);
    }

    #[On('confirm-restore')]
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم استعادة المقال بنجاح.']]);
    }

    #[On('confirm-force-delete')]
    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        
        if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }
        
        $post->forceDelete();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم حذف المقال نهائياً.']]);
    }

    public function render()
    {
        if ($this->status === 'trashed') {
            $posts = Post::with('user')->onlyTrashed()->latest()->paginate(10);
        } else {
            $posts = Post::with('user')->latest()->paginate(10);
        }

        return view('livewire.admin.posts.post-list', compact('posts'))->layout('layouts.app');
    }
}
