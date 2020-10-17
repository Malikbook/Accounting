@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n1 mt-1 row mx-0 justify-content-center">
        @if($results != null)
            <div class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all_months', [ 'id' => $results[0]->year_id]) }}" style="font-size: 25px;" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 style="z-index: -1;" class="text-success text-center mb-4 col-12 mx-0">Days</h1>
        @endif    
        @forelse($results as $days)
            <a href="{{ route('all_costs', ['id' => $days->id]) }}" class="btn bg-light text-center text-success border-secondary p-3 m-1 col-5 col-md-3 col-xl-3">
                <h2>{{$days->numeric}}</h2>
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