<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RecordController extends Controller implements HasMiddleware
{

      public static function middleware(): array
    {
        return [
            'auth'
            ];
    }

    public function index() {
        $videos = auth()->user()->records()->orderBy('created_at','DESC')->with(['user','view'])->paginate(8);
        return view('videos.myRecords',compact('videos'));
    }

    public function deleteFromRecord(int $id) {
        auth()->user()->records()->wherePivot('id' , $id)->detach();
        return redirect()->back();
    }

    public function deleteAllRecords() {
        auth()->user()->watch()->sync([]);
        return redirect()->back();
    }
}
