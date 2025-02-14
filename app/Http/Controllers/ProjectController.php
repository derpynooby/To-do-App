<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all projects from project model
        $projects = Project::all();
        // return to index in project view
        return view('projects.index', compact('projects')); 
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
    public function store(Request $request)
    {
         // take validated data from projectrequest
         $request->validated();
         // store to database
         Project::create($request->all());
         // return back to view
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        // create new object of project
        $project = new Project();
        // fill project variable with validated data from projectrequest
        $project->fill($request->validated());
        // save data to database
        $project->save();
        // return back to view
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectRequest $request, Project $project)
    {
                // create new object of project
                $project = new Project();
                // fill project variable with validated data from projectrequest
                $project->fill($request->validated());
                // destroy/deleting from database
                $project->delete();
    }
}
    