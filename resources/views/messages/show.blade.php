@extends('layout')
@section('titulo','Eventos')

@section('contenido')
    <main>  
        <div class="evento">
            <div class="evento__atr">
                    <a href="{{route('messages.index')}}"><b><< Atrás</b></a>
                    <form action="{{route('messages.destroy', $message)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="evento__atr--eliminarBoton" type="submit" value="ELIMINAR MENSAJE">
                    </form>
                    @if($message->readed == 0)
                    <div class="message--Unread">
                    @else
                    <div class="message">
                    @endif
                        <div class="lista__evento--texto">
                            <span class="lista__evento--titulo">{{$message->subject}}</span>
                            <hr>
                            <br>
                            <span class="lista__evento--texto">{{$message->text}}</span>
                            <br>
                            <span class="lista__evento--autor">{{$message->created_at}} <b>Autor: </b>{{$message->name}}</span>
                            <form action="{{route('message.toggle',$message)}}" method="post">
                                @csrf
                                @if (Auth::check() && Auth::user()->rol == 'admin' && $message->readed == 0)
                                    <input class="evento__atr--boton" type="submit" value="Marcar como leído">
                                @else
                                    <input class="evento__atr--boton" type="submit" value="Marcar como no leído">
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>
@endsection
