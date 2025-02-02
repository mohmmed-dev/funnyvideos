<div class="rounded-md border-2  my-1 p-2 relative">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class=" bg-white shadow-md rounded-md my-4 px-2 py-4 overflow-auto" style="max-height: 550px;">
        @forelse ($comments as $comment)
                @livewire('comment', ['video' => $video,'comment' => $comment] , key($comment->id ))
            @empty
            <div class="text-center text-2xl m-3">{{__("Empty")}}</div>
        @endforelse
    </div>
    @livewire('form-comment' , ['video' => $video , 'user' => auth()->user()->id ?? null])
</div>


