<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Notifications\CreateNewPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CreateController extends Controller
{
    public function addPost(PostRequest $request, $user_id)
    {
        if (!$user_id) {
            return redirect()->route('home');
        }
        $post = Post::create([
            'post_content' => $request->postContent,
            'user_id' => $user_id
        ]);
        $followers = auth()->user()->followYou()->get();
        Notification::send($followers,new CreateNewPost($post->id));
        return redirect()->back();
    }

    public function display($post_id){
        $post = Post::findOrFail($post_id);
        $notification_id = DB::table('notifications')->where('data->post_id',$post_id)->pluck('id');
        DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);
        return view('Front-end.post',compact('post'));
    }

    public function readAllNotifications(){
        foreach (auth()->user()->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
