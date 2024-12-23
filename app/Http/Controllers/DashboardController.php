<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
   
    if (auth()->user()->role === 'manager') {
        // For managers, show all tasks
        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $workingTasks = Task::where('status', 'working')->count();
        $completedTasks = Task::where('status', 'done')->count();
    } else {
        // For teammates, show only tasks assigned to them
        $totalTasks = Task::where('assign_to', auth()->id())->count();
        $pendingTasks = Task::where('assign_to', auth()->id())->where('status', 'pending')->count();
        $workingTasks = Task::where('assign_to', auth()->id())->where('status', 'working')->count();
        $completedTasks = Task::where('assign_to', auth()->id())->where('status', 'done')->count();
    }

    return view('dashboard', compact('totalTasks', 'pendingTasks', 'workingTasks', 'completedTasks'));
    }
}

