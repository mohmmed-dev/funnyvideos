<div class="rounded-md border-2  my-1 p-2 relative">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @livewire('comment-box', ['comment' => $comment])
    <div class="flex justify-end">
        <span class=" block w-fit cursor-pointer" wire:click="showRepay" >رد</span>
    </div>
    <div class="{{$replays ? 'block' : 'hidden'}}">
        <div class="my-4 px-2 py-4 max-h-72 overflow-auto">
            @forelse ($video->getVideoCommentsForComment($comment->id) as $commentForComment)
            <div class="pb-4 border-2 rounded-md my-1 p-2 relative">
                @livewire('comment-box', ['comment' => $commentForComment], key($commentForComment->id) )
            </div>
            @empty
            @endforelse
        </div>
        @livewire('form-comment' , ['video' => $video , 'user' => auth()->user()->id ?? null , 'comment' => $comment->parent_id != 0 ? $comment->parent_id : $comment->id ])
    </div>
</div>
