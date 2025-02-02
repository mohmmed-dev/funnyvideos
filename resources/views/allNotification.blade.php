<x-app-layout>
    <h2 class="my-2 mx-4 text-2xl">
        {{__("All Notification")}}
    </h2>
    <div class=" grid grid-cols-12 justify-center gap-2 mx-2 ">
        <!-- Start Notification -->
    <div class=" col-span-8">
        @foreach ($notifications as $notification)
        <div class="p-3 my-2 mx-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
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
            </div>
        @endforeach
        </div>
        <!-- End Notification -->
    </div>
</x-app-layout>
