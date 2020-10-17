@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n5 mt-5 row mx-0 justify-content-center">
        @if($results != null)
            <h1 style="z-index: -1;" class="text-success text-center mb-4 col-12 mx-0">Years</h1>
        @endif    
        @forelse($results as $years)
            <a href="{{ route('all_months',['id' => $years->id ]) }}" class="btn bg-light text-center text-success border-secondary p-4 m-1 col-5 col-md-3 col-xl-3">
                <h2>{{$years->year}}</h2>
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