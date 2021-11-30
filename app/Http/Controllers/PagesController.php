<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Navbar;
use DB;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::inRandomOrder()->paginate(5);
        $categories = Category::where('parent_id',0)->get();
        $popularPosts=Post::all()->sortByDesc('view_count')->take(5);
        $setting=Setting::first();
        $menus=Navbar::orderBy('order')->get();
        return view('frontend.index',compact('posts','categories','popularPosts','setting','menus'))->with('user');
    }

    public function single($slug){
        $trends=Post::latest()->take(5)->get();
        $post = Post::where('slug', $slug)->first();
        DB::table('posts')->where('id', $post->id)->increment('view_count', 1);
        $popularPosts=Post::all()->sortByDesc('view_count')->take(5);
        return view('frontend.single',compact('trends','post','popularPosts'))->with('no',1);
    }
    
    
}
