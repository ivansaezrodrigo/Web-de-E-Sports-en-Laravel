@extends('layout')
@section('titulo','Eventos')

@section('contenido')
<main>
        <div class="eventos__hero">
            <span class="titulo">Eventos</span>
        </div>
        <div class="eventos__lista">
            <div class="eventos__titulo">
                <span class="eventos__titulo--texto">Lista de eventos</span>
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>

            <div class="lista">
                <!-- Evento -->
                @foreach ($events as $event)
                <a href="{{route('events.show', $event)}}">
                    <div class="lista__evento">
                        <div class="lista__evento--fecha">Ver evento</div>
                        <div class="lista__evento--texto">
                            @if (Auth::check() && Auth::user()->rol == 'admin')
                            <span class="lista__evento--autor">
                                <a class="lista__evento--editar" href="{{route('events.edit', $event)}}"><b>EDITAR EVENTO</b></a>
                                <form action="{{route('events.destroy', $event)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="evento__atr--eliminarBoton" type="submit" value="ELIMINAR EVENTO">
                                </form>
                            </span>
                            @endif
                            <span class="lista__evento--titulo">{{$event->name}} - {{$event->fecha}}</span>
                            <span class="lista__evento--texto"></span>
                            <span class="lista__evento--texto">{{$event->description}}</span>
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
                </a>
                @endforeach
                <!-- ##### -->

            </div>
        </div>
    </main>
@endsection
