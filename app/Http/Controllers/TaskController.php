<?php

namespace App\Http\Controllers;

use App\Http\Requests\Taskrequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all tasks from task model
        $tasks = Task::all();
        // return to index in task view
        return view('pages.task.index', compact('tasks')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Taskrequest $request)
    {
        // take validated data from taskrequest
        $request->validated();
        // check if data has project_id (if exist merge project_id with value of 0)
        $request->exists('project_id')? : $request->merge(['project_id' => 0]);
        // store to database
        Task::create($request->all());
        // return back to view
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        // fill task variable with validated data from taskrequest
        $task->fill($request->validated());
        // save data to database
        $task->save();
        // return back to view
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task)
    {
        // fill task variable with validated data from taskrequest
        $task->fill([$request]);
        // destroy/deleting from database
        $task->delete();
        // return back to view
        return redirect()->back();
    }
}
