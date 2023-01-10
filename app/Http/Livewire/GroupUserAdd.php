<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GroupUserAdd extends Component
{
    public $cnt = 2;

    public function mount(){
        $this->cnt = 2;
    }

    public function render()
    {
        return view('livewire.group-user-add');
    }
    public function add()
    {
        $this->cnt++;
    }
    public function del()
    {
        if ($this->cnt > 2) {
            $this->cnt--;
            }
    }
}
