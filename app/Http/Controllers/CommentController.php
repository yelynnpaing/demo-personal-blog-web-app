<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function comment(Request $request, $postId)
    {
        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
        ]);
        return back();
    }
}
