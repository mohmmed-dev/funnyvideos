<x-app-layout>
    {{-- @include('theme.sidebr') --}}
    <!-- start Videos -->
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-2 mt-2  ">
            {{-- Start Show Video Content --}}
            <div class=" col-span-7 col-start-1 px-2">
                {{-- Video Player --}}
                {{-- {{dump($video->first()->user->name)}} --}}
                @livewire('video-player', ['video' => $video,'convertedvideo' => $video->Convertedvideo])
                {{-- Comments --}}
                @livewire('comments', ['video' => $video])
            </div>
            {{-- End Show Video Content --}}
            <div class=" rounded-sm col-span-4 shadow-sm">
                @foreach ($videos as $video)
                @livewire('small-video', ['video' => $video])
                @endforeach
            </div>
        </div>
    </div>
    <!-- end Videos -->
</x-app-layout>
