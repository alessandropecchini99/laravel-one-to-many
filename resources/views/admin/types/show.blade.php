@extends('admin.layouts.base')

@section('title', 'Show')

@section('main') 

    <div class="container">

        <h2>Type: {{ $type->name }}</h2>
        <h3>Description: {{ $type->description }}</h3>

        <hr>

        <h1>Post whit this Type</h1>

        <ul>
            @foreach ($type->posts as $post)
                <li><a href="{{ route('admin.posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        <a class="btn btn-secondary" href="/admin/types">Back</a>
    </div>

@endsection