<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Funcion que recibe los datos del formulario de registro por registerRequest y los guarda en la base de datos
    public function registerPost(RegisterRequest $request)
    {
        $user = new User();
        $user->nickname = $request->get('nickname');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        // Encripta la contraseña
        $user->password = Hash::make($request->get('password'));
        $user->birthday = $request->get('birthday');
        $user->twitter = $request->get('twitter');
        $user->instagram = $request->get('instagram');
        $user->twitch = $request->get('twitch');

        // Guarda el usuario en la base de datos
        $user->save();

        // Inicia sesion con el usuario que se ha registrado
        Auth::login($user);

        // Si el usuario ha subido una imagen, la guarda en la carpeta imgs/perfiles con el nombre del id del usuario
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move('src/imgs/perfiles/', $user->id . '.png');
        }

        // Redirige a la pagina de inicio
        return redirect()->route('inicio');
    }

    // Funcion que recibe los datos del formulario de login y los compara con los de la base de datos
    public function login(Request $request){
        // Recoge los datos del formulario
        $credenciales = $request->only('nickname', 'password');

        // Comprueba si los datos son correctos
        if (Auth::guard('web')->attempt($credenciales)) {
            $request->session()->regenerateToken();
            return redirect()->route('inicio');
        }else{
            // Si los datos son incorrectos, redirige a la pagina de login
            return view('auth.login');
        }
    }

    // Funcion que cierra la sesion del usuario
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
