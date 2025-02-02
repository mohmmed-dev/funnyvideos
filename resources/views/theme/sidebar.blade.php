    <div class="border-b-2 my-2"></div>
    <a href="{{route('admin.dashboard')}}" class="flex items-center {{request()->is('admin/dashboard') ? 'active-nav-link opacity-100' : 'opacity-75'}} text-white py-2 pl-3 nav-item">
        <i class="fas fa-fw fa-tachometer-alt mx-3"></i>
        {{__('Dashboard')}}
    </a>
    <a href="{{route('admin.hashtags')}}" class="flex items-center {{request()->is('admin/hashtags*') ? 'active-nav-link opacity-100' : 'opacity-75'}} text-white py-2 pl-3 nav-item">
        <i class="mx-3">#</i>
        {{__('Hashtags')}}
    </a>
    <div class="border-b-2 my-2"></div>
    @if(auth()->user()->isSuperAdmin())
    <a href="{{route('admin.roles')}}" class=" {{request()->is('admin/roles*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
        {{__('Roles')}}
    </a>
    <a href="{{route('admin.block')}}" class="{{request()->is('admin/block*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
        </svg>
        {{__('Blocked Channels')}}
    </a>
    @endif
    <a href="{{route('admin.Channels')}}" class="{{request()->is('admin/Channels*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        {{__('Channels')}}
    </a>
    <a href="{{route('admin.mostvideos')}}" class="{{request()->is('admin/mostvideos*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
        </svg>
        {{__('Most Videos Views')}}
    </a>
    <div class="border-b-2 my-4"></div>

