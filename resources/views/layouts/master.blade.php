<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','known')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{URL::asset('favicon.ico')}}">

    <link rel="manifest" href="{{URL::asset('site.webmanifest')}}">
    <link rel="apple-touch-icon" href="{{URL::asset('icon.png')}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{URL::asset('css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/hamburgers.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/util.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
@yield('head')
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-main">
            @include('includes.header')
            @yield('content')
        </div>
    </div>
</div>


<script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{URL::asset('js/vendor/jquery-3.3.1.slim.min.js')}}" ></script>
<script src="{{URL::asset('js/vendor/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"  ></script>
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
<script src="{{asset('https://code.jquery.com/jquery-3.6.0.slim.min.js')}}" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
