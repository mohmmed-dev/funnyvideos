
@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Blocked Channels')}}</h1>
<x-alert-session/>
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
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
                    {{__('Date')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Unblock')}}
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
                    {{$channel->created_at->diffForHumans()}}
                </td>
                <td class="px-6 py-4">
                    <div>
                        <form action="{{route('admin.roles.update',$channel->id)}}"  method="POST">
                            @method("PATCH")
                            @csrf
                            <input type="hidden" value="0" name="block">
                            <button type="submit" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-2 py-1" onclick="return confirm('Are You Sure')">{{__('Unblock')}}</button>
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
