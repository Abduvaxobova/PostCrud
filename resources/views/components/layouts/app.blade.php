<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html" style="font-size: 25px;"> <strong style="color:#f35a7b;">S</strong>imple Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(!auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('registerForm')}}">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('loginForm')}}">Login</a>
                        </li>
                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
                    </li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <li class="nav-item">
                            <button  style="padding: 1px 6px; margin-top:7px; background-color: #f35a7b; border: none; margin-left:6px; border-radius:5%;">Logout</button>
                        </li>
                    </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>