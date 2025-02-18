@extends('layouts.app')



@section('content')

        <div class="d-flex justify-content-center align-items-center">
            <x-card style="width: 100%; height:75vh;">
                <div class="d-flex justify-content-between align-items-center border-bottom border-dark pb-3 px-3">
                    <text class="fs-5">Projects List</text>
                    <x-modal id="ModalAdd">
                        <x-slot:buttonOpen>
                            <x-button type="modal" data-bs-target="#ModalAdd">Add Project</x-button>
                        </x-slot>
                        <form id="addProjectForm" action="{{ route('projects.store') }}" class="d-flex flex-column gap 3" method="post">
                            @method("post")
                            @csrf
                            <div class="mb-4">
                                <x-input type="text" name="name" label="Project Name" placeholder="Enter your project name"></x-input>
                                <x-input type="textarea" name="description" label="Description" placeholder="Enter your project description" helpText="you can add explanation about your project"></x-input>
                                <x-input type="date" name="deadline" label="Deadline (optional)" placeholder="Choose your project deadline"></x-input>
                            </div>
                            <div class="mb-1">
                                <x-input type="select" name="status" label="Status" placeholder="Choose your project status">
                                    <option value="pending">pending</option>
                                    <option value="in_progress">in progress</option>
                                    <option value="completed">completed</option>
                                </x-input>
                                <x-input type="select" name="priority" label="Priority" placeholder="Choose your project priority">
                                    <option value="low">low</option>
                                    <option value="medium">medium</option>
                                    <option value="high">high</option>
                                </x-input>
                            </div>
                            <x-slot:buttonClose>
                                <x-button type="cancel">Cancel</x-button>
                            </x-slot>
                            <x-slot:buttonSave>
                                <x-button type="submit" formId="addProjectForm">Submit</x-button>
                            </x-slot>
                        </form>
                    </x-modal>
                </div>
                {{-- send $projects to accordion for loop --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    @forelse ($projects as $project)
                    <div class="accordion-item">
                      <text class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" style="background-color: #ffffff;" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $project->id }}" aria-expanded="true" aria-controls="collapse">
                            {{ $project->name }}        
                        </button>
                        <x-modal id="ModalEdit{{ $project->id }}">            
                            <x-slot:buttonOpen>
                                <x-button type="edit" data-bs-target="#ModalEdit{{ $project->id }}"></x-button>
                            </x-slot>
                            <form id="editProjectForm{{ $project->id }}" action="{{ route('projects.update', $project->id) }}" class="d-flex flex-column gap 3" method="post">
                                @method("patch")
                                @csrf
                                <div class="mb-4">
                                    <x-input type="text" name="name" label="Project Name" placeholder="Enter your project name" value="{{ old('name', $project->name) }}"></x-input>
                                    <x-input type="textarea" name="description" label="Description" placeholder="Enter your project description" value="{{ old('description',$project->description) }}" helpText="you can add explanation about your project"></x-input>
                                    <x-input type="date" name="deadline" label="Deadline (optional)" placeholder="Choose your project deadline" value="{{ old('deadline', $project->deadline) }}"></x-input>
                                </div>
                                <div class="mb-1">
                                    <x-input type="select" name="status" label="Status" placeholder="Choose your project status">
                                        @foreach(['pending', 'in_progress', 'completed'] as $status)
                                            <option value="{{ $status }}" {{ $project->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                        @endforeach                    </x-input>
                                    <x-input type="select" name="priority" label="Priority" placeholder="Choose your project priority">
                                        @foreach(['low', 'medium', 'high'] as $priority)
                                            <option value="{{ $priority }}" {{ $project->priority == $priority ? 'selected' : '' }}>{{ ucfirst($priority) }}</option>
                                        @endforeach                    </x-input>
                                </div>
                                <x-slot:buttonClose>
                                    <x-button type="cancel">Cancel</x-button>
                                </x-slot>
                                <x-slot:buttonSave>
                                    <x-button type="submit" formId="editProjectForm{{ $project->id }}">Submit</x-button>
                                </x-slot>
                            </form>
                        </x-modal>
                        <x-button type="delete" url="{{ route('projects.destroy', $project->id) }}"></x-button>
                    </text>
                      <div id="{{ $project->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ $project->description }}
                            <div class="">
                                <strong> {{ $project->status }} </strong> {{ $project->priority }}
                            </div>
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="d-flex justify-content-center align-items-center text-center" style="height: 60vh;">
                        <h4 class="font-monospace"><strong>No project found,</strong> check out project history or create a <a href="#" data-bs-toggle="modal" data-bs-target="#ModalAdd">new one</a></h4>
                    </div>
                    @endforelse
                  </div>            </x-card>
        </div>
        
       
@endSection 

