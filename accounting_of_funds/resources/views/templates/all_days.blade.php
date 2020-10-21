@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n1 mt-1 row mx-0 justify-content-center">
        @if(($results != null) && (count($results['days']) != 0))
            <div class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all_months', [ 'id' => $results['days'][0]->year_id]) }}" style="font-size: 25px;" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 style="z-index: -1;" class="text-light text-center mb-4 col-12 mx-0">Days</h1>
        @endif
            @if(count($results) != 0)
                @forelse($results['days'] as $days)
                    @foreach($results['check'] as $check_days)
                        @if($check_days == $days->numeric)
                            <a href="{{ route('all_costs', ['id' => $days->id]) }}" class="btn bg-light text-center text-success border-secondary p-3 m-1 col-5 col-md-3 col-xl-3">
                                <h2>{{$days->numeric}}</h2>
                            </a>
                        @endif
                    @endforeach
                @empty
                        <div class="row mt-5">
                            <h1 class="col-12 text-center text-warning">Empty!</h1>
                        </div>
                        <div class="col-12 my-5 text-center mx-0">
                            <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
                        </div>
                @endforelse

                    <h3 class="text-center mt-5 mx-2 py-3 charts-title container">Deduction of all expenses in each day</h3>

                    <div class="container mt-2 mx-2 content-bg" style="height: 400px; margin-bottom: 50px" id="donut-example"></div>
                    <script>Morris.Donut({
                            element: 'donut-example',

                            data: [
                               @foreach($results['days'] as $days)
                                    @foreach($results['check'] as $limit => $check_days)
                                        @if($check_days == $days->numeric)
                                            {label: `{{$days->numeric}} day`, value: {{(int)$limit}} },
                                        @endif
                                @endforeach
                                @endforeach
                            ],
                            resize: true,
                        });
                    </script>
            @else
                <div class="row mt-5">
                    <h1 class="col-12 text-center text-warning">Empty!</h1>
                </div>
                <div class="col-12 my-5 text-center mx-0">
                    <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
                </div>
            @endif
    </div>
@endsection
