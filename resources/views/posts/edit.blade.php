@extends('components.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Post</h2>
    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('title')
            {{$message}}
            @enderror
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="Example Post Title">
        </div>
        <div class="mb-3">
            @error('content')
            {{$message}}
            @enderror
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" rows="6"
                >This is an example post content. You can edit it here.</textarea>
        </div>
        <div class="mb-3">
            @error('image')
            {{$message}}
            @enderror
            <label for="current-image" class="form-label">Current Image</label>
            <img src="{{asset('/storage'.'/'. $post->image)}}" width="100" alt="Current post image" class="img-fluid mb-2"
                id="current-image">
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection