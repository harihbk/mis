<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Partnos extends Component
{
    public $inputs = [];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }


    public function render()
    {
        return view('livewire.partnos');
    }
}
