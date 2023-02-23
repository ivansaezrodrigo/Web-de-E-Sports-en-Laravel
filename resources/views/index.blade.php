@extends('layout')

@section('titulo', 'Inicio')

@section('contenido')

<main>
    <div class="principal">
        <video class="principal__video" autoplay loop muted controls>
            <source src="src/video/video.mp4" type="video/mp4">
        </video>
        @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="principal__juegos">
            <img src="src/imgs/streetfighter.png" alt="Streetfighter logo"><img src="src/imgs/csgo.png" alt="csgo logo"><img id="principal__jumanch" src="src/imgs/jumanch.png" alt="logo jumanch"><img src="src/imgs/lol.svg" alt="logo league of legeds"><img src="src/imgs/valorant.png" alt="logo valorant">
        </div>
        <p>Nuestro equipo de e-sports es otro lvl</p>
        <img src="src/imgs/parrilla.svg" alt="marcas socias">
    </div>
</main>

@endsection
