<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use APP\Http\Controllers\PostController;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
         $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->route('posts.index');
    }
    public function loginForm(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Email or password is incorrect.']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginForm');
    }
}