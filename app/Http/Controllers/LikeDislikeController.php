<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikesDislike;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($postId)
    {
        $isExist = LikesDislike::where('post_id','=',$postId)->where('user_id', '=', Auth::user()->id)->first();
        // return $isExist;
        if($isExist){
            if($isExist->type == 'like'){
                return back();
            }else{
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
            return back();
        }
    }

    public function dislike($postId)
    {
        $isExist = LikesDislike::where('post_id','=',$postId)->where('user_id', '=', Auth::user()->id)->first();
        // return $isExist;
        if($isExist){
            if($isExist->type == 'dislike'){
                return back();
            }else{
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);
            return back();
        }
    }
}
