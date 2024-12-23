<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequestStore;
use App\Http\Requests\User\UserRequestUpdate;

class TeammatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teammates = User::where('role', 'teammate')->paginate(5);
        return view('teammates.index', compact('teammates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teammates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequestStore $request, User $user)
    {
        $user->create($request->validated());

        return redirect()->route('teammates.index')->with('success', 'Teammate created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teammate)
    {
        return view('teammates.edit', compact('teammate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequestUpdate $request, User $teammate)
    {
        $teammate->update($request->validated());
        return redirect()->route('teammates.index')->with('success', 'Teammate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teammate, Task $task)
    {
        $teammate->load('tasks');
        if ($teammate->tasks->count() > 0) {
            return redirect()->route('teammates.index')->with('error', 'Teammate has assigned tasks and cannot be deleted');
        }
        $teammate->delete();
        return redirect()->route('teammates.index')->with('success', 'Teammate deleted successfully');

    }
}
