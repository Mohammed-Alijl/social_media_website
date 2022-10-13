<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function goHome()
    {
        return view(
            'Front-end.home',
            with(
                [
                    'posts'=>$this->getPosts(),
                    'nonFollowings' => $this->getUserNotFollowHim(),
                ]
            )
        );
    }

    private function getPosts()
    {
//        return auth()->user()->post()->orderBy('created_at', 'desc')->paginate(PAGINATION_COUNT);

          $youFollows = auth()->user()->followByYou()->with(['post'=>function($q){
              $q->orderby('created_at','desc')->get();
          }])->get();
          $posts=array();
        foreach ($youFollows as $youFollow){
            foreach ($youFollow->post as $post)
            array_push($posts ,$post);
        }
        foreach (Auth::user()->post()->orderBy('created_at','desc')->get() as $post)
        array_push($posts,$post);
        return collect($posts)->sortByDesc('created_at');
    }

    public function getUserNotFollowHim(){
        $youFollowIds = Auth::user()->followByYou->pluck('id');
        return User::whereNotIn('id',$youFollowIds)->where('id','!=',Auth::id())->get();
//        return $user->doesntHave('followByYou')->where('id','!=',Auth::id())->get();
    }
}
