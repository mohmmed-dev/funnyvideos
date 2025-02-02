<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Video;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index() {
        $videos_count = Video::all()->count();
        $Channels_count = User::all()->count();
        $mostView = View::select("user_id", DB::raw('sum(views.views) as total'))->groupBy('user_id')->take(5)->get();
        $names = [];
        $totalViews = [];
        foreach($mostView as $view) {
            array_push($names, User::find($view->user_id)->name);
            array_push($totalViews, $view->total);
        }
        return view('admin.index',compact('Channels_count','videos_count'))->with('names',json_encode($names,JSON_NUMERIC_CHECK))->with('totalViews',json_encode($totalViews,JSON_NUMERIC_CHECK));
    }

    public function roles() {
        $Channels = User::paginate(10);
        return view('admin.Channels.roles',compact('Channels'));
    }

    public function block() {
        $Channels = User::where('block',1)->paginate(15);
        return view('admin.channels.block',compact('Channels'));
    }

    public function Channels() {
        $Channels = User::withCount(['videos','views'])->paginate(10);

        return view('admin.channels.channels',compact('Channels'));
    }

    public function rolesSearch(Request $request) {
        $Channels = User::where('name' , "LIKE", "%$request->name%")->withCount(['videos','views'])->paginate($request->limit ?? 10);
        return view('admin.Channels.roles',compact('Channels'));
    }

    public function mostVideos() {
        // $mostView =  View::->take(5)->get();
        $mostView = View::orderByDesc('views')->take(10)->get();
        $mostView->load(['user','video']);
        $names = [];
        $totalViews = [];
        foreach($mostView as $view) {
            array_push($names, $view->video->title);
            array_push($totalViews, $view->views);
        }
        return view('admin.videos',compact('mostView'))->with('names',json_encode($names,JSON_NUMERIC_CHECK))->with('totalViews',json_encode($totalViews,JSON_NUMERIC_CHECK));
    }
}
