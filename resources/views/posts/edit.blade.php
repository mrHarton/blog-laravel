@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $post->title) }}" 
                class="form-control" 
                required>
        </div>

        <div class="form-group mt-3">
            <label for="content">Content</label>
            <textarea 
                name="content" 
                id="content" 
                rows="5" 
                class="form-control" 
                required>{{ old('content', $post->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
</div>
@endsection