<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagsController extends Controller
{
    public function index() {
        $hashtags = Hashtag::withCount('videos')->paginate(20);
        return view('admin.hashtags.index',compact('hashtags'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);
        Hashtag::create($data);
        return back()->with('success' , __("Added Successfully"));
    }

    public function destroy(Hashtag $hashtag) {
        $hashtag->delete();
        return back()->with('delete' , __("Deleted Successfully"));
    }
}
