@extends('layouts.master')
@section('route same page','"{{route("profile")}}"')
@section('title','Profile Page')
@section('content')
            <div class="container mt-5" style="width: 75%">
                <div class="row">
                    <div class="col ">
                        <div class="main-block">
                            <div class="coverPicture" style="background: url({{asset('img/users/cover_picture/' . auth()->user()->cover_photo)}});"></div>
                            <div class="profilePicture" style="background: url({{asset('img/users/profile_picture/' . auth()->user()->profile_photo)}});"></div>
                            <div class="FullName text-center  fs-18 ProjectColor ">
                                {{Auth::user()->name}}
                            </div>
                            <a href="{{route('profile.edit')}}" style="margin-left: 900px;margin-bottom: 10px;color: white" class="btn btn-primary">Edit</a>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col col-sm-12  mobile-shown">
                        <form action="{{route('post.add',Auth::id())}}" method="POST">
                            @csrf
                        <div class=" main-block create-section">
                            <div class="create">
                                <div class="text-area pt-3">
                                    <textarea name="postContent" class="w-full p-3 fs-16 " style="height: 75px;resize: none;color: #666666;    border-radius: 5px;" placeholder="What About Today ?!"></textarea>
                                </div>
                                <!--<hr class="m-1">-->
                                <div class="action p-2 pr-3">
                                    <button class="float-r  p-2 fs-16 post" style="">Post</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        </form>
                        @foreach($posts as $post)
                        <div class="main-block post-without-photo">
                            <div class="Post-Box ">
                                <div class="header row ">
                                    <div class="col-2">
                                        <div class=" pt-2 pl-2 d-inline-block">
                                            <div class="Profile-Picture " style="background: url({{asset('img/users/profile_picture/' . auth()->user()->profile_photo)}}) "></div>
                                        </div>
                                    </div>
                                    <div class="col-9 p-l-0" style="margin-left: -60px; margin-right: 60px ">
                                        <div class="UserName d-inline-block mt-3">
                                            <p><a href="" class="font-weight-bold">{{Auth::user()->name}}</a></p>
                                            <p class="lh-1-2"><a href="" class="fs-10">{{$post->created_at->isoFormat('HH:m A')}}</a> <i class="fa fa-globe fs-10" data-toggle="tooltip" data-placement="top" title="Public"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-1" >
                                        <div class="ActionBTN text-right pr-4 pt-4">
                                            <a href="">
                                                <i class="fa fa-chevron-down"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-2">
                                <div class="body row">
                                    <div class="details col ">
                                        <p class="px-3 ">{{$post->post_content}}</p>
                                    </div>
                                </div>
                                <hr class="mt-2 mb-0">
                                <div class="footer ">
                                    <form action="{{route('comment.add',[$post->id,Auth::id()])}}" method="post">
                                        @csrf
                                    <div class="row action-btn ">
                                        <div class="col ">
                                            @if(\App\Models\Post::isSetLike(Auth::id(),$post->id))
                                                <p class=" py-2 footer-btn text-center"><a href="{{route('post.like.delete',[Auth::id(),$post->id])}}"><i style="color: #f00" class="fa fa-heart" aria-hidden="true"></i> <span class="px-1"> Like</span></a></p>
                                            @else
                                                <p class=" py-2 footer-btn text-center"><a href="{{route('post.like.add',[Auth::id(),$post->id])}}"><i class="fa fa-heart-o" aria-hidden="true"></i> <span class="px-1"> Like</span></a></p>
                                            @endif
                                        </div>
                                        <div class="col border-left">
                                            <p class=" py-2 footer-btn text-center"><button><i class="fa fa-comment-o" aria-hidden="true"></i> <span class="px-1"> Comment</span></button></p>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-2">
                                    <div class="row comment-list">
                                        <div class="add-comment col-12 pb-2">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class=" pt-2 pl-2 d-inline-block">
                                                        <div class="Profile-Picture-Comment " style="background: url({{asset('img/users/profile_picture/' . auth()->user()->profile_photo)}}) "></div>
                                                    </div>
                                                </div>
                                                <div class="comment-box col-11 pl-0">
                                                    <div class="row pr-2 pt-2 pb-2 pl-0">
                                                        <div class="col pl-0">
                                                            <input type="text" class="p-2 fs-14 pl-3" placeholder="Add new comment" name="comment_content">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                            @foreach($post->comments as $comment)
                                        <div class="comment col-12 pt-0">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class=" pt-2 pl-2     d-inline-block">
                                                        <div class="Profile-Picture-Comment " style="background: url({{asset('img/users/profile_picture/' . \App\Models\User::find($comment->user_id)->profile_photo)}}) "></div>
                                                    </div>
                                                </div>
                                                <div class="comment-box col-10 pl-0">
                                                    <div class="row pr-2 pt-2 pb-2 pl-0">
                                                        <div class="col pl-0">
                                                            <a href="{{route('following',$comment->user_id)}}">{{\App\Models\Comment::getUsername($comment->user_id)}}</a>
                                                            <p class="pt-1 pl-2 pb-0 fs-14 " >{{$comment->comment_content}} </p>
                                                            @if(\App\Models\Comment::isSetLike(Auth::id(),$comment->id))
                                                                <p class="p-0 pl-2 fs-10"><a style="color: #8B54C7;font-weight: bold;font-size: 11px " href="{{route('comment.like.delete',[Auth::id(),$comment->id])}}" class="fs-10">Like </a> .
                                                            @else
                                                                <p class="p-0 pl-2 fs-10"><a href="{{route('comment.like.add',[Auth::id(),$comment->id])}}" class="fs-10">Like </a>
                                                                    @endif
                                                                <a href="" class="fs-10"> Comment </a> . <span class="fs-9">{{$comment->created_at->diffForHumans()}}</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
@endsection

