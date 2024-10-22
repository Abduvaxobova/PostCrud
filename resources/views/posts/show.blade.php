@extends('components.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-4">{{$post->title}}</h1>
                <img src="{{asset('/storage'.'/'. $post->image)}}" class="img-fluid rounded mb-4"
                    alt="Image for Example Blog Post Title">
                <div class="mb-4">
                    <span class="text-muted">{{$post->user->name}}</span>
                </div>
                <div class="content">
                    <p>{{$post->content}}</p>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection