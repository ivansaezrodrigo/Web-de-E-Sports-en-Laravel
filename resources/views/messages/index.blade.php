@extends('layout')
@section('titulo','Eventos')

@section('contenido')
<main>
        <div class="mensajes__hero">
            <span class="hero__titulo">Mensajes</span>
        </div>
        <div class="eventos__lista">
            <div class="eventos__titulo"><span class="eventos__titulo--texto">Lista de mensajes</span></div>
            <div class="lista">
                <!-- Mensaje -->
                @foreach ($messages as $message)
                    @if($message->readed == 0)
                        <div class="lista__evento lista__evento--noLeido">
                        <a href="{{route('messages.show', $message)}}"><div class="lista__evento--fecha">Ver mensaje no leído</div></a>

                    @else
                        <div class="lista__evento">
                        <a href="{{route('messages.show', $message)}}"><div class="lista__evento--fecha">Ver mensaje leído</div></a>

                    @endif
                        <div class="lista__evento--texto">
                            <span class="lista__evento--titulo">{{$message->subject}} - {{$message->created_at}}</span>
                            <span class="lista__evento--texto">{{$message->text}}</span>
                            <span class="lista__evento--autor"><b>Autor: </b>{{$message->name}}</span>
                            
                        </div>
                    </div>
                @endforeach
                <!-- ##### -->
            </div>
        </div>
    </main>
@endsection
