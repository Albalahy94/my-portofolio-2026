<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Services\MediaService;

class PostForm extends Component
{
    use WithFileUploads;

    public ?Post $post = null;

    public $title = '';
    public $slug = '';
    public $excerpt = '';
    public $content = '';
    public $is_published = false;
    public $published_at = null;
    public $selectedCategories = [];
    /** @var \Illuminate\Http\UploadedFile|string|null */
    public $featured_image;

    public function mount(Post $post = null)
    {
        if ($post && $post->exists) {
            $this->post = $post;
            $this->title = $post->getTrans('title');
            $this->slug = $post->slug;
            $this->excerpt = $post->getTrans('excerpt');
            $this->content = $post->getTrans('content');
            $this->is_published = (bool)$post->is_published;
            $this->published_at = $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : null;
            $this->selectedCategories = $post->categories()->pluck('categories.id')->toArray();
        }
    }

    public function updatedTitle()
    {
        if (!$this->post || !$this->post->exists) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function save(MediaService $mediaService)
    {
        $rules = [
            'title' => 'required|max:255',
            'content' => 'required',
            'slug' => 'required|unique:posts,slug,' . ($this->post ? $this->post->id : ''),
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'selectedCategories' => 'array',
            'selectedCategories.*' => 'exists:categories,id',
        ];

        $this->validate($rules);

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'user_id' => auth()->id() ?? 1,
        ];

        if ($this->is_published && !$this->published_at && (!$this->post || !$this->post->published_at)) {
            $data['published_at'] = now();
        } elseif ($this->published_at) {
            $data['published_at'] = $this->published_at;
        } elseif (!$this->is_published) {
            $data['published_at'] = null;
        }

        if ($this->featured_image) {
            if ($this->post && $this->post->featured_image) {
                $mediaService->delete($this->post->featured_image);
            }
            /** @var \Illuminate\Http\UploadedFile $file */
            $file = $this->featured_image;
            $data['featured_image'] = $mediaService->process($file, 'posts');
        }

        if ($this->post && $this->post->exists) {
            $this->post->update($data);
            $message = 'تم تحديث المقال بنجاح.';
        } else {
            $this->post = Post::create($data);
            $message = 'تم إنشاء المقال بنجاح.';
        }

        if (!empty($this->selectedCategories)) {
            $this->post->categories()->sync($this->selectedCategories);
        } else {
            $this->post->categories()->detach();
        }

        $this->dispatch('toast', [['icon' => 'success', 'title' => $message]]);
        $this->redirectRoute('admin.posts.index', navigate: true);
    }

    public function removeMainTempImage()
    {
        $this->featured_image = null;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.posts.post-form', compact('categories'))->layout('layouts.app');
    }
}
