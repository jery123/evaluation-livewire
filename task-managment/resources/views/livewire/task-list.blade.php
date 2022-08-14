<div>
    @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <div class="d-flex justify-content-between mb-4">
        @if($currentRouteName == 'home')
            <button type="button" class="btn btn-primary me-2" wire:click="showAllTasks">
                All Tasks
            </button>
        @else
            <button type="button" class="btn btn-primary me-2" wire:click="showCurrentDayTasks">
                Current Day Tasks
            </button>
        @endif
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            Add New Task
        </button>
    </div>

    <ul class="list-group">
        @foreach ($tasks as $task)
            <label class="list-group-item d-flex justify-content-between align-items-center @if($task->completed) list-group-item-success @endif">
                {{ $task->name }}
                <div>
                    @if($task->completed)
                        <button type="button" class="btn btn-danger btn-sm me-1" wire:click="toggleStatus({{ $task->id }})">
                            mark as uncomplete
                        </button>
                    @else
                        <button type="button" class="btn btn-success btn-sm me-1" wire:click="toggleStatus({{ $task->id }})">
                            mark as complete
                        </button>
                    @endif
                    <button type="button" class="btn btn-primary btn-sm me-1" wire:click="showEditTaskModal({{ $task->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="confirmTaskSuppression({{ $task->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </div>
            </label>
        @endforeach
    </ul>

    <div wire:ignore.self class="modal fade" id="confirmTaskSuppressionModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmTaskSuppressionModalLabel">Task Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure you want to delete this task ?</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteTask">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editTaskModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOrEditTaskModalLabel">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateTask" id="task-edition-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Task Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" id="name" placeholder="Enter the task name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="completed" id="complete">
                            <label class="form-check-label" for="complete">
                              Completed
                            </label>
                          </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="task-edition-form" type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <livewire:create-task />
</div>

@push('scripts')
    <script>
        Livewire.on('taskCreated', taskId => {
            $('#createTaskModal').modal('hide');
        });

        window.addEventListener('close-confirm-suppression-modal', event =>{
            $('#confirmTaskSuppressionModal').modal('hide');
        });

        window.addEventListener('show-confirm-suppression-modal', event =>{
            $('#confirmTaskSuppressionModal').modal('show');
        });

        window.addEventListener('show-edit-task-modal', event =>{
            $('#editTaskModal').modal('show');
        });

        window.addEventListener('close-edit-task-modal', event =>{
            $('#editTaskModal').modal('hide');
        });

    </script>
@endpush
