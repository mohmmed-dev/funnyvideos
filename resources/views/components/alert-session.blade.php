<div>
    @if(session('success'))
    <div class="p-2 m-2 rounded-sm text-white bg-green-500">
        {{__(session('success'))}}
    </div>
    @elseif (session('update'))
        <div class="p-2 m-2 rounded-sm text-white bg-amber-500">
        {{__(session('update'))}}
    </div>
    @elseif(session('delete'))
    <div class="p-2 m-2 rounded-sm text-white bg-red-500">
        {{__(session('delete'))}}
    </div>
    @endif
</div>
