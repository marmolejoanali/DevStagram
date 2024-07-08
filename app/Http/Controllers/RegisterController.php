<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       // $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([

            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]

        ]);

        $user = User::create([
            'name'     => $request->input('name'),
            'username' => Str::slug($request->input('username'),''),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);


        // formas de autenticar usuario
        //   auth()->attempt([
        //         'email'=>$request->input('email'),
        //         'password'=>$request->input('password')
        //     ]);


        //  fin de formas de autenticar usuario
        //Auth::attempt(['email' =>$request->input('email'), 'password' => $request->input('password')]);
        // auth()->attempt($request->only('email', 'password'));
        Auth::attempt($request->only('email', 'password'));
        //auto login
        return redirect()->route('posts.index', auth()->user()->username);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');


        //return to_route('auth.register');

    }
}
