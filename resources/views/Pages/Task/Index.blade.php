@extends('layouts.app')



@section('content')

    {{-- <h1>Tasks</h1>
    <div class=" d-flex flex-column-reverse justify-content-end flex-lg-row" style="height: 85vh">
        @forelse ($tasks as $task)
        <div class="grid grid-cols-3 gap-4">
                <div class="bg-white rounded shadow">
                    <a href="/tasks/{{ $task->id }}">
                        <img src="/img/1.jpg" alt="task Image" class="rounded-t">
                    </a>
                    <div class="p-4">
                        <h2 class="text-lg font-bold mb-2"><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></h2>
                        <p class="text-gray-600">{{ $task->description }}</p>
                    </div>
                    <div class="p-4">
                        <h2 class="">Delete</h2>
                        <form action="{{ route('tasks.destroy',  $task->id) }}" class="d-flex flex-column gap 3" method="post">
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
                    <form action="{{ route('tasks.update', $task->id) }}" class="d-flex flex-column gap 3" method="post">
                        @method("patch")
                        @csrf
                        <div class="mb-3">
                            <label for="name">task Name</label>
                            <input type="text" name="name" id="name" value="{{ $task->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="textarea" name="description" id="description" value="{{ $task->description }}">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="pending" @selected($task->status == 'pending')>pending</option>
                                <option value="in_progress" @selected($task->status == 'in_progress')>in progress</option>
                                <option value="completed" @selected($task->status == 'completed')>completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority">
                                <option value="low" @selected($task->priority == 'low')>low</option>
                                <option value="medium" @selected($task->priority == 'medium')>medium</option>
                                <option value="high" @selected($task->priority == 'high')>high</option>
                            </select>                
                        </div>
                        <div class="mb-3">
                            <label for="project_id">Project Id</label>
                            <input type="number" name="project_id" id="project_id" value="{{ $task->project_id }}">
                        </div>
                        <div class="mb-3">
                            <button class="button button-primary">Submit</button>
                        </div>
                    </form>
                </div>
                    
                
            </div>

            @empty
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
            @endforelse
        </div>
        <x-modal id="Modal">
            <x-slot:button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                    Launch demo modal
                  </button>
                  <x-button type="modal" data-bs-toggle="modal" data-bs-target="#Modal">test</x-button>
            </x-slot>
            jannnnn
        </x-modal >
        <x-modal id="Modal2">
            <x-slot:button>
                <button type="button" class="btn btn-primary" data-bs-target="#Modal">
                    Launch demo modal
                  </button>
                  <x-button type="modal" data-bs-target="#Modal2">test</x-button>
            </x-slot>
            hahahahahahahah
        </x-modal> --}}

        <div class="d-flex justify-content-center align-items-center">
            <x-card style="width: 100%; height:75vh;">
                <div class="d-flex justify-content-between align-items-center border-bottom border-dark pb-3 px-3">
                    <text class="fs-5">Tasks List</text>
                    <x-modal id="ModalAdd">
                        <x-slot:buttonOpen>
                            <x-button type="modal" data-bs-target="#ModalAdd">Add Task</x-button>
                        </x-slot>
                        <form id="addTaskForm" action="{{ route('tasks.store') }}" class="d-flex flex-column gap 3" method="post">
                            @method("post")
                            @csrf
                            <div class="mb-4">
                                <x-input type="text" name="name" label="Task Name" placeholder="Enter your task name"></x-input>
                                <x-input type="textarea" name="description" label="Description" placeholder="Enter your task description" helpText="you can add explanation about your task"></x-input>
                            </div>
                            <div class="mb-1">
                                <x-input type="select" name="status" label="Status" placeholder="Choose your task status">
                                    <option value="pending">pending</option>
                                    <option value="in_progress">in progress</option>
                                    <option value="completed">completed</option>
                                </x-input>
                                <x-input type="select" name="priority" label="Priority" placeholder="Choose your task priority">
                                    <option value="low">low</option>
                                    <option value="medium">medium</option>
                                    <option value="high">high</option>
                                </x-input>
                                {{-- <x-input type="hidden" name="project_id"></x-input> --}}
                                <div class="mb-3">
                                    <label for="project_id">Project Id</label>
                                    <input type="number" name="project_id" id="project_id">
                                </div>
                            </div>
                            <x-slot:buttonClose>
                                <x-button type="cancel">Cancel</x-button>
                            </x-slot>
                            <x-slot:buttonSave>
                                <x-button type="submit" formId="addTaskForm">Submit</x-button>
                            </x-slot>
                        </form>
                    </x-modal>
                </div>
                {{-- send $tasks to accordion for loop --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    @forelse ($tasks as $task)
                    <div class="accordion-item">
                      <text class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" style="background-color: #ffffff;" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $task->id }}" aria-expanded="true" aria-controls="collapse">
                            {{ $task->name }}        
                        </button>
                        <x-modal id="ModalEdit{{ $task->id }}">            
                            <x-slot:buttonOpen>
                                <x-button type="edit" data-bs-target="#ModalEdit{{ $task->id }}"></x-button>
                            </x-slot>
                            <form id="editTaskForm{{ $task->id }}" action="{{ route('tasks.update', $task->id) }}" class="d-flex flex-column gap 3" method="post">
                                @method("patch")
                                @csrf
                                <div class="mb-4">
                                    <x-input type="text" name="name" label="Task Name" placeholder="Enter your task name" value="{{ old('name', $task->name) }}"></x-input>
                                    <x-input type="textarea" name="description" label="Description" placeholder="Enter your task description" value="{{ old('description',$task->description) }}" helpText="you can add explanation about your task"></x-input>
                                </div>
                                <div class="mb-1">
                                    <x-input type="select" name="status" label="Status" placeholder="Choose your task status">
                                        @foreach(['pending', 'in_progress', 'completed'] as $status)
                                            <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                        @endforeach                    </x-input>
                                    <x-input type="select" name="priority" label="Priority" placeholder="Choose your task priority">
                                        @foreach(['low', 'medium', 'high'] as $priority)
                                            <option value="{{ $priority }}" {{ $task->priority == $priority ? 'selected' : '' }}>{{ ucfirst($priority) }}</option>
                                        @endforeach                    </x-input>
                                    <x-input type="hidden" name="project_id" value="{{ $task->project_id }}"></x-input>
                                </div>
                                <x-slot:buttonClose>
                                    <x-button type="cancel">Cancel</x-button>
                                </x-slot>
                                <x-slot:buttonSave>
                                    <x-button type="submit" formId="editTaskForm{{ $task->id }}">Submit</x-button>
                                </x-slot>
                            </form>
                        </x-modal>
                        <x-button type="delete" url="{{ route('tasks.destroy', $task->id) }}"></x-button>
                    </text>
                      <div id="{{ $task->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ $task->description }}
                            <div class="">
                                <strong> {{ $task->status }} </strong> {{ $task->priority }}
                            </div>
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="d-flex justify-content-center align-items-center text-center" style="height: 60vh;">
                        <h4 class="font-monospace"><strong>No task found,</strong> check out task history or create a <a href="#" data-bs-toggle="modal" data-bs-target="#ModalAdd">new one</a></h4>
                    </div>
                    @endforelse
                  </div>            </x-card>
        </div>
        
       
@endSection 

