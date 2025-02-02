
@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Hashtags')}}</h1>
<x-alert-session/>
@endsection

@section('content')
    <label for="name">{{__("Add New Hashtag")}}</label>
    <form class="flex items-center gap-x-1" action="{{route('admin.hashtag.store')}}" method="POST">

        @csrf
        <div class="w-2/5 my-3">
        <input type="text" name="name" id="name" value="{{old('name')}}" required class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{__("Name")}}">
        @error('name')
            <p class="text-xl text-red-500">{{$message}}</p>
        @enderror
        </div>
        <div class="w-2/5 my-3">
        <input type="text" name="desc" id="desc" value="{{old('desc')}}" required class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{__("Desecration")}}">
        @error('name')
            <p class="text-xl text-red-500">{{$message}}</p>
        @enderror
        </div>
        <x-button>
        {{__("Save")}}
        </x-button>
    </form>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-md rtl:text-right text-gray-500">
        <thead class="text-xl text-gray-700 bg-gray-50">
            <tr>
                <th scope="col" class="px-4 py-3 ">
                    {{__('name')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Number Of Videos')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Delete')}}
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($hashtags as $hashtag)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                <td class="px-6 py-4">{{$hashtag->name}}</td>
                <td class="px-6 py-4">
                    {{$hashtag->videos_count}}
                </td>
                <td class="px-6 py-4">
                    <div>
                        <form action="{{route('admin.hashtag.destroy',$hashtag->id)}}"  method="POST">
                            @method("DELETE")
                            @csrf
                            @if (auth()->user()->isSuperAdmin() )
                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1" onclick="return confirm('Are You Sure')">{{__('Delete')}}</button>
                            @else
                                <dev class="text-white bg-red-400 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm px-2 py-1">{{__('Delete')}}</dev>
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
    {{$hashtags->links()}}
</div>

@endsection
