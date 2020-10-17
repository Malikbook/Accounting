@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n1 mt-1 row mx-0 justify-content-center">
        @if($results != null)
            <div class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all') }}" style="font-size: 25px;" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 style="z-index: -1;" class="text-success text-center mb-4 col-12 mx-0">Months</h1>
        @endif
        @forelse($results as $months)
            <a href="{{ route('all_days', [ 'id' => $months->id ]) }}" class="btn bg-light text-success border-secondary w-100 h-100 m-1 col-5 col-md-3 col-xl-3">
                <h2>{{$months->month}}</h2>
                <div class="w-100 text-left">
                    @if($months->limit_amount != null)
                        <span class="text-dark font-italic">The amount of the limit:<b class="text-success"> {{$months->limit_amount}} &#x20b4;</b></span>
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
            <div class="row mb-n5 mt-5">
                <h1 class="col-12 text-center text-warning">Empty!</h1>
            </div>
            <div class="col-12 text-center mx-0 mb-n5 mt-5">
                <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
            </div> 
        @endforelse
    </div>
@endsection