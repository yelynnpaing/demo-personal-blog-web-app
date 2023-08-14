<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate('4');
        return view('admin-panel.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg',
            'title' => 'required',
            'content' => 'required',
        ]);
        // dd($request->all());
        $image = $request->image;
        $imageName = uniqid().''.$image->getClientOriginalName();
        $image->storeAs('public/post-images', $imageName);

        Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('successMsg',
        'You have successfully created new post.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::where('post_id', $id)->get();
        return view('admin-panel.post.comment', compact('comments'));
    }

    // custom function
    public function showHideComment($id)
    {
        $comments = Comment::findOrFail($id);
        $status = $comments->status == 'show' ? 'hide' : 'show';
            $comments->update([
                'status' => $status,
            ]);
        return back()->with('successMsg', 'you have changed comment status');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin-panel.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::find($id);
        if($request->hasfile('image')){
            $postImage = $post->image;
            File::delete('storage/post-images/'.$postImage);

            $image = $request->image;
            $imageName = uniqid().''.$image->getClientOriginalName();
            $image->storeAs('public/post-images/'.$imageName);
            $data['image'] = $imageName;
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('successMsg', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $postImage = $post->image;
        File::delete('storage/post-images/'.$postImage);
        $post->delete();

        return redirect()->route('posts.index')->with('successMsg',
        'You have successfully deleted this post.');
    }
}
