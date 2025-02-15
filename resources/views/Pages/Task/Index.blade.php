@extends('layouts.app')

@section('header')
    {{-- @include('layouts.header') --}}
@endSection

@section('content')
    <h1>Tasks</h1>
    <div class="d-flex justify-content-between align-items-center">
        <div class="grid grid-cols-3 gap-4">
            <h2 class="">Store</h2>
            <form action="{{ route('tasks.store') }}" class="d-flex flex-column gap 3" method="post">
                @method("post")
                @csrf
                <div class="mb-3">
                    <label for="name">Task Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <input type="textarea" name="description" id="description">
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
                    <label for="project_id">Project Id</label>
                    <input type="number" name="project_id" id="project_id">
                </div>
                <div class="mb-3">
                    <button class="button button-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <h2 class="">Update</h2>
            <form action="{{ route('tasks.update', $task->id) }}" class="d-flex flex-column gap 3" method="post">
                @method("patch")
                @csrf
                <div class="mb-3">
                    <label for="name">task Name</label>
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
            
        <div class="grid grid-cols-3 gap-4">
            @forelse ($tasks as $task)
                <div class="bg-white rounded shadow">
                    <a href="/tasks/{{ $task->id }}">
                        <img src="/img/1.jpg" alt="task Image" class="rounded-t">
                    </a>
                    <div class="p-4">
                        <h2 class="text-lg font-bold mb-2"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h2>
                        <p class="text-gray-600">{{ $task->description }}</p>
                    </div>
                    <div class="p-4">
                        <h2 class="">Delete</h2>
                        <form action="{{ route('tasks.delete',  $task->id) }}" class="d-flex flex-column gap 3" method="post">
                            @method("delete")
                            @csrf
                            <div class="mb-3">
                                <button class="button button-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p>No tasks found.</p>
            @endforelse
        </div>
    </div>
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
@endSection 

@section('footer')
    {{-- @include('layouts.footer') --}}
@endSection