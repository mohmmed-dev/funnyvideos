<x-app-layout>
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-2 mt-10  ">
            {{-- @include('theme.sidebr') --}}
            <!--  Start Search  -->
            <form action="{{route('search.Channels')}}" class="col-span-8 col-start-3 my-4 flex justify-center ">
                <div class="relative w-2/4">
                    <input type="search"  class="block w-full p-4 text-sm  border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-slate-900 " name="term" id="term" placeholder="{{__('Search About...')}}" />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-4 py-2 ">{{__('Search')}}</button>
                </div>
            </form>
            <!--  End Search  -->
            <div class="col-span-8 col-start-3  ">
                <div class="border-2 my-7"></div>
                <h2 class="my-2 mx-4 text-2xl">{{__("Channels")}}</h2>
            </div>
            <!-- start Videos -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-6 mx-auto  col-span-8 col-start-3  ">
                    @foreach ($Channels as $channel)
                        <a href="{{route('Channels.show',$channel->id)}}" class="bg-white border p-2   sm:h-16 border-gray-200 rounded-lg shadow flex flex-row  items-center md:max-w-xl hover:bg-gray-50 my-2">
                            <img class="  w-20 h-20 rounded-full" src="{{$channel->profilePhotoPath()}}" alt="">
                            <div class=" px-2">
                                <h3>{{$channel->name}}</h3>
                                <h3>{{__("Videos") . ' ' . $channel->videos_count}}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- end Videos -->
            </div>
            <div class="py-3">
                {{$Channels->links()}}
            </div>
    </div>

</x-app-layout>
