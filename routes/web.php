<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');

Route::resource('posts', PostController::class)->middleware('checkAuth');

Route::get('/posts/edit',[PostController::class,'edit'])->name('edit')->middleware('checkAuth');

Route::get('/posts/create', [PostController::class,'create'])->name('posts.create')->middleware('checkAuth');