<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        Comment::create([
            'post_id' => $request->id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id != '' ? $request->parent_id : null,
            'comment' => $request->comment
        ]);

        return back();
    }
}
