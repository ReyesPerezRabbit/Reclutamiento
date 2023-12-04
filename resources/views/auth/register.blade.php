<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear cuenta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body class="vh-100 gradient-custom">
    <div class="container">
        <div class="card">
            <form action="{{ route('register.register') }}" method="POST">
                @csrf
                @include('partials.menssage')
                <h2 class="text-uppercase text-center mb-5">Crear cuenta</h2>

                <br>

                <div class="form-group">
                    <label for="form3Example3cg">Nombre completo</label>
                    <input type="text" placeholder="Escriba su nombre" name="name" id="form3Example3cg"
                        class="form-control form-control-lg" />
                </div>

                <br>

                <div class="form-group">
                    <label for="form3Example1cg">Usuario</label>
                    <input type="text" name="username" id="form3Example1cg" placeholder="Ingrese su usuario"
                        class="form-control form-control-lg" />
                </div>

                <br>

                <div class="form-group">
                    <label for="form3Example3cg">Correo</label>
                    <input type="email" name="email" placeholder="Escriba su correo electronico"
                        id="form3Example3cg" class="form-control form-control-lg" />
                </div>

                <br>

                <div class="form-group">
                    <label for="form3Example4cg">Contraseña</label>
                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                </div>

                <br>

                <div class="form-group">
                    <label for="form3Example4cdg">Repetir contraseña</label>
                    <input type="password" name="password_confirmation" id="form3Example4cdg"
                        class="form-control form-control-lg" />
                </div>

                <br>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-block btn-lg text-body" type="submit">Crear nuevo Administrador
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
