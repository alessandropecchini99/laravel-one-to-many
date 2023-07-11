@extends('admin.layouts.base')

@section('title', 'Show')

@section('main') 

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h3>Type: {{ $post->type->name }}</h3>
        <img src="{{ $post->url_image }}" alt="{{ $post->title }}">
        <p>{{ $post->content }}</p>


        <a class="btn btn-secondary" href="/admin/posts">Post Index</a>
        <a class="btn btn-secondary" href="/admin/types">Type Index</a>
    </div>

@endsection