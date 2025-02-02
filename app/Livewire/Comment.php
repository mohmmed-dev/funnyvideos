<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $update = false;
    public $replays = false;
    public $video;
    public $bodyUpdate;
    public function showRepay() {
        if($this->replays) {
            $this->replays = false;
            return;
        }
        $this->replays = true;
        return;
    }
    // #[On('comment')]
    public function render()
    {
        return view('livewire.comment');
    }
}
