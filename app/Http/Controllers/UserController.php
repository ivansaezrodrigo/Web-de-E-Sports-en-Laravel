<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * EDITAR Y VER USUARIOS
     *
     * @return \Illuminate\Http\Response
     */

    // Muestra todos los usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Muestra el perfil del usuario
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Si el usuario es el mismo que el que está logueado, se le permite editar su perfil, si no, se le redirige a la página de inicio
    public function edit(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('users.edit', compact('user'));
        } else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Se actualiza el perfil del usuario
    public function update(UserEditRequest $request, User $user)
    {
        // si se ha subido una imagen, se guarda en la carpeta imgs/perfiles con el nombre del id del usuario
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move('src/imgs/perfiles/', $user->id . '.png');
        }

        // si se ha cambiado la contraseña, se encripta y se guarda en la base de datos
        if ($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        // se guardan los datos del formulario en la base de datos
        $user->name = $request->get('name');
        $user->birthday = $request->get('birthday');
        $user->twitter = $request->get('twitter');
        $user->instagram = $request->get('instagram');
        $user->twitch = $request->get('twitch');

        $user->save();
        // se redirige a la página del perfil del usuario
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Se elimina el usuario
    public function destroy(User $user)
    {
        if (auth()->user()->id == $user->id) {
            $user->delete();
            return redirect()->route('inicio')->with('success', 'Usuario eliminado correctamente');
        } else {
            return redirect()->route('inicio');
        }
    }
}
