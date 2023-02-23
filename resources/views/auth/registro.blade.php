@extends('layout')
@section('titulo','Registro')

@section('contenido')
<main>
    <div class="nuevoEvento">
        <div class="miembro__atr">
            <div class="nuevoEvento__titulo">Registro</div>
            <form action="{{route('registroPost')}}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="nuevoEvento__formulario">

                    <label for="nickname">Nickname:</label>
                    <input value="{{old('nickname')}}" type="text" name="nickname" id="nickname" placeholder="Introduce tu nickname">
                    @error('nickname') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    <label for="name">Nombre completo:</label>
                    <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="Introduce tu nombre">
                    @error('name') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="email">Email:</label>
                    <input value="{{old('email')}}" type="text" name="email" id="email" placeholder="Introduce tu email">
                    @error('email') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="password">Contraseña:</label>
                    <input type="text" name="password" id="password" placeholder="Introduce tu contraseña">
                    @error('password') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="password_confirmation">Repite tu contraseña:</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" placeholder="Introduce tu contraseña">
                    @error('password_confirmation') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <div class="nuevoEvento__fechaYHora">
                        <label for="birthday">Año de nacimiento:</label>
                        <input  value="{{old('birthday')}}" type="date" name="birthday" id="fecha">
                        @error('birthday') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    </div>


                    <label for="twitter">Twitter:</label>
                    <input  value="{{old('twitter')}}" type="text" name="twitter" id="twitter" placeholder="Introduce tu twitter">
                    @error('twitter') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror


                    <label for="instagram">Instagram:</label>
                    <input  value="{{old('instagram')}}" type="text" name="instagram" id="instagram" placeholder="Introduce tu instagram">
                    @error('instagram') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                
                    <label for="twitch">Twitch:</label>
                    <input  value="{{old('twitch')}}" type="text" name="twitch" id="twitch" placeholder="Introduce tu twitch">
                    @error('twitch') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                    <label for="image">Imagen:</label>
                    <input type="file" name="image" id="image" placeholder="Introduce tu imagen">
                    @error('image') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror
                    <br>

                    <input id="nuevoEvento__formulario--enviar" type="submit" value="Registrarse">
                </div>
            </form>

        </div>

    </div>
</main>
@endsection
