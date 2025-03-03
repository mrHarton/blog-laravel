@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">Author: {{ $post->user->name }}</small></p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>
@endsection
