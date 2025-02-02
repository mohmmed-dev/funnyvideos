@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Dashboard')}}</h1>
@endsection
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-md rtl:text-right text-gray-500">
        <thead class="text-xl text-gray-700 bg-gray-50">
            <tr >
                <th scope="col" class="px-4 py-3 ">
                    {{__('Video Title')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Channel Name')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Views')}}
                </th>
                <th scope="col" class="px-4 py-3">
                    {{__('Date')}}
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($mostView as $view)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                <td class="px-6 py-4">
                    <a href="{{route('video.show',$view->video->id)}}">{{$view->video->title}}</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('Channels.show',$view->user->id)}}">
                        {{$view->user->name}}
                    </a>
                </td>
                <td class="px-6 py-4">
                    {{$view->views}}
                </td>
                <td class="px-6 py-4">
                    {{$view->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="my-4">
    <canvas id="myChart"></canvas>
    </div>
@endsection

@section('script')

<script>
    let names = <?= $names ?> ;
    let totalViews = <?= $totalViews ?>;
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: names,
        datasets: [{
            label: "{{__('Most Videos Views')}}",
            data: totalViews,
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>


@endsection
