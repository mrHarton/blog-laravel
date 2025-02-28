@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    @foreach ($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post) }}">View</a>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach
</div>
@endsection