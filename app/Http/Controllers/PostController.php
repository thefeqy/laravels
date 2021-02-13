<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function search(Request $request)
    {
        $results = Post::where('title', 'LIKE', "%{$request->search}%")->get();
        return view('posts.results', compact('results'))->with(
        ['search' => $request->search])->render();
    }

    public function show(Request $request)
    {
        $post = Post::findOrFail($request->id);
        return view('posts.post', compact('post'))->render();
    }
}
