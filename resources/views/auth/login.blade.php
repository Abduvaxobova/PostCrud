@extends('components.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Login</h2>
    <form ection="{{route('login')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            @error('email')
            {{$message}}
            @enderror
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            @error('password')
            {{$message}}
            @enderror
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection