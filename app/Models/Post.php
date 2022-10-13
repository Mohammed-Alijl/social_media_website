<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\True_;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','post_content','created_at','updated_at'];


    ################# START RELATION #################
    public function user(){
        return $this->belongsTo(User::class,'user_id','id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'post_id');
    }
    public function likes(){
        return $this->hasMany(Like::class,'post_id');
    }
    ################# END RELATION #################

    public static function isSetLike($user_id,$post_id){
        $like = Like::where(['user_id'=>$user_id,'post_id'=>$post_id])->first();
        if ($like)
            return true;
        else
            return false;
    }
    public static function getUsername($user_id){
        $user = User::find($user_id);
        if($user)
            return $user->name;
    }
}
