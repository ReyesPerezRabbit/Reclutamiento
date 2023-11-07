<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>
    <nav>
        <img src="https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg" alt="Logo" class="logo">
        <div class="menu">
            <a href="/">Pagina principal</a>
            <a href="{{ route('candidato.lista') }}">Lista de evaluación</a>
            <a href="{{ route('candidato.mostrar') }}">Añadir candidatos</a>
            <a href="{{ route('candidato.entrevista') }}">Agendar entrevista</a>
            <a href="/logout" class="logout-button">Cerrar sesión</a>
        </div>
    </nav>
</body>

</html>
