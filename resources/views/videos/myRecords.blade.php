<x-app-layout>
    <div class="container mx-auto">
        <div class=" gap-2 mt-10  ">
            <form action="{{route('delete.all.records')}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="flex p-2 border-2 border-red-500 m-2 w-fit mx-auto rounded-md " >
                    {{__("Delete All")}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e53935" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </form>
            <div class="border-2 my-7"></div>
            <h2 class="my-2 mx-4 text-2xl">{{__("Records")}}</h2>
            <div class="grid grid-cols-12  gap-1 px-4">
                    @foreach ($videos as $video)
                        <div class="relative col-start-2 col-span-10 sm:col-start-0 sm:col-span-6 md:col-span-4 lg:col-span-3">
                        <div class=" absolute z-20 left-2 top-3">
                            <form action="{{route('delete.record',$video->pivot->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e53935" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                            @livewire('video', ['video' => $video])
                        </div>
                    @endforeach
            </div>
        </div class="py-3">
        {{$videos->links()}}
        </div>
</x-app-layout>
