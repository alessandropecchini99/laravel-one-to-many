@extends('admin.layouts.base')

@section('title', 'Show')

@section('main') 

    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->url_image }}" alt="{{ $post->title }}">
    <p>{{ $post->content }}</p>


    <a class="btn btn-secondary" href="/admin/posts">Back</a>

@endsection