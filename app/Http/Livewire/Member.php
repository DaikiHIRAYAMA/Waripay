<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Member extends Component
{
    public $cnt = 2;
    public function add()
    {
        $this->cnt++;
    }
    public function del()
    {
        $this->cnt--;
    }
    public function render()
    {
        return view('livewire.member');
    }
}
