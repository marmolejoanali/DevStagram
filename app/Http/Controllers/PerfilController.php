<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }



    public function index()
    {

        return view('perfil.index');
    }


    public function store(Request $request)
    {


        $request->validate([
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil']
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');


            //generar un id unico
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        //Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = Str::slug($request->input('username'),'');
        $usuario->imagen  = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();


        //redireccionar

        return to_route('posts.index',$usuario->username);


    }
}
