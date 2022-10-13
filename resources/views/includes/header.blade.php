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

