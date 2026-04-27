<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::published()->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function show(\App\Models\Project $project)
    {
        if (!$project->is_published || ($project->published_at && $project->published_at->isFuture())) {
            abort(404);
        }
        return view('projects.show', compact('project'));
    }
}
