<?php

namespace App\View\Composers;

use App\Models\Hashtag;
use Illuminate\View\View;

class HashtagsComposer  {
    public function compose(View $view): void
    {
        $view->with('hashtags', Hashtag::all()->shuffle());
    }
}
