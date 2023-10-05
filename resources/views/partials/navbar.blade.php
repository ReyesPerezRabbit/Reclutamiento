<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="header">
        @auth
        <div class="navbar-container">
            <nav class="navbar">
                <div class="navbar-logo">
                    <img src="https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg" alt="Logo" width="100" height="24">
                </div>
                <div class="navbar-text">
                    Panel de Administrador
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-links collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Pagina principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('candidato.lista') }}">Lista de evaluación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('candidato.mostrar') }}">Añadir candidatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('candidato.entravista') }}">Agendar entrevista</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name ?? auth()->user()->username }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="/register">Añadir administradores</a></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        @endauth
    </div>

</body>

</html>
