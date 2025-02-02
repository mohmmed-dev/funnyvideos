<?php

namespace App\Livewire;

use Livewire\Component;

class SmallVideo extends Component
{
    public $video;
    public function render()
    {
        return view('livewire.small-video');
    }
}
