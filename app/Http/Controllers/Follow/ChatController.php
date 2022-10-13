<?php

namespace App\Http\Controllers\Follow;

//use App\Events\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function chat($user_id){
        if(!$user_id)
            return redirect()->route('home');
        $senderRoomIds = Participant::where('user_id',Auth::id())->get()->pluck('room_id')->all();
        $receiverRoomIds = Participant::where('user_id',$user_id)->get()->pluck('room_id')->all();
        $room_id = array_intersect($senderRoomIds,$receiverRoomIds);
        if(!$room_id){
            $room = Room::create();
            $sender = Participant::create(['user_id'=>Auth::id(),'room_id'=>$room->id]);
            Participant::create(['user_id'=>$user_id,'room_id'=>$room->id]);
            return view('Front-end.chat',compact('sender'));
        }
        $sender = Participant::where(['user_id'=>Auth::id(),'room_id'=>$room_id])->first();
        return view('Front-end.chat',compact('sender'));
    }

    public function sendMessage(MessageRequest $request,$user_id,$room_id){
//        Message::create([
//            'user_id '=>$user_id,
//            'room_id '=>$room_id,
//            'message_content'=>$request->message_content
//        ]);
        $message = DB::table('messages')->insert(['user_id'=>$user_id,'room_id'=>$room_id,'message_content'=>$request->message_content,"created_at" =>  \Carbon\Carbon::now()]);
        return redirect()->back();
    }

}
