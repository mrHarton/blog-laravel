@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="card-body">
            <p class="text-muted">By <strong>{{ optional($post->author)->name ?? 'Unknown Author' }}</strong> | Published on {{ $post->created_at->format('M d, Y') }}</p>
            
            @if ($post->categories->count())
                <p><strong>Categories:</strong>
                    @foreach ($post->categories as $category)
                        <span class="badge bg-primary">{{ $category->name }}</span>
                    @endforeach
                </p>
            @endif
            
            <hr>
            <p>{!! $post->content !!}</p>

            <hr>
            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>

                @auth
                    @if(auth()->user()->can('update', $post))
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    @endif

                    @if(auth()->user()->can('delete', $post))
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
