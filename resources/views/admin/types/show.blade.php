@extends('admin.layouts.base')

@section('title', 'Show')

@section('main') 

    <div class="container">

        <h1>Type: {{ $type->name }}</h1>
        <h2>Description: {{ $type->description }}</h2>

        <hr>

        <h2>Post whit this Type</h2>

        <ul>
            @foreach ($type->posts as $post)
                <li><a href="{{ route('admin.posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        <a class="btn btn-secondary" href="/admin/types">Type Index</a>
        <a class="btn btn-secondary" href="/admin/posts">Post Index</a>

    </div>

@endsection