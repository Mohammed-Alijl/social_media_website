<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function goFollowing($followedUser_id){
        if(!$followedUser_id)
            return redirect()->back();
        if(!User::find($followedUser_id))
            return redirect()->route('home');
        if($followedUser_id==Auth::id())
            return redirect()->route('profile');

        return view('Front-end.following',with(['followedUser_id'=>$followedUser_id,'posts'=>$this->getPosts($followedUser_id)]));
    }

    private function getPosts($user_id){
        $user = User::find($user_id);
        if(!$user)
            return redirect()->route('home');
        return $user->post()->orderBy('created_at','desc')->paginate(PAGINATION_COUNT);
    }
}
