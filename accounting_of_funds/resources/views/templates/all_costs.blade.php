@extends('layouts.home_page')

@section('app_content')
    <div class="mt-3 content-bg row mx-0 justify-content-center">
        @if(($results != null) && (count($results['months'])) != 0)
            <div style="z-index: 3" class="col-12 mx-0 mb-n5 mt-5">
                <a href="{{ route('all_days', [ 'id' => $results['months'][0]->month_id ]) }}" style="font-size: 25px; z-index: 1" class="btn bg-light text-left ml-4 text-danger">&lArr;</a>
            </div>
            <h1 class="text-success text-center mb-4 col-12 mx-0">Costs</h1>

            <div class="col-10 my-2 justify-content-center border-top border-bottom border-primary mx-0">

                @foreach($results['limit'] as $one_limit)
                    @if($one_limit->month == $results['months'][0]->month)
                        @if($results['months'][0]->limit_amount != null)
                            @if($one_limit->total < $results['months'][0]->limit_amount)
                                <div class="col-12 mx-0">
                                    <h1 class="text-success"><i class="text-dark">The limit is met: </i>+{{$results['months'][0]->limit_amount - $one_limit->total}}&#x20b4;</h1>
                                </div>
                            @else
                                <div class="col-12 mx-0">
                                    <h1 class="text-danger"><i class="text-dark">Limit not met: </i>-{{$one_limit->total - $results['months'][0]->limit_amount}}&#x20b4;</h1>
                                </div>
                            @endif
                        @else
                                <div class="col-12 mx-0">
                                    <h1 class="text-secondary font-italic">No limit is provided...</h1>
                                </div>
                        @endif
                    @endif
                @endforeach
            </div>
        @endif
        @if(count($results) != 0)
                @forelse($results['months'] as $costs)
                    <div class="border border-primary col-5 my-2 mx-2">
                        <div style="font-size: 25px;" class="col-12 text-center border-bottom border-primary">
                            <i>Title:</i> {{$costs->title}}
                        </div>
                        <div class="row mx-0">
                            <h2 class="cost_border border-primary text-success col-12 col-lg-5 mx-0 p-3">{{$costs->cost_amount}}&#x20b4;</h2>
                            @if($costs->description != null)
                                <span class="col-6 mx-0 p-3">{{$costs->description}}</span>
                            @else
                                <span class="col-6 mx-0 p-3 text-muted">No description...</span>
                                @endif
                        </div>
                        <div class="border-top border-primary col-12 text-center">
                            <span class=""><i>Date added:</i> {{$costs->created_at}}</span>
                        </div>
                    </div>
                @empty
                            <div class="row mt-5">
                                <h1 class="col-12 text-center text-warning">Empty!</h1>
                            </div>
                            <div class="col-12 my-5 text-center mx-0">
                                <a href="{{ route('create') }}" class="badge badge-success text-light border-secondary mb-n5 mt-5" style="font-size: 25px;">Create Cost</a>
                            </div>
                @endforelse
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
