<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class=" bg-white shadow-md rounded-md my-4 px-2 py-4">
        @auth
        @if (auth()->user()->isBlock())
        <div class="text-center my-3 text-2xl">{{__("Your Account Is Block")}}</div>
        @else
        <form class="flex items-center gap-x-1" wire:submit='save' action="#form-comment">
                <div class="w-3/4">
                    <input type="text" wire:model="body" name="body" id="body" value="{{old('title')}}" required class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{__("Desecration")}}">
                    @error('body')
                        <p class="text-xl text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <x-button>
                    {{__("Save")}}
                </x-button>
            </form>
        @endif
        @else
            <a href="{{route('login')}}" class=" border-b-2 pb-2">{{__("Log In To Add A Comment")}}</a>
        @endauth
    </div>
</div>
