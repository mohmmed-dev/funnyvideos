
<div>
    {{-- Be like water. --}}
    <div id="video_work">
        <video id="videoPlayer" class="w-full max-h-96" autoplay controls>
            {{-- '240-LByFOyI41v7qfujP1736110290.mp4' --}}
        @if ($quality == 1080)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 1080})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 1080})}}" type="video/mp4">
        @elseif($quality == 720)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 720})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 720})}}" type="video/mp4">
        @elseif($quality == 480)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 480})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 480})}}" type="video/mp4">
        @elseif($quality == 360)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 360})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 360})}}" type="video/mp4">
        @else
            <source id='web_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 240})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 240})}}" type="video/mp4">
        @endif

        Your browser does not support the video tag.
        </video>
    </div>
    <div>
        <div class=" shadow-md rounded-md  p-2">
            <select id="qualityPlayer" wire:model.change="quality" class="bg-gray-50  w-20 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg  block p-2.5 ing-blue-500  hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                    @foreach ($this->qualityVideo() as $key => $value)
                        @if(!empty($value))
                        <option value="{{$key}}" {{$quality ==  $key ? 'selected' : ''}} >{{$key}}</option>
                        @endif
                @endforeach
                </select>
                <h2 class="my-2 text-2xl tracking-tight text-gray-900">{{$video->title}}</h2>
                <p class="mb-3 font-normal text-gray-700 text-sm ">{{Str::limit($video->desc)}}</p>
                <div class="flex items-center justify-between">
                    <div class="m-2">
                        <span>{{__('Date') . ' ' . $video->created_at->diffForHumans()}}</span>
                        <span>{{__("Views")}} {{$video->NumberOfViews()}}</span>
                    </div>
                    @livewire('like-un-like', ['video' => $video])
                </div>
        </div>
        {{-- <a href="" class="flex items-center p-2 rounded-md my-4 shadow-md bg-slate-100 ">
            <img class=" h-12 w-12   rounded-full " src="{{asset('storage/images/' . $video->user->profile_photo_path)}}" alt="">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 mx-3 ">{{$video->user->name}}</h5>
        </a> --}}
    </div>
</div>

@script

<script>
    document.getElementById('qualityPlayer').onchange = function() {
        var video = document.getElementById('videoPlayer');
        let curTime = video.currentTime;
        console.log('jd');
        var quality = document.getElementById('qualityPlayer').value;
        if(quality == '1080') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 1080})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 1080})}}" ;
        } else if(quality == '720') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 720})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 720})}}" ;
        } else if(quality == '480') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 480})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 480})}}" ;
        } else if(quality == '360') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 360})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 360})}}" ;
        } else {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'webm_Format_' . 240})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->Convertedvideo->{'mp4_Format_' . 240})}}" ;
        }
        video.load();
        video.play();
        video.currentTime = curTime;
    };

    document.getElementById('videoPlayer').onended = function () {
        $wire.dispatch('addToViewed');
    }

</script>
@endscript

