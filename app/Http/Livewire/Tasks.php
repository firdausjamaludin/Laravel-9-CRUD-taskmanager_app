<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Tasks extends Component
{
    public $tasks, $title, $body, $status, $deadline, $task_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->tasks = Task::where('user_id', Auth::user()->id)->orderBy('created_at')->get();
        return view('livewire.tasks');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        // $this->title = '';
        $this->body = '';
        $this->status = '';
        $this->deadline = '';
        $this->task_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {

        $this->validate([
            // 'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'deadline' => 'required',
        ]);

        Task::updateOrCreate(['id' => $this->task_id], [
            'user_id' => auth()->user()->id,
            // 'title' => $this->title,
            'body' => $this->body,
            'status' => $this->status,
            'deadline' => $this->deadline,
        ]);

        session()->flash(
            'message',
            $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        // $this->title = $task->title;
        $this->body = $task->body;
        $this->status = $task->status;
        $this->deadline = $task->deadline;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }
}
