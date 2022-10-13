<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
const PAGINATION_COUNT = 3;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get("/", [\App\Http\Controllers\Front\HomeController::class, 'goHome'])->name('home');
    Route::get("/home", [\App\Http\Controllers\Front\HomeController::class, 'goHome'])->name('home');
    Route::get('/following/{followedUser_id}', [\App\Http\Controllers\Front\FollowingController::class, 'goFollowing'])->name('following');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Front\ProfileController::class, 'goProfile'])->name('profile');
        Route::get('/edit/',[\App\Http\Controllers\Front\EditController::class,'goEdit'])->name('profile.edit');
        Route::post('/edit/apply',[\App\Http\Controllers\Profile\EditController::class,'edit'])->name('profile.edit.apply');
    });

    Route::group(['prefix' => 'post/'], function () {
        Route::post('add/{user_id}', [\App\Http\Controllers\Post\CreateController::class, 'addPost'])->name('post.add');
        Route::get('like/add/{user_id}/{post_id}', [\App\Http\Controllers\Post\Like\CreateController::class, 'addLike'])->name('post.like.add');
        Route::post('like/add/ajax', [\App\Http\Controllers\Post\Like\CreateAjaxController::class, 'addLike'])->name('ajax.add like');
        Route::get('like/delete/{user_id}/{post_id}', [\App\Http\Controllers\Post\Like\DeleteController::class, 'deleteLike'])->name('post.like.delete');
        Route::get('share/add/{post_id}', [\App\Http\Controllers\Post\Share\CreateController::class, 'addShare'])->name('post.share.add');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::post('add/{post_id}/{user_id}', [\App\Http\Controllers\Post\Comment\CreateController::class, 'createComment'])->name('comment.add');
        Route::get('like/add/{user_id}/{comment_id}', [\App\Http\Controllers\Post\Comment\LikeController::class, 'add'])->name('comment.like.add');
        Route::get('like/delete/{user_id}/{comment_id}', [\App\Http\Controllers\Post\Comment\LikeController::class, 'delete'])->name('comment.like.delete');
    });

    Route::group(['prefix' => 'follow'], function () {
        Route::get('add/{followedUser_id}', [\App\Http\Controllers\Follow\CreateController::class, 'addFollow'])->name('profile.follow');
        Route::get('delete/{followedUser_id}', [\App\Http\Controllers\Follow\DeleteController::class, 'deleteFollow'])->name('profile.unfollow');
        Route::get('chat/{followedUser_id}', [\App\Http\Controllers\Follow\ChatController::class, 'chat'])->name('profile.chat');
        Route::post('chat/sendMessage/{user_id}/{room_id}', [\App\Http\Controllers\Follow\ChatController::class, 'sendMessage'])->name('profile.chat.message.send');
    });


});
