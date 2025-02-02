
@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Roles')}}</h1>
<x-alert-session/>
@endsection

@section('content')
    <div class="flex justify-between my-2 items-center">
        <form class=" w-26 mx-auto" class="max-w-md mx-auto" action="{{route('admin.roles')}}" method="GET">
        <select onchange="this.form.submit()" name='limit' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            <option value="10"  {{request()->limit == 10 ? 'selected' :''}}>10</option>
            <option value="15" {{request()->limit == 15 ? 'selected' :''}}>15</option>
            <option value="20" {{request()->limit == 20 ? 'selected' :''}}>20</option>
        </select>
        </form>
        <form class=" mx-auto min-w-60 max-w-80" action="{{route('admin.roles.search')}}" method="GET">
            <x-search/>
        </form>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-md rtl:text-right text-gray-500">
        <thead class="text-xl text-gray-700 bg-gray-50">
            <tr>
                <th scope="col" class="px-4 py-3 ">
                    {{__('Name')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Email')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Type channel')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Edit')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Delete')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Block')}}
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Channels as $channel)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                <td class="px-6 py-4">{{$channel->name}}</td>
                <td class="px-6 py-4">
                    {{$channel->email}}
                </td>
                <td class="px-6 py-4">
                    {{$channel->isSuperAdmin() ? __('SuperAdmin'): ($channel->isAdmin() ? __('Admin'): __("Normal")) }}
                </td>
                <td class="px-6 py-4">
                    <form  action="{{route('admin.roles.update',$channel->id)}}" method="POST" class="flex justify-center items-center gap-1">
                        @method('PATCH')
                        @csrf
                        <select id="level" name="level" class="block max-w-16 pr-5 p-1 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 ">
                            <option disabled selected>{{__("level")}}</option>
                            <option value="0">{{__('Normal')}}</option>
                            <option value="1">{{__('Admin')}}</option>
                            <option value="2">{{__('Super Admin')}}</option>
                        </select>
                        @if (!$channel->isSuperAdmin() )
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1">{{__("Update")}}</button>
                        @else
                        <dev class="text-white bg-blue-400 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-400 font-medium rounded-lg text-sm px-2 py-1">{{__("Update")}}</dev>
                        @endif
                    </form>
                </td>
                <td class="px-6 py-4">
                    <div>
                        <form action="{{route('admin.roles.destroy',$channel->id)}}"  method="POST">
                            @method("DELETE")
                            @csrf
                            @if (!$channel->isSuperAdmin() )
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1" onclick="return confirm('Are You Sure')">{{__('Delete')}}</button>
                                @else
                                <dev class="text-white bg-red-400 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm px-2 py-1" onclick="return confirm('Are You Sure')">{{__('Delete')}}</dev>
                            @endif
                        </form>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div>
                        <form action="{{route('admin.roles.update',$channel->id)}}"  method="POST">
                            @method("PATCH")
                            @csrf
                            @if ($channel->isAdmin())
                            @elseif($channel->block == 1)
                            <dev class="text-white bg-amber-200 hover:bg-amber-200 focus:ring-4 focus:outline-none focus:ring-amber-400 font-medium rounded-lg text-sm px-2 py-1" >{{__('Blocked')}}</dev>
                            @else
                            <input type="hidden" value="1" name="block">
                            <button type="submit" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-2 py-1" onclick="return confirm('Are You Sure')">{{__('Block')}}</button>
                            @endif
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="pt-2 pb-6">
    {{$Channels->links()}}
</div>

@endsection
