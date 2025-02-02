<x-app-layout>
        <!-- start Videos -->
        <div class="container mx-auto mt-5">
            <h2 class="my-2 mx-4 text-2xl"> {{__("Hashtags")}}</h2>
            @include('tools.list-hashtags')
            <div class=" gap-2 mt-5  ">
                <div class="grid grid-cols-12  gap-1 px-4">
                        @foreach ($videos as $video)
                            <div class=" col-start-2 col-span-10 sm:col-start-0 sm:col-span-6 md:col-span-4 lg:col-span-3">
                                @livewire('video', ['video' => $video])
                            </div>
                        @endforeach
                </div>
                <div class="py-5">
                    {{$videos->links()}}
                </div>
            </div>
        </div>
        <!-- end Videos -->

</x-app-layout>
