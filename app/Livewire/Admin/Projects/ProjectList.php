<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class ProjectList extends Component
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
        $project = Project::findOrFail($id);
        $project->delete();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم حذف المشروع بنجاح.']]);
    }

    #[On('confirm-restore')]
    public function restore($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم استعادة المشروع بنجاح.']]);
    }

    #[On('confirm-force-delete')]
    public function forceDelete($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        
        if ($project->images) {
            foreach($project->images as $image) {
                 if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                }
                $image->delete();
            }
        }
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->forceDelete();
        $this->dispatch('toast', [['icon' => 'success', 'title' => 'تم حذف المشروع نهائياً.']]);
    }

    public function render()
    {
        if ($this->status === 'trashed') {
            $projects = Project::onlyTrashed()->latest()->paginate(10);
        } else {
            $projects = Project::latest()->paginate(10);
        }

        return view('livewire.admin.projects.project-list', compact('projects'))->layout('layouts.app');
    }
}
