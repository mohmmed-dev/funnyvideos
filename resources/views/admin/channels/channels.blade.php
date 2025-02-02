
@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Roles')}}</h1>
@endsection

@section('content')
    <div class="flex justify-between my-2 items-center">
        <form class=" w-26 mx-auto" class="max-w-md mx-auto" action="{{route('admin.roles.search')}}" method="GET">
        <select onchange="this.form.submit()" name='limit' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            <option value="5" {{request()->limit == 5 ? 'selected' :''}}>5</option>
            <option value="10" {{request()->limit == 10 ? 'selected' :''}}>10</option>
            <option value="15" {{request()->limit == 15 ? 'selected' :''}}>15</option>
        </select>
        </form>
        <form class=" mx-auto min-w-60 max-w-80" action="" method="GET">
            <x-search/>
        </form>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-md rtl:text-right text-gray-500">
        <thead class="text-xl text-gray-700 bg-gray-50">
            <tr >
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
                    {{__('Number of Videos')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Number Of Views')}}
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Channels as $channel)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                <td class="px-6 py-4"><a href="{{route('Channels.show',$channel->id)}}">{{$channel->name}}</a></td>
                <td class="px-6 py-4">
                    {{$channel->email}}
                </td>
                <td class="px-6 py-4">
                    {{$channel->level ? __('Admin') :  __('Normal')}}
                </td>
                <td class="px-6 py-4">
                    {{$channel->videos_count}}
                </td>
                <td class="px-6 py-4">
                    {{$channel->views_count}}
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
