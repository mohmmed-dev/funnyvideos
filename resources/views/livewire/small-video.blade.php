<div class="bg-white border player_icon overflow-hidden border-gray-200  rounded-lg shadow flex mb-2 hover:bg-gray-50">
    {{-- The whole world belongs to you. --}}
        {{-- Success is as dangerous as failure. --}}
    @php
    $hoers_add_zero = sprintf('%02d', $video->hours);
    $seconds_add_zero = sprintf('%02d', $video->seconds);
    $minutes_add_zero = sprintf('%02d', $video->minutes);
    @endphp
        <a href="{{route('video.show',$video->id)}}" class="block relative overflow-hidden ">
            <div class=" absolute ltr:right-0 text-zinc-50 bg-neutral-900 p-1 m-1 text-sm rtl:left-0 bottom-0 ">
                {{$video->hours > 0 ? "$hoers_add_zero:" : ''}}{{$minutes_add_zero}}:{{ $seconds_add_zero }}
            </div>
            <div class="absolute inset-0 justify-center items-center icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                </svg>
            </div>
            <img class=" h-28 w-40 " src="{{$video->image_path}}" alt="">
        </a>
        <div class="flex items-center gap-x-2 px-2">
            <a href="{{route('video.show',$video->id)}}" class="flex flex-col justify-between p-2 leading-normal">
                <h5 class="mb-1 text-xl tracking-tight text-gray-900 ">{{$video->title}}</h5>
                <p class="mb-1 font-normal text-gray-700 text-sm ">{{Str::limit($video->desc,30)}}</p>
                <div class="flex  items-center gap-x-2">
                    <div class="flex gap-x-1 items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="text-sm">{{$video->view->views ?? 0}}</span>
                    </div>
                    <div class="flex gap-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm">{{$video->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </a>
        </div>
</div>
