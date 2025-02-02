<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <button wire:click="showNotification" class=" relative mt-2">
        @livewire('alert')
        <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
    </button>
    <div id="main_box"  class="bg-stone-200 absolute {{ $hidden ? 'hidden' : 'block' }}  mt-6 left-6 rounded-sm">
        <div id='box' class="w-full p-2">
            <div id="newNot">
            </div>
            @foreach ($this->notifications() as $notification)
                <a href="#" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
                <div class="w-12 h-12 bg-slate-700 rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24"  stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                </div>
                <div class="flex flex-col">
                    <span class=" font-bold">{{$notification->created_at->diffForHumans()}}</span>
                    <div>
                        @if($notification->success == 1)
                        <h5 class="">{{$notification->notification}} لقد تم معالجة الفيديو بنجاح </h5>
                        @elseif($notification->success == 2 )
                        <h5 class="">{{$notification->notification}} تم اضافة تعليق جديد على </h5>
                        @else
                        <h5 class="">{{$notification->notification}} لقد فشل معالجة الفيديو  </h5>
                        @endif
                    </div>
                </div>
                </a>
            @endforeach
        </div>

        <a href="{{route('notifications')}}" class="block text-center p-2 bg-zinc-50">{{__("Show All Notification")}}</a>
    </div>
</div>

@script

<script type="module">
    let post_userId = {{auth()->user()->id}};
    Echo.private(`real-notification.${post_userId}`)
        .listen('RealNotification', (e) => {
        document.querySelector("#newNot").innerHTML += `
            <a href="#" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
                <div class="w-12 h-12 bg-slate-700 rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24"  stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                </div>
                <div class="flex flex-col">
                    <span class=" font-bold">${e.date}</span>
                    <div>
                        <h5 class="">${e.title}لقد تم معالجة الفيديو بنجاح</h5>
                    </div>
                </div>
            </a>
        `;
        $wire.dispatch('alert');
    });
    Echo.private(`real-notification.${post_userId}`)
        .listen('FailNotification', (e) => {
        document.querySelector("#newNot").innerHTML += `
            <a href="#" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
                <div class="w-12 h-12 bg-slate-700 rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24"  stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                </div>
                <div class="flex flex-col">
                    <span class=" font-bold">${e.date}</span>
                    <div>
                        <h5 class="">${e.title}لفد فشل معالجة الفيديو</h5>
                    </div>
                </div>
            </a>
        `;
        $wire.dispatch('alert');
    });
    Echo.private(`real-notification.${post_userId}`)
        .listen('SendComment', (e) => {
        document.querySelector("#newNot").innerHTML += `
            <a href="#" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
                <div class="w-12 h-12 bg-slate-700 rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24"  stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                </div>
                <div class="flex flex-col">
                    <span class=" font-bold">${e.date}</span>
                    <div>
                        <h5 class="">${e.title} تم اضافة تعليق جديد على </h5>
                    </div>
                </div>
            </a>
        `;
        $wire.dispatch('alert');
    });
</script>

@endscript

