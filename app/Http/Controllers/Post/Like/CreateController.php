<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;

class CreateController extends Controller
{
    public function addLike($user_id,$post_id){
        if(!$user_id || !$post_id){
            return redirect()->back();
        }
        Like::create([
            'user_id'=>$user_id,
            'post_id'=>$post_id
        ]);
        return redirect()->back();
    }
}
