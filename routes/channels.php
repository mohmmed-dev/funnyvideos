<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('real-notification.{id}', function ($user, $id) {
    return  $user->id == $id;
});
