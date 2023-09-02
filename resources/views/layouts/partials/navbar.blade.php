<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-10">
        @auth
        <div class="justify-center">
            <nav class="navbar navbar-expand-lg bg-info-subtle">
                <div class="container-fluid">

                    <a class="navbar-brand" >
                        <img src="https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg" width="100" height="24"
                            class="d-inline-block align-text-top">
                        Panel de Administrador
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Pagina principal</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Lista de evaluacion</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/agregar_cantidad">Añadir candidatos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Agendar entrevista</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ auth()->user()->name ?? auth()->user()->username }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li><a class="dropdown-item" href="/logout">Cerrar sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @endauth
    </div>

</body>

</html>
