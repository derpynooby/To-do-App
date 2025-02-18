<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();
        return view('dashboard', compact('projects', 'tasks'));
    }
}
