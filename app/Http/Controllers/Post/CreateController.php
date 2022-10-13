<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function addPost(PostRequest $request, $user_id)
    {
        if (!$user_id) {
            return redirect()->route('home');
        }
        Post::create([
            'post_content' => $request->postContent,
            'user_id' => $user_id
        ]);
        return redirect()->back();
    }
}
