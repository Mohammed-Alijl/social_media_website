<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CreateController extends Controller
{
    public function createComment(CommentRequest $request,$post_id,$user_id){
        if (!$post_id || !$user_id){
            return redirect()->back();
        }
        Comment::create([
            'post_id'=>$post_id,
           'user_id'=>$user_id,
           'comment_content'=>$request->comment_content
        ]);
        return redirect()->back();
    }
}
