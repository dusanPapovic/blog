<!-- <html>
    <head>
        <title>Blog</title>
    </head>
    <body>
        <h1>Posts</h1>
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="/posts/{{$post->id}}">
                        {{$post->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </body>
</html>
-->

@extends('layouts.app')

@section('title','Blog')
@section('content')
<h1>Posts</h1>
<ul>
    @foreach($posts as $post)
    <li>
        <a href="{{route('post',['post'=> $post->id])}}">
            {{$post->title}} {{$post->comments->count()}}
        </a>
    </li>
    @endforeach
</ul>
@endsection