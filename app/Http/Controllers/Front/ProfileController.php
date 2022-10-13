<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function goProfile()
    {
        return view('Front-end.profile',with(['posts'=>$this->getPosts()]));
    }
    private function getPosts(){

//        return Profile::posts()->where('user_id',$user_id)->orderBy('created_at','desc')->paginate(PAGINATION_COUNT);
        return auth()->user()->post()->orderBy('created_at','desc')->paginate(PAGINATION_COUNT);

    }
}
