<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function show(\App\Models\Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
