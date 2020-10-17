@extends('layouts.home_page')

@section('app_content')
    <div class="mb-md-n1 row mx-0 justify-content-center">
        @if($results != null)
            <div class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all_days', [ 'id' => $results[0]->month_id ]) }}" style="font-size: 25px;" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 style="z-index: -1;" class="text-success text-center mb-4 col-12 mx-0">Costs</h1>
        
            <div class="col-10 my-2 justify-content-center border-top border-bottom border-primary mx-0">
                <?php $s = 0?>
                @foreach($results as $costs)
                   <?php $s += $costs->cost_amount?>
                @endforeach
                @if($results[0]->limit_amount != null)
                    @if($s < $results[0]->limit_amount)
                        <div class="col-12 mx-0">
                            <h1 class="text-success"><i class="text-dark">The limit is met: </i>+{{$results[0]->limit_amount - $s}}&#x20b4;</h1>
                        </div>
                    @else
                        <div class="col-12 mx-0">
                            <h1 class="text-danger"><i class="text-dark">Limit not met: </i>-{{$s - $results[0]->limit_amount}}&#x20b4;</h1>
                        </div>
                    @endif
                @else
                        <div class="col-12 mx-0">
                            <h1 class="text-secondary font-italic">No limit is provided...</h1>
                        </div>
                @endif
            </div>
        @endif
        @forelse($results as $costs)
            <div class="border border-success col-5 my-2 mx-2">
                <div style="font-size: 25px;" class="col-12 text-center border-bottom">
                    <i">Title:</i> {{$costs->title}}
                </div>
                <div class="row mx-0">
                    <h2 class="cost_border text-success col-12 col-lg-5 mx-0 p-3">{{$costs->cost_amount}}&#x20b4;</h2>
                    @if($costs->description != null)
                        <span class="col-6 mx-0 p-3">{{$costs->description}}</span>
                    @else
                        <span class="col-6 mx-0 p-3 text-muted">No description...</span>
                        @endif
                </div>
                <div class="border-top col-12 text-center">
                    <span class=""><i>Date added:</i> {{$costs->created_at}}</span>
                </div>
            </div>       
        @empty
            <div class="row mb-n5 mt-4">
                <h1 class="col-12 text-center text-warning">Empty!</h1>
            </div>
            <div class="col-12 text-center mx-0 mb-n5 mt-5">
                <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
            </div>
        @endforelse
    </div>
@endsection