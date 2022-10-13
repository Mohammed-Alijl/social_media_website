<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','comment_id'];
    public $timestamps=false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }

}
