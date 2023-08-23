<?php
namespace App\Http\Livewire\Todo2;
use App\Models\TodoItem;
use Livewire\Component;
class Form2 extends Component
{
    public $description;
    public $detail;
    public $place;

    protected $rules = [
        'description' => 'required|min:3',
        'detail' => 'required|min:2',
        'place' => 'nullable|min:2',
    ];
    public function render()
    {
        return view('livewire.todo2.form');
    }
    public function createItem()
    {
        $this->validate();
        $item = new TodoItem();
        $item->description = $this->description;
        $item->detail = $this->detail;
        if (!isset($this->place)) {
            $item->place = $this->place;
        }        
        $item->save();
        $this->emit('saved');
    }
}

