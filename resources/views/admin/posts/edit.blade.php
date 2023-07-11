@extends('admin.layouts.base')

@section('title', 'Edit')

@section('main') 

        <div class="edit container">

        <h1>Edit the Post!</h1>
    
        <form 
            class="create-form"
            method="POST"
            action="{{ route('admin.posts.update', ['post' => $post]) }}"
        >
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                    type="text" 
                    class="form-control 
                    @error('title') is-invalid @enderror" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $post->title) }}"
                >
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            <div class="mb-3">
                <label
                for="type_id"
                class="form-label
                @error('type_id') is-invalid @enderror">Type</label>
                <select
                    class="form-select" 
                    aria-label="Default select" 
                    id="type_id" name="type_id"
                    value="{{ old('type_id') }}"
                >
                    @foreach($types as $type)
                        <option
                            value="{{ $type->id }}"
                            @if (old('type_id', $post->type->id) == $type->id) selected @endif
                        >
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea 
                    class="form-control 
                    @error('content') is-invalid @enderror" 
                    id="content" 
                    rows="3" 
                    name="content"
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            <div class="mb-3">
                <label for="url_image" class="form-label">Image</label>
                <input 
                    type="text" 
                    class="form-control 
                    @error('url_image') is-invalid @enderror" 
                    id="url_image" 
                    name="url_image" 
                    value="{{ old('url_image', $post->url_image) }}"
                >
                @error('url_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>

            

            <div class="create-button">
                <a class="btn btn-secondary" href="/admin/posts">Back</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

@endsection