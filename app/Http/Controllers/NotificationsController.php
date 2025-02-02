<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $notifications = auth()->user()->notifications;
        return view('allNotification',compact('notifications'));
    }
}
