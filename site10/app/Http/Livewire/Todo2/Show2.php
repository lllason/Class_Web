<?php

namespace App\Http\Livewire\Todo2;
use App\Models\TodoItem2;
use Livewire\Component;

class Show2 extends Component
{
    protected $listeners = ['saved'];
    public function render()
    {
        $list = TodoItem2::all()->sortByDesc('created_at');
        return view('livewire.todo2.show2', [ 'list' => $list ]);
    }
    public function saved()
    {
        $this->render();
    }
    public function markAsDone(TodoItem2 $item)
    {
        $item->done = true;
        $item->save();
    }
    public function markAsToDo(TodoItem2 $item)
    {
        $item->done = false;
        $item->save();
    }
    public function deleteItem(TodoItem2 $item)
    {
        $item->delete();
    }
}
