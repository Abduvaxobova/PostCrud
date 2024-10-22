@extends('components.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Register</h2>
    <form ection="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            @error('name')
            {{$message}}
            @enderror
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="name">
        </div>
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
        <div class="mb-3">
            @error('confirmPassword')
            {{$message}}
            @enderror
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection