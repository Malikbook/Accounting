<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- fav -->
        <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('style/app_style/style.css') }}" rel="stylesheet">
        <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

        {{--  script --}}
        <script src="https://kit.fontawesome.com/1a41a6606b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="{{asset('style/js/liteChart.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm nav_l">
            <div class="container">
                <div class="content">
                        <a class="navbar-brand" href="{{ route('homepage') }}">
                        {{ config('app.name', 'Laravel') }}
                        </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('account', ['id' => Auth::user()]) }}">Home</a>
                                    </li>
                                    <li class="nav-item nav_border">
                                        <a class="nav-link" href="{{ route('all') }}">All Records</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('create') }}">New Record</a>
                                    </li>

                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="w-100 content_l">
            @yield('app_content')
        </div>

        <footer class="row mx-0 pt-2 pt-sm-4 pt-md-0 footer_l">
            <div class="container footer-content_position">
                <div class="row mx-0 my-4 justify-content-center justify-content-sm-between">
                    <div class="content_f text-nowrap mr-0 mr-md-2">
                        <span class="text-nowrap">{{__('Write my:')}} <a class="nav-link p-0" href="{{ route('crate_mail') }}">vashchuk98@icloud.com</a></span>
                    </div>
                    <div class="social-link_adaptive ml-0 ml-md-2">
                        <a href="https://www.facebook.com/profile.php?id=100005710125709" style="font-size: 40px;" class="fab fa-facebook text-decoration-none"></a>
                        <a href="https://www.instagram.com/oleksii_vashchuk/" style="font-size: 43px;" class="fab fa-instagram text-decoration-none mx-2"></a>
                        <a href="https://t.me/malik_alexxey" style="font-size: 40px;" class="fab fa-telegram text-decoration-none"></a>
                    </div>
                </div>
            </div>
            <hr class="col-10 justify-content-center my-0 py-0 w-75">
            <small class="col-12 text-center">&copy;Alex_studio)2020</small>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{asset('style/js/liteChart.js')}}"></script>
        <script src="{{ asset('style/js/main.js')  }}"></script>
    </body>
</html>
