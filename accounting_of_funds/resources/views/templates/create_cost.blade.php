@extends('layouts.home_page')

@section('app_content')
    <div class="container mb-md-n5 my-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-light">{{ __('Create Cost') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('added') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-7">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-7">
                                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" step="0.1" value="{{ old('amount') }}" required autocomplete="amount">

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-7">
                                    <textarea id="desc" rows="4" class="create_textarea form-control @error('desc') is-invalid @enderror" name="desc" autocomplete="desc"></textarea>

                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success px-5">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection