<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- fav -->
    <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a41a6606b.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset( 'style/app_style/style.css' ) }}" rel="stylesheet">
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm nav_l">
            <div class="container">

                <a class="navbar-brand" href="{{ route('homepage') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="py-4 my-auto">
        @yield('content')
    </main>

    <footer class="row mx-0 pt-sm-4 footer_l">
        <div class="container footer-content_position">
            <div class="row mx-0 justify-content-center justify-content-sm-between">
                <div class="content_f text-nowrap mr-0 mr-md-2">
                    <span class="text-nowrap">{{__('Write my:')}} <a class="nav-link p-0" href="{{ route('crate_mail') }}">vashchuk98@icloud.com</a></span>
                </div>
                <div class="social-link_adaptive ml-0 ml-md-2">
                    <a href="https://www.facebook.com/profile.php?id=100005710125709" style="font-size: 40px;" class="fab fa-facebook text-decoration-none text-primary"></a>
                    <a href="https://www.instagram.com/oleksii_vashchuk/" style="font-size: 43px;" class="fab fa-instagram text-decoration-none mx-2 text-danger"></a>
                    <a href="https://t.me/malik_alexxey" style="font-size: 40px;" class="fab fa-telegram text-decoration-none text-info"></a>
                </div>
            </div>
        </div>
        <hr class="col-10 justify-content-center my-0 py-0 w-75">
        <small class="col-12 text-center">&copy;Alex_studio)2020</small>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/js/main.js')  }}"></script>
</body>
</html>
