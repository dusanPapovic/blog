<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::unpublished()->get();
        //dd($posts);
        info($posts);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        //$post=Post::findOrFail($id);
        if ($post->is_published) {
            throw new ModelNotFoundException;
        }

        $post->load(['comments']); //with se koristi u queryu, a load kada je vec izvrsen

        // $post = Post::with('comments')->findOrFail($post); //post je id
        // info($post);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // $post->is_published = $request->get('is_published', false); // ako nemamo vrednost stavljamo false
        // $post->save();

        $data = $request->validated();

        $newPost = Post::create($data);

        return redirect('/posts');
    }
}
