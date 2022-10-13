<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;

class DeleteController extends Controller
{
    public function deleteLike($user_id,$post_id){
        if (!$user_id || !$post_id){
            return redirect()->back();
        }
        Like::where(['user_id'=>$user_id,'post_id'=>$post_id])->delete();
        return redirect()->back();
    }
}
