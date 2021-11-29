<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post){
        
        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment; 
        $comment->save();

        return redirect()->back();
    }

    public function edit($id){
        $comment=Comment::findOrFail($id);
        return back()->with('comment');
    }

    public function update(Request $request, $comment){
        
    }

    public function delete($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
