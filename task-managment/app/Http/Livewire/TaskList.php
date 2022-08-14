<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\WithPagination;

class TaskList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'taskCreated' => 'taskCreated'
    ];

    public $name, $completed, $task_id;
    public $deleted_task_id;
    public $currentRouteName;

    public function mount() {
        $this->currentRouteName = Route::currentRouteName();
    }

    public function render()
    {
        $user = User::find(Auth::id());
        $tasks = $user->tasks();
        if ($this->currentRouteName == 'home') {
            $tasks->where(function (Builder $query) {
                return $query->whereDate('created_at', Carbon::today());
            });
        }

        $tasks->orderBy('created_at', 'desc');

        return view('livewire.task-list', [
            'tasks' => $tasks->get()
        ])->layout('layouts.livewire');
    }

    public function showEditTaskModal(Task $task) {
        $this->name = $task->name;
        $this->completed = $task->completed;
        $this->task_id = $task->id;
        $this->dispatchBrowserEvent('show-edit-task-modal');
    }


    public function taskCreated()
    {
        session()->flash('success', 'Task Successfully created');
    }

    public function deleteTask() {

        if ($this->deleted_task_id) {
            Task::whereId($this->deleted_task_id)->delete();
            session()->flash('success', 'Task successfully deleted');
            $this->dispatchBrowserEvent('close-confirm-suppression-modal');
        }
    }

    public function confirmTaskSuppression($task_id) {
        $this->deleted_task_id = $task_id;
        $this->dispatchBrowserEvent('show-confirm-suppression-modal');
    }

    public function updateTask() {
        $this->validate([
            'name' => 'required'
        ]);

        $task = Task::where('id', $this->task_id)->first();
        if (!$task) {
            session()->flash('error', 'Task not found');
            $this->dispatchBrowserEvent('close-edit-task-modal');
            return;
        }

        $task->name = $this->name;
        $task->completed = $this->completed ?? $task->completed;

        $task->save();

        session()->flash('success', 'Task successfully updated');
        $this->dispatchBrowserEvent('close-edit-task-modal');
    }

    public function toggleStatus(Task $task) {
        if ($task) {
            $task->completed = !$task->completed;
            $task->save();

            session()->flash('success', $task->completed ? 'Task successfully mark as completed' : 'Task successfully mark as uncompleted');
        }
    }

    public function showAllTasks() {
        return redirect('/tasks');
    }

    public function showCurrentDayTasks() {
        return redirect('/home');
    }

}
