@extends('layout')
@section('titulo','Eventos')

@section('contenido')
    <main>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="evento">
                <div class="evento__imagen"></div>
                <div class="evento__atr">
                    @if (Auth::check() && Auth::user()->rol == 'admin')
                        <div class="evento__atr--admin">
                            <a href="{{route('events.edit', $event)}}">
                                <div class="evento__atr--editarBoton">Editar</div>
                            </a>
                            <form action="{{route('events.destroy', $event)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="evento__atr--eliminarBoton" type="submit" value="ELIMINAR EVENTO">
                            </form>
                        </div>
                    @endif
                    <div class="evento__atr--titulo">{{$event->name}}</div>
                    <div class="evento__atr--descripcion">{{$event->description}}</div>
                    <div class="evento__atr--fecha"><b>Fecha:</b> {{$event->fecha}}</div>
                    <div class="evento__atr--hora"><b>Hora:</b> {{$event->hour}}</div>
                    <div class="evento__atr--lugar"><b>Lugar:</b> {{$event->location}}</div>
                    <div class="evento__atr--lugar"><b>Cantidad de asistentes:</b> {{$event->users->count()}}</div>
                    <form action="{{route('asistencia.toggle',$event)}}" method="post">
                        @csrf
                        @if (Auth::check() && $event->users->contains(Auth::user()))
                        <input class="evento__atr--boton" type="submit" value="Abandonar evento">
                        @else
                        <input class="evento__atr--boton" type="submit" value="Apuntarse al evento">
                        @endif
                    </form>
                </div>

            </div>
        </main>
@endsection
