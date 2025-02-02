<?php

namespace App\Http\Controllers;

use App\Events\RealNotification;
use App\Jobs\ConvertVideoForStreaming;
use App\Models\Convertedvideo;
use App\Models\Video;
use App\Models\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class VideosController extends Controller implements HasMiddleware
{


    private $videos;

    public function __construct(Video $video) {
        $this->videos = $video;
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show','hashtagFilter']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos  = $this->videos->where('processed',true)->inRandomOrder()->with(['user','view'])->paginate(8);
        return view('index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:50',
            'desc' => 'required',
            'image_path' => 'required|mimes:jpg,png',
            'video_path' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm,qt',
        ]);
        $pathName = Str::random(16) . time();
        $imagePath = $pathName . '.' . 'png';
        $videoPath = $pathName . '.' . $request->video_path->getClientOriginalExtension();
        $image = Image::read($request->image_path);
        $image->resize(120,100);
        Storage::put('images/' . $imagePath,$image->toPng());
        $request->video_path->storeAs('videos' , $videoPath , 'public');

        $data['image_path']= $imagePath;
        $data['video_path']= $videoPath;
        $data['quality']= '240';
        // $data['slug']= $pathName;
        $video = auth()->user()->Videos()->create($data);
        $video->hashtags()->attach($request->hashtag);
        ConvertVideoForStreaming::dispatch($videoPath,'public',$video);
        auth()->user()->views()->create(
            ['video_id' => $video->id]
        );

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        $videos = $this->videos->moreVideos();
        $video->load(['view','likes']);
        return view('videos.show',compact('video','videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        Gate::authorize('update_video',$video);
        return view('videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        Gate::authorize('update_video',$video);
        $data = $request->validate([
            'title' => 'required|max:50',
            'desc' => 'required',
        ]);
        if($request->hasFile('image_path')) {
            Storage::delete($video->image_path);
            $pathName = Str::random(16) . time();
            $imagePath = $pathName . '.' . 'png';
            $image = Image::read($request->image_path);
            $image->resize(120,100);
            Storage::put('images/' . $imagePath,$image->toPng());
            $video->image_path = $imagePath;
        }
        $video->title = $data['title'];
        $video->desc = $data['desc'];
        $video->hashtags()->sync([$request->hashtag]);
        $videos = $this->videos->moreVideos();
        return view('videos.show',compact('video','videos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        Gate::authorize('update_video',$video);
        $video =  $video;
        $convertedVideo = $video->Convertedvideo;
        $videoHeight = array(1080,720,480,360,240);
        if(!empty($convertedVideo)) {
            for($i = 0; $i < 5; $i++) {
                if(!empty($convertedVideo->{'mp4_Format_' . $videoHeight[$i]})) {
                Storage::delete($convertedVideo->{'mp4_Format_' . $videoHeight[$i]});
                }
                if(!empty($convertedVideo->{'webm_Format_' . $videoHeight[$i]})) {
                    Storage::delete($convertedVideo->{'webm_Format_' . $videoHeight[$i]});
                }
            }
        $convertedVideo->delete();
        }

        $video->delete();
        return  redirect()->back()->with('delete',"Deleted Successfully");
    }

    public function myVideos() {
        $videos = auth()->user()->videos()->with('view')->paginate(8);
        return view('videos.myVideos',compact('videos'));
    }

    public function searchMyVideos(Request $request) {
        $videos = $this->videos->where('user_id',$request->user()->id)->
        where('title', "LIKE" , "%$request->term%")->orderBy('created_at', $request->order ?? 'asc')->with('view')->paginate(8);
        return view('videos.myVideos',compact('videos'));
    }

    public function hashtagFilter($id) {
        $videos  = $this->videos->hashtags()->wherePivot('id',$id)->with(['user'])->paginate(8);
        return view('index',compact('videos'));
    }

}
