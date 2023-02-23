@extends('layout')
@section('titulo','Ubicación')

@section('contenido')
<main>
    <div class="ubi">
        <div class="miembro__atr--nombre">Donde estamos</div>
        <iframe width="1080" height="580" id="gmap_canvas" src="https://maps.google.com/maps?q=Carrer%20d'Alacant,%2025,%2046004%20Val%C3%A8ncia,%20Valencia&t=k&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</main>
@endsection
