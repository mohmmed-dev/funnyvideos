<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowComments extends Component
{
    public $video;
    public $comments;
    // #[On('comment')]

    public function render()
    {
        return view('livewire.show-comments');
    }
}
