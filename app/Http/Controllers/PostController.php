<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->latest()->paginate(10);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(User $user)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'

        ]);

        // Post::create([
        //     'titulo' =>$request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen'=> $request->imagen,
        //     'user_id'=>auth()->user()->id
        // ]);

        //otra forma de guardar registro

        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();


        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return to_route('posts.index', auth()->user()->username);
    }


    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        //Eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->imagen);

        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        return to_route('posts.index', auth()->user()->username);
    }
}
