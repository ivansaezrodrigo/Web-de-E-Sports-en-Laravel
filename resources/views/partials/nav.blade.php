<nav>
    <a href="{{ route('inicio') }}"><span class="logo">TEAM JUMANCH</span></a>
    @if (auth()->check())
        <a href="{{ route('inicio') }}"><span>Inicio</span></a>
    @else
        <a href="{{ route('inicio') }}"><span>Inicio</span></a>
    @endif

    <a href="{{ route('ubicacion') }}"><span>Donde estamos</span></a>
    <a href="{{ route('users.index') }}"><span>Miembros</span></a>
    <a href="{{route('messages.create')}}"><span>Contacto</span></a>

    @if (auth()->check())
    @if (Auth::user()->rol == 'admin')
        <a href="{{ route('messages.index') }}"><span>Mensajes</span></a>
        <a href="{{ route('events.create') }}"><span>Nuevo evento</span></a>
    @endif
    <a href="{{ route('events.index') }}"><span>Eventos</span></a>
    <a href="{{route('users.show', Auth::user()->id )}}"><span>Cuenta</span></a>
    <a href="{{ route('logout') }}"><span><b>Cerrar sesión</b></span></a>
</nav>
    @else
        <a href="{{ route('events.index') }}"><span>Eventos</span></a>
        
        <a href="{{route('login')}}"><span><b>Iniciar sesión</b></span></a>
        <a href="{{ route('registro') }} "><span id="nav__registrarse">Registrarse</span></a>
</nav>
    @endif
