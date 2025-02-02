<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class LikeUnLike extends Component
{
    public $video;
    public $user;
    public $IsUserLiked;
    public $likeCount;
    public $unLikeCount;
    // public $likes;
    public function like() {
        if(!$this->video->isLiked($this->user)) {
            $this->video->likes()->attach($this->user,['like' => 1]);
        }  elseif ($this->video->changedLike($this->user) == 0) {
            $this->video->likes()->updateExistingPivot( $this->user,['like' => 1]);
        } else {
            $this->video->likes()->detach( $this->user);
        }
        $this->dispatch('like');
    }

    public function unlike() {
        if(!$this->video->isLiked($this->user)) {
            $this->video->likes()->attach($this->user,['like' => 0]);
        }  elseif ($this->video->changedLike($this->user) == 1) {
            $this->video->likes()->updateExistingPivot( $this->user,['like' => 0]);
        } else {
            $this->video->likes()->detach( $this->user);
        }
        $this->dispatch('like');
    }

    public function logInGo() {
        return to_route('login');
    }

    #[On('like')]

     public function mount()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
            $this->IsUserLiked = $this->video->IsUserLiked($this->user);
        }

        $this->likeCount = $this->video->countOfLike();
        $this->unLikeCount = $this->video->countOfUnLike();

    }
    
    public function render()
    {
        return view('livewire.like-un-like');
    }
}
