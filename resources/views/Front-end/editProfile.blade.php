@extends('layouts.app')
@section('title','Edit profile')
@section('content')
    <div class="limiter">
        <div class="container-login100">
                <div class="wrap-login100" style="padding-top:153px">
                    <div class="login100-pic js-tilt" data-tilt>
                        <form method="POST" action="{{ route('profile.edit.apply') }}" enctype="multipart/form-data">
                            @csrf
                            <span class="login100-form-title">Edit Profile</span>
                            <div class="main-block">
                            <div class="coverPicture" style="background: url({{asset('img/users/cover_picture/' . auth()->user()->cover_photo)}});">
                                <div style="position: absolute;left: 20px" class="image-upload">

                                    <label for="cover_picture">
                                        <!-- <img src="https://goo.gl/pB9rpQ"/> -->
                                        <i class="fa fa-camera"></i>
                                    </label>
                                    <input id="cover_picture" type="file" accept="image/png, image/jpeg" name="cover_picture"/>
                                </div>
                            </div>
                            <div class="profilePicture" style="background: url({{asset('img/users/profile_picture/' . auth()->user()->profile_photo)}});">
                                <div class="image-upload">

                                        <label for="profile_picture">
                                            <!-- <img src="https://goo.gl/pB9rpQ"/> -->
                                            <i class="fa fa-camera"></i>
                                        </label>
                                        <input id="profile_picture" type="file" accept="image/png, image/jpeg" name="profile_picture"/>
                                </div>
                            </div>
                            <div class="FullName text-center  fs-18 ProjectColor ">
                                {{Auth::user()->name}}
                            </div>
                        </div>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="fullname is required">
                        <input class="input100" type="text" name="name" placeholder="Full Name" value="{{auth()->user()->name}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="if you want to change password just put your new password her else leave it">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Edit
                        </button>
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

