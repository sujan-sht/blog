<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::inRandomOrder()->paginate(5);
        $categories = Category::where('parent_id',0)->get();
        return view('frontend.index',compact('posts','categories'))->with('user');
    }

    public function single($slug){
        $trends=Post::latest()->take(5)->get();
        $post = Post::where('slug', $slug)->first();
        return view('frontend.single',compact('trends','post'))->with('no',1);
    }
    
    
}
