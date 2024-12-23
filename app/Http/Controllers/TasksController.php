<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskRequestStore;
use App\Http\Requests\Task\TaskRequestUpdate;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query()->with('project', 'assign'); // Include related models
    
        if ($request->filled('search')) {
            $search = $request->search;
    
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%') // Search in task name
                    ->orWhere('status', 'like', '%' . $search . '%') // Search in task status
                    ->orWhereHas('project', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%'); // Search in project name
                    })
                    ->orWhereHas('assign', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%'); // Search in assigned user name
                    });
            });
        }

        if (auth()->user()->role == 'teammate') {
            $query->where('assign_to', auth()->id()); // show only tasks assigned to the current user
        }

        $tasks = $query->paginate(5);
        return view('tasks.index', compact('tasks'));
    }
    

    /**
     * Show the form for creating a new resource.s
     */
    public function create()
    {
        $projects = Project::with('manager')->get();
        $assigns = User::where('role','teammate')->get();
        return view('tasks.create',compact('assigns','projects'));
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(TaskRequestStore $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::with('manager')->get();
        $assigns = User::where('role','teammate')->get();
        return view('tasks.edit', compact('task','projects','assigns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequestUpdate $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
