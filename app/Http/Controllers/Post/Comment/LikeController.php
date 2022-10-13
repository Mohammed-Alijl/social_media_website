<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Comment_like;

class LikeController extends Controller
{
    public function add($user_id,$comment_id){
        if(!$user_id || !$comment_id)
            return redirect()->back();
        Comment_like::create([
            'user_id'=> $user_id,
            'comment_id'=>$comment_id
        ]);
        return redirect()->back();
    }
    public function delete($user_id,$comment_id){
        if(!$user_id || !$comment_id){
            return redirect()->back();
        }
        Comment_like::where(['user_id'=>$user_id,'comment_id'=>$comment_id])->delete();
        return redirect()->back();
    }
}
