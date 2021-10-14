<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Post;

class CommentController extends Controller
{
    public function store(Post $post, CommentRequest $request)
    {
        $data = $request->validated();
        $post->comments()->create($data);
        return back();
    }
}
