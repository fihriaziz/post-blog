<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['comments','comments.child'])->where('slug',$slug)->first();
        $comments = Comment::all();
        return view('show', compact('post','comments'));
    }
}
