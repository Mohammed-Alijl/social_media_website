<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('app.name', 'Laravel')</title>

    <!-- Scripts -->
    <script src="{{URL::asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{URL::asset('js/vendor/jquery-3.3.1.slim.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/vendor/popper.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"  crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{URL::asset('js/vendor/jquery-3.3.1.slim.min.js')}}"><\/script>')</script>
    <script src="{{URL::asset('js/vendor/tilt.jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
        ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
    </script>
    <script src="{{URL::asset('https://www.google-analytics.com/analytics.js')}}" async defer></script>


    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{URL::asset('favicon.ico')}}">
    <link rel="manifest" href="{{URL::asset('site.webmanifest')}}">
    <link rel="apple-touch-icon" href="{{URL::asset('icon.png')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/hamburgers.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/util.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

</head>
<body>
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </div>--}}
            @yield('content')


</body>
</html>
