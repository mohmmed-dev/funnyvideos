<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class VideoPlayer extends Component
{
    public $video;
    public $convertedvideo;
    public $qualities = array(1080,720,480,360,240);
    public $quality = 240;
    public $arr;


    public function qualityVideo() {
        foreach($this->qualities as $quality) {
            $this->arr[$quality] = $this->convertedvideo->{'mp4' . '_Format_' . $quality};
        }
        return $this->arr;

    }
    public function render()
    {
        return view('livewire.video-player');
    }
    #[On('addToViewed')]
    public function addToView() {
        if(auth()->check()) {
            $this->video->user_video()->attach(auth()->user()->id);
            $this->video->view->views += 1;
            $this->video->view->save();
        }
    }
}
