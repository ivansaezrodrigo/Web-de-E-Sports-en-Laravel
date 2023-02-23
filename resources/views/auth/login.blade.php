@extends('layout')
@section('titulo','Login')

@section('contenido')
<main>
    <div class="nuevoEvento">
        <div class="miembro__atr">
            <div class="nuevoEvento__titulo">Login</div>
            <form action="{{route('loginPost')}}" method="post">
               @csrf
                <div class="nuevoEvento__formulario">

                    <label for="nickname">Usuario:</label>
                    <input type="text" name="nickname" id="nickname" placeholder="Usuario">

                    <label for="password">Contraseña:</label>
                    <input type="text" name="password" id="password" placeholder="Contraseña">

                    <input id="nuevoEvento__formulario--enviar" type="submit" value="Enviar">
                </div>
            </form>

        </div>

    </div>
</main>
@endsection
