@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n1 mt-1 row mx-0 justify-content-center">
        @if($results['months'] != null)
            <div class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all') }}" style="font-size: 25px;" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 style="z-index: -1;" class="text-light text-center mb-4 col-12 mx-0">Months</h1>
        @endif

        @forelse($results['months'] as $months)
            <a href="{{ route('all_days', [ 'id' => $months->id ]) }}" class="card-link-months btn bg-light text-success border-secondary w-100 h-100 m-1 col-9 col-md-3 col-xl-3">
                <h2>{{$months->month}}</h2>
                <div class="w-100 text-left">
                    @if($months->limit_amount != null)
                        <span class="text-dark font-italic">The amount of the limit:<b class="text-success amount-wrap-none"> {{$months->limit_amount}} &#x20b4;</b></span>
                    @else
                        @if($months->month == date('F'))
                            <span class="text-secondary font-italic">You need to add the amount of the limit in the user settings...</span>
                        @else
                            <span class="text-secondary font-italic">This month the limit was not required...=)</span>
                        @endif
                    @endif
                </div>
            </a>
        @empty
                <div class="row mt-5">
                    <h1 class="col-12 text-center text-warning">Empty!</h1>
                </div>
                <div class="col-12 my-5 text-center mx-0">
                    <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
                </div>
        @endforelse

        @if($results['limit'] != null )

                <h3 class="text-center mt-5 mx-2 py-3 charts-title container">Comparison one month limit with real costs</h3>

                <div class="container mt-2 mx-2 content-bg" style="height: 400px; margin-bottom: 50px" id="bar-example"></div>

            <script>
                Morris.Bar({
                    element: 'bar-example',
                    data: [
                            @foreach($results['months'] as $ress){ m: @foreach($results['limit'] as $res) @if($ress->month == $res->month) `{{$ress->month}}`, @endif @endforeach a: @foreach($results['limit'] as $res) @if($res->month == $ress->month) {{$ress->limit_amount}}, @endif @endforeach b: @foreach($results['limit'] as $res) @if($res->month == $ress->month) {{$res->total}} @endif @endforeach }, @endforeach
                    ],
                    xkey: 'm',
                    ykeys: ['a', 'b'],
                    labels: ['Limit', 'Total Costs ₴'],
                    resize: true,
                    gridTextColor: '#111',
                    barColors: ['#838383', '#2C91FF'],

                });
            </script>
        @endif
    </div>
@endsection
