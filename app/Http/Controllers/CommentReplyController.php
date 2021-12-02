<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentReply;

class CommentReplyController extends Controller
{
    //
    public function store(Request $request, $comment){
        
        $comment = new CommentReply();
        $comment->comment_id = $comment;
        $comment->user_id = Auth::id();
        $comment->reply = $request->reply; 
        $comment->save();
        return redirect()->back();
    }
}
