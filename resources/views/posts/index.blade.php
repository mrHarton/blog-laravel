@extends('layouts.app')

@section('content')
    @auth
        <div class="mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        </div>
    @endauth

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 100) !!}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">View</a>
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
