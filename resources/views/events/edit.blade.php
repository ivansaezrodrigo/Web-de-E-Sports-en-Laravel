@extends('layout')
@section('titulo','Crear evento')

@section('contenido')
<main>
        <div class="nuevoEvento">
            <div style="background-image: url('/src/imgs/eventonuevo.png');" class="nuevoEvento__imagen"></div>
            <div class="miembro__atr">
                <div class="nuevoEvento__titulo">Editar evento</div>
                <form action="{{route('events.update', $event)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="nuevoEvento__formulario">
                        <label for="name">Nombre:</label>
                        <input value="{{$event->name}}" type="text" name="name" id="name" placeholder="Nombre del evento">
                        @error('nombre') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                        <div class="nuevoEvento__fechaYHora">
                            <label for="fecha">Fecha:</label>
                            <input value="{{$event->fecha}}" type="date" name="fecha" id="fecha">
                            @error('fecha') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                            <label for="hour">Hora:</label>
                            <input value="{{$event->hour}}" type="time" name="hour" id="hour">
                            @error('hour') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                        </div>
                        <label for="location">Lugar:</label>
                        <input value="{{$event->location}}" type="text" name="location" id="location" placeholder="Lugar del evento">
                        @error('location') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="20" placeholder="Descripción del evento">{{$event->description}}</textarea>
                        @error('description') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror

                        <label for="tags">Tags:</label>
                        <input value="{{$event->tags}}" type="text" name="tags" id="tags" placeholder="Lugar de los tags">
                        @error('tags') <br><span class="error"><b>Error:</b> {{$message}}</span> @enderror
                        <div>
                            <label for="visible">Visible: </label> <input @checked($event->visible == 1) type="checkbox" name="visible" id="visible">
                        </div>
                        <br>
                        <input id="nuevoEvento__formulario--enviar" type="submit" value="Guardar">
                    </div>
                </form>

            </div>

        </div>
    </main>
@endsection
