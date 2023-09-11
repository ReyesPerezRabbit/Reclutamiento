<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.1 -->
    <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    @include('layouts.partials.navbar')

    <main>

        <div class="text-center">
            {{-- Para los que ya esten Logeados --}}
            @auth
                @yield('content')
            @endauth

            {{-- Para los que no esten Logeados --}}
            @guest
                <div class="text-center mt-5">
                    <p>Para poder registrarse, debe iniciar sesión <a href="/login">aquí</a></p>
                </div>
            @endguest
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('assets/js/') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabla = document.getElementById("miTabla");
            const filas = tabla.getElementsByTagName("tr");
            const inputBusqueda = document.querySelector(".form-control");

            inputBusqueda.addEventListener("keyup", function() {
                const textoBusqueda = inputBusqueda.value.toLowerCase();

                for (let i = 1; i < filas.length; i++) {
                    const fila = filas[i];
                    const celdas = fila.getElementsByTagName("td");
                    let coincide = false;

                    for (let j = 0; j < celdas.length; j++) {
                        const celda = celdas[j];
                        if (celda.textContent.toLowerCase().includes(textoBusqueda)) {
                            coincide = true;
                            break;
                        }
                    }

                    if (coincide) {
                        fila.style.display = "";
                    } else {
                        fila.style.display = "none";
                    }
                }
            });
        });
    </script>



</body>

</html>
