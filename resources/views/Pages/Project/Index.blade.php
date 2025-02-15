@extends('Layouts.app')

@section('header')
    {{-- @include('layouts.header') --}}
@endSection

@section('content')
    <h1>Projects</h1>
    <div class="grid grid-cols-3 gap-4">
        @forelse ($projects as $project)
            <div class="bg-white rounded shadow">
                <a href="/projects/{{ $project->id }}">
                    <img src="/img/1.jpg" alt="Project Image" class="rounded-t">
                </a>
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2"><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></h2>
                    <p class="text-gray-600">{{ $project->description }}</p>
                </div>
                <div class="p-4">
                    <h2 class="">Delete</h2>
                    <form action="{{ route('projects.destroy',  $project->id) }}" class="d-flex flex-column gap 3" method="post">
                        @method("delete")
                        @csrf
                        <div class="mb-3">
                            <button class="button button-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
          
   
    
        <div class="grid grid-cols-3 gap-4">
            <h2 class="">Update</h2>
            <form action="{{ route('projects.update', $project->id) }}" class="d-flex flex-column gap 3" method="post">
                @method("patch")
                @csrf
                <div class="mb-3">
                    <label for="name">Project Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <input type="textarea" name="description" id="description">
                </div>
                <div class="mb-3">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="pending">pending</option>
                        <option value="in_progress">in progress</option>
                        <option value="completed">completed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="priority">Priority</label>
                    <select name="priority" id="priority">
                        <option value="low">low</option>
                        <option value="medium">medium</option>
                        <option value="high">high</option>
                    </select>                
                </div>
                <div class="mb-3">
                    <button class="button button-primary">Submit</button>
                </div>
            </form>
        </div>
            
       
    </div>
    @empty

    <div class="d-flex justify-content-between align-items-center">
        <div class="grid grid-cols-3 gap-4">
            <h2 class="">Store</h2>
            <form action="{{ route('projects.store') }}" class="d-flex flex-column gap 3" method="post">
                @method("post")
                @csrf
                <div class="mb-3">
                    <label for="name">Project Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <input type="textarea" name="description" id="description">
                </div>
                <div class="mb-3">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="pending">pending</option>
                        <option value="in_progress">in progress</option>
                        <option value="completed">completed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="priority">Priority</label>
                    <select name="priority" id="priority">
                        <option value="low">low</option>
                        <option value="medium">medium</option>
                        <option value="high">high</option>
                    </select>                
                </div>
                <div class="mb-3">
                    <button class="button button-primary">Submit</button>
                </div>
            </form>
        </div>
    @endforelse
</div>
@endSection 

@section('footer')
    {{-- @include('layouts.footer') --}}
@endSection