@extends('layout')
@section('titulo','Crear evento')

@section('contenido')
<main>
        <div class="nuevoEvento">
            <div style="background-image: url('/src/imgs/eventonuevo.png');" class="nuevoEvento__imagen"></div>
            <div class="miembro__atr">
                <div class="nuevoEvento__titulo">Nuevo evento</div>
                <form action="{{route('events.store')}}" method="post">
                    @csrf
                    <div class="nuevoEvento__formulario">
                        <label for="name">Nombre:</label>
                        <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="Nombre del evento">
                        @error('nombre')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <div class="nuevoEvento__fechaYHora">
                            <label for="fecha">Fecha:</label>
                            <input value="{{old('fecha')}}" type="date" name="fecha" id="fecha">
                            @error('fecha')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                            <label for="hour">Hora:</label>
                            <input value="{{old('hour')}}" type="time" name="hour" id="hour">
                            @error('hour')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        </div>
                        <label for="location">Lugar:</label>
                        <input value="{{old('location')}}" type="text" name="location" id="location" placeholder="Lugar del evento">
                        @error('location')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <label for="description">Descripción:</label>
                        <textarea value="{{old('description')}}" name="description" id="description" cols="30" rows="20" placeholder="Descripción del evento"></textarea>
                        @error('description')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror

                        <label for="tags">Tags:</label>
                        <input value="{{old('tags')}}" type="text" name="tags" id="tags" placeholder="Lugar de los tags">
                        @error('tags')<span class="error"><b>Error:</b> {{$message}}</span> <br> @enderror
                        <div>
                            <label for="visible">Visible: </label> <input type="checkbox" name="visible" id="visible">
                        </div>
                        <br>
                        <input id="nuevoEvento__formulario--enviar" type="submit" value="Enviar">
                    </div>
                </form>

            </div>

        </div>
    </main>
@endsection
