<x-app-layout>
    {{--Start Channels--}}
    <div class="container mx-auto">
        <div class="bg-white flex flex-col justify-center items-center border w-full border-gray-200 rounded-lg shadow text-center py-4 hover:bg-gray-50 my-2">
            <img class="  w-24 h-24 rounded-full" src="{{$channel->profilePhotoPath()}}" alt="">
            <div class=" px-2">
                <h3>{{$channel->name}}</h3>
                <h3>{{__("Videos") . ' ' . $channel->videos()->count()}}</h3>
            </div>
        </div>
    {{--End Channels--}}
    <!-- Start Videos -->
    <div class="container mx-auto">
        <div class="grid sm:grid-cols-1 md:grid-cols-3 grid-cols-4 gap-6 mx-auto  ">
        @foreach ($videos as $video)
        @livewire('video', ['video' => $video])
        @endforeach
    </div>
    <div class="py-3">
            {{$videos->links()}}
    </div>
    <!-- End Videos -->
    </div>
</x-app-layout>
