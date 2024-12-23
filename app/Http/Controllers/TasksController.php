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

    //only manager can show all tasks and teammate can show only assigned tasks


    public function index(Request $request)
    {
        $query = Task::query()->with('project');
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('project_id', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');
        }
        $tasks = $query->paginate(5);
        return view('tasks.index',compact('tasks'));
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
