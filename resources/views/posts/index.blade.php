@extends('components.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Recent Posts</h2>
    <div class="row">
        <div class="col-md-8">
    @foreach ($posts as $post )
    <div class="card mb-4">
        <img src="{{asset('/storage' . '/' . $post->image)}}" style="width:720px" class="card-img-top" alt="Image for Example Post Title 1">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read More</a>
            @if(auth()->user()->id == $post->user_id)
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary ms-2">Edit</a>
               <form action="{{route('posts.destroy',$post->id)}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
               </form>
            </div>
            @endif
        <div class="card-footer text-muted">
            {{$post->user->name}}
        </div>
    </div>
    @endforeach
        </div>
    </div>
</div>
@endsection