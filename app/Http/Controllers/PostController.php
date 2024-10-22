<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $image = $request->file('image');
        $imagePath = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs('uploads', $imagePath, 'public');
        $post->image = $uploadedImage;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function edit($id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        if ($user->id !== $post->user_id) {
            abort(403);
        }
        return view('posts.edit',compact('post'));
    }
    public function update(UpdatePostRequest $request, $id){
        $user = Auth::user();
        $post = Post::findOrFail($id);

        if($user->id == $post->user_id){
            
            $post->title = $request->title;
            $post->content = $request->content;
            if ($request->hasFile('image')) {
                if ($post->image) {
                    @unlink(storage_path('app/public/' . $post->image));
                }
                $image = $request->file('image');
                $imageFile = time() . '.' . $image->getClientOriginalExtension();
                $post->image = $image->storeAs('images', $imageFile, 'public');
            }
        }
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if ($user->id !== $post->user_id) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
