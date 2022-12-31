<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light  bgwhite">
            <a class="navbar-brand ProjectColor" href="" >WebProject</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item {{request()->route()->named("home")?'active':''}}" >
                        <a class="nav-link fs-15" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

                        <li class="nav-item {{request()->route()->named('profile')?'active':''}}">
                        <a class="nav-link fs-15" href="{{route('profile')}}">Profile</a>
                    </li>

                    <li class="nav-item pt-2 pl-3">
                        <form action="">
                            <input type="search" class="p-1 fs-14 pl-3 input-border"  placeholder="Search .. !">
                        </form>
                    </li>

                    <li class="nav-item pt-2 pl-3" style="position: relative">
                        <button id="notification-button"><i class="fa fa-bell-o" aria-hidden="true" style="position: relative;font-size: 20px"></i></button>
                        <ul id="notification-list" class="notification-list">
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                <a href="{{route('post.display',$notification->data['post_id'])}}">
                            <li>
                                <div class="notification">
                                    <img src="{{asset('img/users/profile_picture/' . $notification->data['user_image'])}}" alt="Profile image" class="profile-image">
                                    <div class="text">
                                        <p class="name">{{$notification->data['user_name']}}</p>
                                        <p class="message">{{$notification->data['message']}}</p>
                                    </div>
                                    <time class="time">{{$notification->created_at->diffForHumans()}}</time>
                                </div>
                            </li>
                                </a>
                            @endforeach
                            <li><a style="padding-left: 40%" href="{{route('notification.readAll')}}">View All</a></li>
                        </ul>
                        <div class="number-notification">
                            <p style="color: white;text-align: center">{{auth()->user()->unreadNotifications->count()}}</p>
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="nav-link fs-18"  data-toggle="tooltip" data-placement="top" title="Log out !"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

