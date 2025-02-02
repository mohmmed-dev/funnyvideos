<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{
    public $alert;

    #[On('alert')]

    public function mount() {
        $this->alert = auth()->user()->alert->alerts;
    }
    public function render()
    {
        return view('livewire.alert');
    }
}
