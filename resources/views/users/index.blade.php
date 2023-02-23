@extends('layout')
@section('titulo','Miembros')

@section('contenido')
<main>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="miembros__hero">
            <span class="miembros__titulo">Miembros</span>
        </div>
        <div class="eventos__lista">
            <div class="eventos__titulo"><span class="eventos__titulo--texto">Lista de miembros</span></div>
            <div class="miembros__lista">

                @foreach ($usuarios as $usuario)
                    @if(Auth::check())
                        <a href="{{route('users.show', $usuario)}}">
                            <div class="usuario">
                                @if (file_exists(public_path('/src/imgs/perfiles/'.$usuario->id.'.png')))
                                    <div class="usuario__foto" style="background-image: url('/src/imgs/perfiles/{{$usuario->id}}.png');"></div>
                                @else
                                    <div class="usuario__foto"></div>
                                @endif
                                <span class="usuario__nombre">{{$usuario->nickname}}</span>
                            </div>
                        </a>
                    @else
                        <div class="usuario">
                            @if (file_exists(public_path('/src/imgs/perfiles/'.$usuario->id.'.png')))
                                <div class="usuario__foto" style="background-image: url('/src/imgs/perfiles/{{$usuario->id}}.png');"></div>
                            @else
                                <div class="usuario__foto"></div>
                            @endif
                            <span class="usuario__nombre">{{$usuario->nickname}}</span>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </main>
@endsection
