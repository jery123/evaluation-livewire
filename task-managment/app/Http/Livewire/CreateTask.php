<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateTask extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.create-task');
    }

    public function submit() {
        $this->validate();
        $task = new Task;

        $task->name = $this->name;
        $task->user_id = Auth::id();

        $task->save();
        $this->emit('taskCreated', $task->id);
        $this->reset('name');
    }

}
