<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =['category_name','parent_id','status'];

    
    public function subCategory() {
       return $this->belongsTo(Category::class,'parent_id');
    }
    public function posts() {
        return $this->hasMany(Post::class,'category_id');
    }
}
