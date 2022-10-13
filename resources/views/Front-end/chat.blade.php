@extends('layouts.master')
@section('title','chat')
@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h2{
            padding-left: 550px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px auto;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
@endsection
@section('content')
    <h2>Chat Messages</h2>
    @if(isset($sender->room->messages) && $sender->room->messages->count()>0)
    @foreach($sender->room->messages as $message)
    <div class="container {{$message->user_id!==Auth::id()?'darker':''}}">
        <img src="{{asset('img/users/profile_picture/' . $message->user->profile_photo)}}" alt="Avatar" style="width:100%;">
        <p>{{$message->message_content}}</p>
        <span class="time-right">{{$message->created_at->isoFormat('hh:m A')}}</span>
    </div>
    @endforeach
    @endif
    <div class="row comment-list" style="padding: 10px;margin: 10px auto;">
        <div class="add-comment col-12 pb-2">
            <div class="row">
                <div class="col-1">
                    <div class=" pt-2 pl-2 d-inline-block">
                        <div class="Profile-Picture-Comment " style="background: url({{asset('img/users/profile_picture/' . auth()->user()->profile_photo)}}) "></div>
                    </div>
                </div>
                <form action="{{route('profile.chat.message.send',[Auth::id(),$sender->room_id])}}" method="post">
                    @csrf
                    <div class="comment-box col-11 pl-0">
                        <div class="row pr-2 pt-2 pb-2 pl-0">
                            <div class="col pl-0">
                                <input type="text" class="p-2 fs-14 pl-3" placeholder="Send Message ..." name="message_content">
{{--                                <input type="hidden" value="{{Auth::id()}}" name="user_id">--}}
{{--                                <input type="hidden" value="{{$sender->room_id}}" name="room_id">--}}
                                <button class="float-r  p-2 fs-16 post" style="">send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('https://js.pusher.com/7.2/pusher.min.js')}}"></script>
    <script>
        var pusher = new Pusher('71827925983113713cef', {
            cluster: 'ap2'
        });
    </script>
@endsection
