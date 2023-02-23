@extends('layout')
@section('titulo','Miembros')

@section('contenido')
<main>
    <div class="nuevoEvento">
        <div class="miembro__atr">
        <a href="{{route('users.show', Auth::user()->id )}}"><b><< Atrás</b></a>
            <div class="nuevoEvento__titulo">Editar mi perfil</div>
            <form action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data" >
                @method('PUT')
                @csrf

                <div class="nuevoEvento__formulario">
                
                    <br>
                    <p><b>Nickname: </b><i>{{$user->nickname}}</i></p>
                    <p><b>Email: </b><i>{{$user->email}}</i></p>

                    <br>
                    <hr>
                    <br>

                    <label for="name">Nombre completo:</label>
                    <input value="{{$user->name}}" type="text" name="name" id="name" placeholder="Introduce tu nombre">
                    @error('name') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    <label for="password">Contraseña:</label>
                    <input type="text" name="password" id="password" placeholder="Introduce tu nueva contraseña">
                    @error('password') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="password_confirmation">Repite tu contraseña:</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" placeholder="Repite tu nueva contraseña">
                    @error('password_confirmation') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <div class="nuevoEvento__fechaYHora">
                        <label for="birthday">Año de nacimiento:</label>
                        <input  value="{{$user->birthday}}" type="date" name="birthday" id="fecha">
                        @error('birthday') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    </div>


                    <label for="twitter">Twitter:</label>
                    <input  value="{{$user->twitter}}" type="text" name="twitter" id="twitter" placeholder="Introduce tu twitter">
                    @error('twitter') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="instagram">Instagram:</label>
                    <input  value="{{$user->instagram}}" type="text" name="instagram" id="instagram" placeholder="Introduce tu instagram">
                    @error('instagram') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                
                    <label for="twitch">Twitch:</label>
                    <input  value="{{$user->twitch}}" type="text" name="twitch" id="twitch" placeholder="Introduce tu twitch">
                    @error('twitch') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    <label for="image">Imagen:</label>
                    <input type="file" name="image" id="image" placeholder="Introduce tu imagen">
                    @error('image') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror
                    <br>

                    <input id="nuevoEvento__formulario--enviar" type="submit" value="Editar">
                </div>

            </form>

        </div>

    </div>
</main>
@endsection
