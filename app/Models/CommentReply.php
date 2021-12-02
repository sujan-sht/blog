<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;


class CommentReply extends Model
{
    use HasFactory;

    protected $fillable =['comment_id','user_id','reply'];

    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
