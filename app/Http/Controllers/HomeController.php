<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function __invoke()
    {
        // pluck('id') trae solo el ID // Obtener a quienes seguimos
        $ids   = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(10);


        //principal es el home en el curso
        return view('principal', [
            'posts' => $posts
        ]);
    }
}
