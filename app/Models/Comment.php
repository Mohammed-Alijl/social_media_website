<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_content', 'post_id', 'user_id', 'created_at', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment_like()
    {
        return $this->hasOne(Comment_like::class, 'comment_id');
    }

    public static function getUsername($user_id)
    {
        $user = User::find($user_id);
        if ($user)
            return $user->name;
    }

    public static function isSetLike($user_id, $comment_id)
    {
        if($user_id && $comment_id) {
            if (Comment_like::where(['user_id' => $user_id, 'comment_id' => $comment_id])->first())
                return true;
            else
                return
                    false;
        }
    }
}
