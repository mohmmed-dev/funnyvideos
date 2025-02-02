<div class="flex">
    @foreach ($hashtags->take(14) as $hashtag)
        <a href="{{route('hashtag',$hashtag->id)}}" class="block m-2 p-2 bg-slate-700 text-white rounded-md shadow-sm">{{$hashtag->name}}</a>
    @endforeach
</div>
