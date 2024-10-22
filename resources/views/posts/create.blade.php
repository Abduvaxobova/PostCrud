@extends('components.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create New Post</h2>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            @error('title')
                {{$message}}
            @enderror
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            @error('content')
            {{$message}}
            @enderror
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" rows="6"></textarea>
        </div>
        <div class="mb-3">
            @error('image')
            {{$message}}
            @enderror
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection