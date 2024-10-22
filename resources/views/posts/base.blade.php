@extends('components.layouts.app')

@section('content')
<div class="container">
    <a class="navbar-brand" href="index.html">Simple Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('posts.index')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('loginForm')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('registerForm')}}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
            </li>
        </ul>
    </div>
</div>
@endsection