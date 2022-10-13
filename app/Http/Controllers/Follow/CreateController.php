<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function addFollow($followedUser_id){
        if (!$followedUser_id){
            return redirect()->back();
        }
        $user = User::find(Auth::id());
        $user->followByYou()->syncwithoutdetaching($followedUser_id);
//        Friend::create([
//           'user_id'=>Auth::id(),
//            'followedUser_id'=>$followedUser_id
//        ]);
        return redirect()->back();
    }
}
