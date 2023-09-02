<!doctype html>
<html lang="en">

<head>
    <title>Crear cuenta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">


                                <form action="/register" method="POST">
                                    @csrf

                                    @include('layouts.partials.menssage')

                                    <h2 class="text-uppercase text-center mb-5">Crear cuenta</h2>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Nombre completo</label>
                                        <input type="text" placeholder="Escriba su nombre" name="name"
                                            id="form3Example3cg" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Usuario</label>
                                        <input type="text" name="username" id="form3Example1cg"
                                            placeholder="Ingrese su usuario" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Correo</label>
                                        <input type="email" name="email" placeholder="Escriba su correo electronico"
                                            id="form3Example3cg" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Contraseña</label>
                                        <input type="password" name="password" id="form3Example4cg"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Repetir contraseña</label>
                                        <input type="password" name="password_confirmation" id="form3Example4cdg"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                            type="submit">Registarse</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Ya tienes cuenta?
                                        <a href="/login" class="fw-bold text-body"><u>Inicia
                                                sesion</u></a>
                                    </p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
