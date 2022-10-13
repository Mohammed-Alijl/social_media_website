<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function deleteFollow($followedUser_id){
        if (!$followedUser_id){
            return redirect()->back();
        }
        $user = User::find(Auth::id());
        $user->followByYou()->Detach($followedUser_id);
//        Friend::where(['user_id'=>Auth::id(),'followedUser_id'=>$followedUser_id])->delete();
        return redirect()->back();
    }
}
