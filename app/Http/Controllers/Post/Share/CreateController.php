<?php

namespace App\Http\Controllers\Post\Share;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function addShare($post_id){
        if(!$post_id)
            return redirect()->back();
        $post = Post::find($post_id);
        Post::create([
            'user_id'=>Auth::id(),
            'post_content'=>$post->post_content
        ]);
        return redirect()->route('profile');
    }
}
