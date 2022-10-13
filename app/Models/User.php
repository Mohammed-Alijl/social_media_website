<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasMany(Post::class,'user_id','id');
    }
    public function likes(){
        return $this->hasMany(Like::class,'user_id','id');
    }
    public function followByYou(){
        return $this->belongsToMany(User::class,'user_user','follow_id','followed_id','id','id');
    }
    public function followYou(){
        return $this->belongsToMany(User::class,'user_user','followed_id','follow_id','id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id');
    }
    public function comment_like(){
        return $this->hasOne(Comment_like::class,'user_id');
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function participants(){
        return $this->hasMany(Participant::class);
    }
    public static function isFollowHim($user_id){
        $user = User::find(Auth::id());
        if ($user->followByYou->where('id',$user_id)->first())
            return true;
        else
            return false;
    }
}
