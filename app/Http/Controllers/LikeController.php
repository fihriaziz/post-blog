<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($type, $model_id) {

        if($type == 1)
            $model = Post::class;


        Like::create([
            'user_id' => Auth::id(),
            'likeable_id' => $model_id,
            'likeable_type' => $model
        ]);
    }
}
