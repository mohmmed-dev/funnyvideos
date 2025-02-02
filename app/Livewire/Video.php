<?php

namespace App\Livewire;

use Livewire\Component;

class Video extends Component
{
    public $video;
    public function render()
    {
        return view('livewire.video');
    }
}
