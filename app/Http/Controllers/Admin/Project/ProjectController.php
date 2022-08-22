<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('admin.project.index', compact('projects'));
    }

    public function create(Request $request)
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project Added Successfully');
    }

    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    public function edit(Request $request, Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project Updated Successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project Deleted Successfully');
    }
}
