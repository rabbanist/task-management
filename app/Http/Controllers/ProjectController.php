<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectRequestStore;
use App\Http\Requests\Project\ProjectRequestUpdate;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $projects = $query->paginate(5);
        return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequestStore $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project created successfully');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequestUpdate $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(Project $project)
        {
        if ($project->tasks()->exists()) {
            return redirect()->route('projects.index')->with('error', 'Cannot delete project with associated tasks.');
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
      }

}
