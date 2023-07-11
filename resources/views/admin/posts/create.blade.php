@extends('admin.layouts.base')

@section('title', 'Create')

@section('main') 
    
    <div class="create container">

        <h1>Add a Post!</h1>
    
        <form 
            class="create-form"
            method="POST"
            action="{{ route('admin.posts.store') }}"
        >
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                    type="text" 
                    class="form-control 
                    @error('title') is-invalid @enderror" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}"
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
                    value="{{ old('type_id') }}">
                    <option selected>Select the Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                >{{ old('content') }}</textarea>
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
                    value="{{ old('url_image') }}"
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