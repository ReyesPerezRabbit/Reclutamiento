@extends('layouts.app_master')

@section('title', 'Inicio')

@section('content')

    <div class="container  vh-20">
        <div class="text-center">
            @auth
                <h1 class="mt-5">Bienvenidos a Higtech</h1>
                <div class="mt-5 col-auto "
                    style="background-color:rgb(230, 242, 250); background-image: url('https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg'); background-size: 25%; background-repeat: no-repeat;">

                    <div class="mt-5 col-auto">
                        <h4 class="mt-5">Bienvenido {{ auth()->user()->name ?? auth()->user()->username }}</h4>

                        <h4 class="mt-5">Nuestra misión es simple: <br> Crear productos digitales increíbles</h4>

                        <p class="mt-4">Desarrollamos software que ayuda a optimizar los procesos digitales de organizaciones,
                            empresas y agencias en todo el país</p>
                    </div>
                </div>

            @endauth

            {{-- para los que no están autenticados --}}

        </div>
    </div>

@endsection
