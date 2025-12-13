<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = \App\Models\Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = \App\Models\Tag::all();
        return view('admin.projects.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.ar' => 'required',
            'title.en' => 'nullable',
            'slug' => 'required|unique:projects,slug',
            'image' => 'nullable|image|max:2048',
            'description.ar' => 'nullable',
            'description.en' => 'nullable',
            'content.ar' => 'nullable',
            'content.en' => 'nullable',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'images' => 'array',
            'images.*' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = \App\Models\Project::create(\Illuminate\Support\Arr::except($validated, ['tags', 'images']));

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('project_images', 'public');
                $project->images()->create(['image' => $path]);
            }
        }

        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        $tags = \App\Models\Tag::all();
        return view('admin.projects.edit', compact('project', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $project = \App\Models\Project::findOrFail($id);

         $validated = $request->validate([
            'title.ar' => 'required',
            'title.en' => 'nullable',
            'slug' => 'required|unique:projects,slug,' . $id,
            'image' => 'nullable|image|max:2048',
            'description.ar' => 'nullable',
            'description.en' => 'nullable',
            'content.ar' => 'nullable',
            'content.en' => 'nullable',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'images' => 'array',
            'images.*' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update(\Illuminate\Support\Arr::except($validated, ['tags', 'images']));

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('project_images', 'public');
                $project->images()->create(['image' => $path]);
            }
        }

        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        } else {
            $project->tags()->detach();
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        // Optional: delete image from storage
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
