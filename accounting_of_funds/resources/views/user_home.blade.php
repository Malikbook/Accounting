@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card_user">
                <div class="card-header bg-info text-light">{{ __('Your Account') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="py-2">
                        <h1 class="text-center">{{ Auth::user()->name }}</h1>
                        <div class="py-4">
                            <p><b>E-mail:</b> {{ Auth::user()->email }}</p>
                            <p><b>Account created:</b> {{ Auth::user()->created_at }}</p>
                            <p><b>Account updated:</b> {{ Auth::user()->updated_at }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer row mx-0 justify-content-around">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateAccount">
                        Editing user
                    </button>

                    <span style="font-size: 25px" class="usHome_border">|</span>

                    <button type="button" id="{{$add_limit}}" class="btn btn-primary" data-toggle="modal" data-target="#add_limitSum">
                        Add Limit Sum
                    </button>

                    <span style="font-size: 25px" class="usHome_border">|</span>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount">
                        Delete account
                    </button>

                    <!-- Modal -->

                    <div class="modal fade" id="updateAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Account Editing</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('edit') }}">
                                            @csrf

                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('New Name') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="new_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('New E-Mail') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group d-flex justify-content-around border-top border-dark mt-2 form_up_button">
                                                    <button type="submit" name="submit" class="bg-white text-success btn font-weight-bolder">{{ __('Edit') }}</button>
                                                    <span style="font-size: 25px" class="usHome_border">|</span>
                                                    <button class="bg-white text-danger btn font-weight-bolder" data-dismiss="modal" aria-label="Close">{{ __('Close') }}</button>
                                                </div>

                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="add_limitSum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Limit Sum</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex justify-content-around">
                                <div class="card">
                                        <h5 class="mx-2 my-2 text-center">Here you can add the estimated amount of expenses per month!</h5>
                                        <hr>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('add') }}">
                                            @csrf

                                                <div class="form-group row">
                                                    <label for="sum" class="col-md-4 col-form-label text-md-right">{{ __('New Sum') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="sum" type="number" class="form-control @error('sum') is-invalid @enderror" step="0.1" name="sum" value="{{ old('sum') }}" required autocomplete="sum" autofocus>

                                                        @error('sum')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-around border-top border-dark mt-2 form_up_button">
                                                    <button type="submit" name="submit" class="bg-white text-success btn font-weight-bolder">{{ __('Add') }}</button>
                                                    <span style="font-size: 25px" class="usHome_border">|</span>
                                                    <button class="bg-white text-danger btn font-weight-bolder" data-dismiss="modal" aria-label="Close">{{ __('Close') }}</button>
                                                </div>

                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete the account?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex justify-content-around">
                                    <a class="text-danger font-weight-bolder" href="{{ route('delete', ['id' => Auth::user()->id]) }}">Yes</a>
                                    <span style="font-size: 25px" class="usHome_border">|</span>
                                    <a class="font-weight-bolder" href="#" data-dismiss="modal" aria-label="Close">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
