<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('pages.Blog.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.Blog.create', [
            'user' => User::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
            'description' => $request->description
        ]);

        return to_route('create');
    }
}
