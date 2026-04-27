<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Services\MediaService;

class ProjectForm extends Component
{
    use WithFileUploads;

    public ?Project $project = null;

    public $title_ar = '';
    public $title_en = '';
    public $slug = '';
    public $type = 'programming';
    public $description_ar = '';
    public $description_en = '';
    public $content_ar = '';
    public $content_en = '';
    public $is_published = false;
    public $published_at = null;
    public $selectedTags = [];
    /** @var \Illuminate\Http\UploadedFile|string|null */
    public $image; 
    /** @var \Illuminate\Http\UploadedFile[] */
    public $images = []; 

    public function mount(Project $project = null)
    {
        if ($project && $project->exists) {
            $this->project = $project;
            $this->title_ar = $this->project->title['ar'] ?? '';
            $this->title_en = $this->project->title['en'] ?? '';
            $this->slug = $project->slug;
            $this->type = $project->type;
            $this->description_ar = $this->project->description['ar'] ?? '';
            $this->description_en = $this->project->description['en'] ?? '';
            $this->content_ar = $this->project->content['ar'] ?? '';
            $this->content_en = $this->project->content['en'] ?? '';
            $this->is_published = (bool)$project->is_published;
            $this->published_at = $project->published_at ? $project->published_at->format('Y-m-d\TH:i') : null;
            $this->selectedTags = $project->tags->pluck('id')->toArray();
        }
    }

    public function updatedTitleAr()
    {
        if (!$this->project || !$this->project->exists) {
            $this->slug = Str::slug($this->title_ar);
        }
    }

    public function save(MediaService $mediaService)
    {
        $rules = [
            'title_ar' => 'required',
            'title_en' => 'nullable',
            'slug' => 'required|unique:projects,slug,' . ($this->project ? $this->project->id : ''),
            'type' => 'required|in:programming,life',
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'content_ar' => 'nullable',
            'content_en' => 'nullable',
            'selectedTags' => 'array',
            'selectedTags.*' => 'exists:tags,id',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'image|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'title' => ['ar' => $this->title_ar, 'en' => $this->title_en],
            'slug' => $this->slug,
            'type' => $this->type,
            'description' => ['ar' => $this->description_ar, 'en' => $this->description_en],
            'content' => ['ar' => $this->content_ar, 'en' => $this->content_en],
            'is_published' => $this->is_published,
        ];

        if ($this->is_published && !$this->published_at && (!$this->project || !$this->project->published_at)) {
            $data['published_at'] = now();
        } elseif ($this->published_at) {
            $data['published_at'] = $this->published_at;
        } elseif (!$this->is_published) {
            $data['published_at'] = null;
        }

        if ($this->image) {
            if ($this->project && $this->project->image) {
                $mediaService->delete($this->project->image);
            }
            $data['image'] = $mediaService->process($this->image, 'projects');
        }

        if ($this->project && $this->project->exists) {
            $this->project->update($data);
            $message = 'تم تحديث المشروع بنجاح.';
        } else {
            $this->project = Project::create($data);
            $message = 'تم إنشاء المشروع بنجاح.';
        }

        if (!empty($this->images)) {
            foreach($this->images as $file) {
                $path = $mediaService->process($file, 'project_images');
                $this->project->images()->create(['image' => $path]);
            }
        }

        if (!empty($this->selectedTags)) {
            $this->project->tags()->sync($this->selectedTags);
        } else {
            $this->project->tags()->detach();
        }

        $this->dispatch('toast', [['icon' => 'success', 'title' => $message]]);
        $this->redirectRoute('admin.projects.index', navigate: true);
    }

    public function deleteGalleryImage($id)
    {
        $image = \App\Models\ProjectImage::findOrFail($id);
        if ($this->project && $image->project_id === $this->project->id) {
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($image->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($image->image);
            }
            $image->delete();
            $this->project->load('images'); // Refresh images
            $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم حذف الصورة بنجاح.']]);
        }
    }

    public function removeTempImage($index)
    {
        if (isset($this->images[$index])) {
            unset($this->images[$index]);
            $this->images = array_values($this->images);
        }
    }

    public function removeMainTempImage()
    {
        $this->image = null;
    }

    public function render()
    {
        $tags = Tag::all();
        return view('livewire.admin.projects.project-form', compact('tags'))->layout('layouts.app');
    }
}
