@extends('layouts.app')
@section('app.name','login')
@section('content')
 <!--[if lte IE 9]>
<![endif]-->

<!-- Add your site or application content here -->

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{URL::asset('img/img-01.png')}}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login')}}">
                @csrf
					<span class="login100-form-title animated">
						Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                @if (Route::has('password.request'))
                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="{{ route('password.request') }}">
                        Username / Password?
                    </a>
                </div>
                @endif
                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('register')}}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection



{{--@if (Route::has('password.request'))--}}
{{--    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--        {{ __('Forgot Your Password?') }}--}}
{{--    </a>--}}
{{--@endif--}}

