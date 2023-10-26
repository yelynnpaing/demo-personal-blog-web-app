<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;

class UiController extends Controller
{
    public function about() {
        $skills = Skill::all();
        $projects = Project::all();
        $certificates = Certificate::all();
        $posts = Post::latest()->take(6)->get();
        return view('ui-panel.about', [
            'skills' => $skills,
            'projects' => $projects,
            'certificates' => $certificates,
            'posts' => $posts,
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(5);
        return view('ui-panel.index', compact('categories', 'posts'));
    }

    public function postDetail($id)
    {
        if(!Auth::check()){
            // return redirect()->route('login');
            $post = Post::find($id);
            $likes = LikesDislike::where('post_id', $post->id)->where('type', 'like')->get();
            $dislikes = LikesDislike::where('post_id', $post->id)->where('type', 'dislike')->get();
            $comments = Comment::where('post_id', $post->id)->where('status', 'show')->get();
            return view('ui-panel.post-detail', compact('post', 'likes', 'dislikes', 'comments'));
        }
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id', $post->id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $post->id)->where('type', 'dislike')->get();
        $likeStatus = LikesDislike::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        $dislikeStatus = LikesDislike::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        $comments = Comment::where('post_id', $post->id)->where('status', 'show')->get();
        return view('ui-panel.post-detail', compact('post', 'likes', 'dislikes', 'likeStatus', 'dislikeStatus', 'comments'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $searchData = '%'.$request->search_data.'%';
        $posts = Post::where('title', 'like' , $searchData)
        ->orWhere('content', 'like', $searchData)
        ->orWhereHas('category', function($category) use($searchData){
            $category->where('name', 'like', $searchData);
        })
        ->paginate(5);
        return view('ui-panel.index', compact('posts', 'categories'));
    }

    public function searchByCategory($catId)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $catId)->paginate(5);

        return view('ui-panel.index', compact('posts', 'categories'));
    }
}
