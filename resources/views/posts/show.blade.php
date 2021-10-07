<!-- <html>

<head>
    {{$post->title}}
</head>
<body>
    <a href="/posts"> Posts page</a>
    <h2>
        {{$post->title}}
</h2>
<p>
{{$post->body}}
</p>
</body>
    </html>
-->

@extends('layouts.app')

@section('title',$post->title)

@section('content')
<h2>
    {{$post->title}}
</h2>
<p>
    {{$post->body}}
</p>
@endsection