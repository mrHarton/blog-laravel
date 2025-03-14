@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <p class="text-muted">By <strong>{{ optional($post->author)->name ?? 'Unknown Author' }}</strong> | Published
                    on {{ $post->created_at->format('M d, Y') }}</p>

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

                <style>
                    .star {
                        font-size: 30px;
                        cursor: pointer;
                        color: #ddd;
                    }
                    .star:hover, .star.selected {
                        color: gold;
                    }
                </style>
                
                <h3>Average Rating: <span id="avg-rating">{{ round($post->averageRating(), 1) }}</span> ⭐</h3>
                
                <form action="{{ route('posts.rate', $post) }}" method="POST" id="rating-form">
                    @csrf
                    <input type="hidden" name="rating" id="rating-value">
                    <div id="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="star" data-value="{{ $i }}">★</span>
                        @endfor
                    </div>
                    <button type="submit">Submit</button>
                </form>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const stars = document.querySelectorAll('.star');
                        let selectedRating = 0;
                
                        stars.forEach(star => {
                            star.addEventListener('click', function() {
                                selectedRating = this.getAttribute('data-value');
                                document.getElementById('rating-value').value = selectedRating;
                
                                stars.forEach(s => s.classList.remove('selected'));
                                for (let i = 0; i < selectedRating; i++) {
                                    stars[i].classList.add('selected');
                                }
                            });
                        });
                
                        document.getElementById('rating-form').addEventListener('submit', function(e) {
                            if (selectedRating === 0) {
                                e.preventDefault();
                                alert('Please select a rating before submitting.');
                            }
                        });
                    });
                </script>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>

                    @auth
                        @if (auth()->user()->can('update', $post))
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        @endif

                        @if (auth()->user()->can('delete', $post))
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
