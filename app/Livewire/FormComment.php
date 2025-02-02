<?php

namespace App\Livewire;

use App\Events\SendComment;
use App\Models\Alert;
use App\Models\Video;
use App\Models\Notification;
use Livewire\Component;

class FormComment extends Component
{
    public $video;
    public $user;
    public $comment;
    public $body = '';
    function save() {
        $this->video->comments()->create([
            'body' => $this->body,
            'user_id' => $this->user,
            'parent_id' => $this->comment ?? 0
        ]);
        $this->body = '';
        $notification = new Notification();
        $notification->user_id = $this->video->user_id;
        $notification->notification = $this->video->title;
        $notification->success = 2;
        $notification->save();
        broadcast(new SendComment($this->video->title , $this->video->user_id));
        $alert = Alert::where('user_id',$this->video->user_id)->first();
        $alert->alerts++;
        $alert->save();
        $this->dispatch('alert');
        $this->dispatch('comment');
    }
    public function render()
    {
        return view('livewire.form-comment');
    }
}
