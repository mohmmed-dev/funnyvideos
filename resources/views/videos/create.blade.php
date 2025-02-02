<x-app-layout>
    <div class="container mx-auto">
        <div class="sm:grid mx-2 grid-cols-12 ">
            @if (auth()->user()->isBlock())
            <div class=" text-center mt-5">
                Your Channels Is Block
            </div>
            @else
                <form action="{{route('video.store')}}" method="POST" class="mt-2 col-span-8 col-start-3 block" enctype="multipart/form-data">
                    @csrf
                    @include('videos.form')
                    <x-button>
                        {{__("Save")}}
                    </x-button>
                </form>
            @endif
        </div>
    </div>

</x-app-layout>
