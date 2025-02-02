<x-app-layout>
    <div>
        <!-- start Videos -->
        <div class="container mx-auto">
            <x-alert-session/>
            <div class="grid grid-cols-12 gap-2 mt-10  ">
            <form action="{{route('search.my.videos')}}" class="col-span-8 col-start-3 flex justify-center ">
                <div class="relative w-2/4">
                    <input type="search"  class="block w-full p-4 text-sm  border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-slate-900 " name="term" id="term" placeholder="{{__('Search About...')}}" />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-4 py-2 ">{{__('Search')}}</button>
                </div>
                <select id="countries"  name="order" class="bg-gray-50  mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg  block p-2.5 ing-blue-500  hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                    <option value="desc">{{__("New")}}</option>
                    <option value="asc">{{__("Old")}}</option>
                </select>
            </form>
            <div class="col-span-8 col-start-3  ">
                <div class="border-2 my-7"></div>
                <h2 class="my-2 mx-4 text-2xl">{{__("My Videos")}}</h2>
            </div>
            @foreach ($videos as $video)
                <div class=" col-span-8 col-start-3 relative">
                    @can('update_video', $video)
                        @if (!auth()->user()->isBlock())
                            <div class="absolute z-10  left-2 top-2 flex gap-x-1">
                                <a href="{{route('video.edit',$video->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0288d1" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <form action="{{route('video.destroy',$video->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e53935" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endcan
                    @livewire('small-video', ['video' => $video])
                </div>
            @endforeach
            <!-- end Videos -->
        </div>
        <div class="py-3">
            {{$videos->links()}}
        </div>
</x-app-layout>
