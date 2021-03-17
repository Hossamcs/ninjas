<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','likes'])->orderBy('created_at', 'desc')->paginate(8);
        return view('posts.index',['posts'=> $posts]);
    }
 
    public function show(Post $post)
    {
      return view('posts.show', ['post'=>$post]);
    }
    public function store(Request $request)
    {
      $this->validate($request,[
          'body' => 'required',
      ]);
      $request->user()->posts()->create([
          'body' => $request->body
      ]);
      return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
