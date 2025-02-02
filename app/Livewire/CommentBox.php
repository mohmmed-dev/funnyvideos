<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentBox extends Component
{
    public $comment;
    public $update = false;
    public $bodyUpdate;
       public function updateComment() {
        Gate::authorize('update_comment',$this->comment);
        if($this->update) {
            $this->update = false;
            $this->dispatch('update');
            return;
        }
        $this->bodyUpdate = $this->comment->body;
        $this->update = true;
        $this->dispatch('update');
        return;
    }

        public function update_comment($id) {
            Gate::authorize('update_comment',$this->comment);
            $comment = Comment::findOrFail($id);
            $comment->body = $this->bodyUpdate;
            $comment->save();
            $this->updateComment();
        }

    public function delete_comment($id) {
        Gate::authorize('update_comment',$this->comment);
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $this->dispatch('comment');
    }
    #[On('update')]
    public function render()
    {
        return view('livewire.comment-box');
    }
}
