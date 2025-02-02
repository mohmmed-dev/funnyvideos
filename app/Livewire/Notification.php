<?php

namespace App\Livewire;

use App\Models\notification as ModelsNotification;
use App\Models\view;
use Livewire\Component;

class Notification extends Component
{
    public $hidden = true;

    public function alertZero() {
        auth()->user()->alert->alerts = 0;
        auth()->user()->alert->save();
        $this->dispatch('alert');
    }
    public function showNotification() {
        if($this->hidden) {
            $this->hidden = false;
            $this->alertZero();
            return;
        }
        $this->alertZero();
        $this->hidden = true;
        return;
    }

    public function notifications()  {
        $notifications = auth()->user()->notifications->sortByDesc('created_at')->take(5);
        return $notifications ;
    }

    public function allNotification() {
        return to_route('notifications');
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
