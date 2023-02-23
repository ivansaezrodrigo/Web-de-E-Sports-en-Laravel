@extends('layout')
@section('titulo','Crear evento')

@section('contenido')
<main>
        <div class="nuevoEvento">
            <div style="background-image: url('/src/imgs/eventonuevo.png');" class="nuevoEvento__imagen"></div>
            <div class="miembro__atr">
                <div class="nuevoEvento__titulo">Contacto</div>
                <form action="{{route('messages.store')}}" method="post">
                    @csrf
                    <div class="nuevoEvento__formulario">
                        <label for="name">Nombre:</label>
                        <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="Tu nombre">
                        @error('name')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <label for="subject">Asunto:</label>
                        <input value="{{old('subject')}}" type="text" name="subject" id="subject" placeholder="El asunto">
                        @error('subject') <span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <label for="text">Mensaje:</label>
                        <textarea value="{{old('text')}}" name="text" id="text" cols="30" rows="20" placeholder="Cuentanos tus inquietudes :)"></textarea>
                        @error('text')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <br>
                        <input id="nuevoEvento__formulario--enviar" type="submit" value="Enviar">
                    </div>
                </form>

            </div>

        </div>
    </main>
@endsection
