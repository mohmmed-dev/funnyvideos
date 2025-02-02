<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{

    public function index() {
        $Channels = User::withCount('videos')->paginate(10);
        return view('Channels.index',compact('Channels'));
    }


    public function show(User $user) {
        $videos = $user->videos()->paginate(7);
        $channel = $user;
        return view('Channels.show',compact('channel','videos'));
    }

    public function searchChannels(Request $request) {
        $Channels = User::where('name', "LIKE" , "%$request->term%")->paginate(10);
        return view('Channels.index',compact('Channels'));
    }

    public function update(Request $request,User $user) {
        $data = $request->validate([
            'level' => 'sometimes',
            'block' => 'sometimes',
        ]);
        $user->update($data);
        return back()->with('update',"Updated Successfully");
    }

    public function destroy(User $user) {
        $user->delete();
        return back()->with('delete',"Deleted Successfully");
    }
}
