@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
@endsection
