@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n5 mt-5 row mx-0 justify-content-center">
        @if($results['year'] != null)
            <h1 style="z-index: -1;" class="text-light text-center mb-4 col-12 mx-0">Years</h1>
        @endif
        @forelse($results['year'] as $years)
            <a href="{{ route('all_months',['id' => $years->id ]) }}" class="btn bg-light text-center text-success border-secondary p-4 m-1 col-5 col-md-3 col-xl-3">
                <h2>{{$years->year}}</h2>
            </a>
        @empty
                <div class="row mt-5">
                    <h1 class="col-12 text-center text-warning">Empty!</h1>
                </div>
                <div class="col-12 my-5 text-center mx-0">
                    <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
                </div>
        @endforelse
            @if($results['costs'] != null)

                <h3 class="text-center mt-5 mx-2 py-3 charts-title container">Display the last 5 years with the sum of all costs</h3>

                <div class="container mt-2 mx-2 content-bg" style="height: 400px; margin-bottom: 80px" id="bar-example"></div>

                <script>
                    Morris.Bar({
                        element: 'bar-example',
                        data: [
                                @foreach($results['costs'] as $cost){ y: {{$cost->year}}+' year', a: {{$cost->total}} }, @endforeach
                        ],
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Total Cost ₴'],
                        resize: true,
                        gridTextColor: '#111',
                        barColors: ['#2C91FF'],
                    });
                </script>
            @endif
    </div>
@endsection
