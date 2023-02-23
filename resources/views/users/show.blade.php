@extends('layout')
@section('titulo','Miembro')

@section('contenido')
<main>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="miembro">
        @if (file_exists(public_path('/src/imgs/perfiles/'.$user->id.'.png')))
            <div style="background-image: url('/src/imgs/perfiles/{{$user->id}}.png');" class="miembro__imagen"></div>
        @else
            <div class="miembro__imagen"></div>
        @endif
        <div class="miembro__atr">
        @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="miembro__atr--admin">
                <a href="{{route('users.edit', $user)}}">
                    <div class="evento__atr--editarBoton">Editar</div>
                </a>

                    <form action="{{route('user.destroy', $user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="evento__atr--eliminarBoton" type="submit" value="ELIMINAR USUARIO">
                    </form>

            </div>
        @endif
        <div class="miembro__atr--nombre">{{ $user->nickname }}</div>
        <div class="miembro__atr--nombreReal"><b>Nombre real: </b>{{ $user->name }}</div>
        <div class="miembro__atr--fechaNacimiento"><b>Nacimiento: </b>{{ $user->birthday }}</div>
        <div class="miembro__atr--rol"><b>Rol: </b>{{ $user->rol }}</div>
        <div class="miembro__atr--twitter"><b>Twitter: </b>{{ $user->twitter }} </div>
        <div class="miembro__atr--instagram"><b>Instagram: </b>{{ $user->instagram }}</div>
        <div class="miembro__atr--twitch"><b>Twitch: </b>{{ $user->twitch }}</div>
        <br>
        </div>

    </div>
</main>
@endsection
