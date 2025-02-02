<div>
    {{-- Do your work, then step back. --}}
     @can('update_comment', $comment)
    <div class="absolute z-10  left-2 top-2 flex gap-x-1">
        <a wire:click="updateComment()" class=" cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0288d1" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
        </a>
        <form wire:submit='delete_comment({{$comment->id}})'>
            @csrf
            @method('DELETE')
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e53935" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </button>
        </form>
    </div>
    @endcan
    <a href="" class="flex items-center">
        <img class=" h-10 w-10   rounded-full " src="{{$comment->user->profilePhotoPath()}}" alt="">
        <div class="mx-2">
            <h5 class=" text-md font-bold tracking-tight text-gray-900 ">{{$comment->user->name}}</h5>
            <h5 class="text-sm tracking-tight text-gray-900 ">{{$comment->created_at->diffForHumans()}}</h5>
        </div>
    </a>
    <div>
        @if(!$update)
        <p class=" text-sm tracking-tight text-gray-900 mt-3 mb-1 mx-2">{{$comment->body}}</p>
        @else
            <form class="flex items-center gap-x-1" wire:submit='update_comment({{$comment->id}})'>
                @method('PATCH')
            <div class="w-3/4">
                <input type="text" wire:model="bodyUpdate" required class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
            </div>
            <x-button>
                {{__("Update")}}
            </x-button>
        </form>
        @endif
    </div>
</div>
