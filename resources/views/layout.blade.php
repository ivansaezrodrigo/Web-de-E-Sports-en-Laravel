<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Jumanch - @yield('titulo')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/src/imgs/jumanch.png">
</head>
<body>
    @include('partials.nav')

    @yield('contenido')

    @include('partials.footer')
</body>
</html>
