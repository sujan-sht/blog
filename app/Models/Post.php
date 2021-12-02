<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;


class Post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $fillable =['title','user_id','description','slug','image','status'];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    

}
