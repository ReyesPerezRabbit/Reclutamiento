    <!doctype html>
    <html lang="en">

    <head>
        <title>Iniciar sesion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg" type="image/x-icon">

        <!-- Bootstrap CSS v5.2.1 -->
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <section class="h-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">

                                        <div class="text-center mt-1 mb-5 pb-1">
                                            <img src="https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg"
                                                style="width: 185px;" alt="logo">
                                        </div>
                                        <div class="text-center">
                                            <h4 class="mt-1 mb-5 pb-1">Inicio de sesion de Higtech</h4>
                                        </div>

                                        <form action="/login" method="post">
                                            @csrf

                                            @include('partials.menssage')

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example11">Usuario o Correo</label>
                                                <input type="text" name="username" id="form2Example11"
                                                    class="form-control" placeholder="Ingresa tu usuario o Correo" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example22">Contraseña</label>
                                                <input type="password" name="password" id="form2Example22"
                                                    class="form-control" />
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    type="submit">iniciar sesion</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                {{-- Ya crea la autenticacion --}}

                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-dark px-3 py-4 p-md-5 mx-md-4">
                                        <h4 class="mb-4 text-center">Lema</h4>
                                        <p class="small mb-0">Desarrollamos software que ayuda a optimizar los procesos
                                            digitales de organizaciones,
                                            empresas y agencias en todo el país</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    </html>
