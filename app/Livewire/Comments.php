<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment as ModelsComment;
use Livewire\Attributes\On;

class Comments extends Component
{
    public $video;
    // public $comments;
    #[On('comment')]
    public function render()
    {
        $comments = $this->video->getVideoComments();
        return view('livewire.comments',compact('comments'));
    }
}
