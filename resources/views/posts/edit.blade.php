@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
    <h1>Edit Post</h1>
    </div>
    <div class="card-body">
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
      <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control"
        required>
      </div>
      <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea id="post-content" name="content"
        class="form-control">{{ old('content', $post->content ?? '') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>

    <!-- Include TinyMCE -->
    <!-- Include CKEditor -->
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('post-content', {
      toolbar: [
      { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', 'Print'] },
      { name: 'clipboard', items: ['Undo', 'Redo'] },
      { name: 'editing', items: ['Find', 'Replace'] },
      { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
      { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
      { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
      { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
      { name: 'colors', items: ['TextColor', 'BGColor'] },
      ]
    });
    </script>
  </div>
@endsection