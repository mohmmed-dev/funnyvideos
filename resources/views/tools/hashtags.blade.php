@foreach ($hashtags as $hashtag)
    <option value="{{$hashtag->id}}">{{$hashtag->name}}</option>
@endforeach
