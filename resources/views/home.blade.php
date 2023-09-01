@extends('layouts.app_master')

@section('title', 'Inicio')

@section('content')

    <div class="text-center vh-10 mt-5">
        @auth
            <h1 class="mt-10">Bienvenidos a Higtech</h1>
            <div class="col-lg-6 d-flex align-items-center" style="background-color:rgb(230, 242, 250); background-image: url('https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg'); background-size: 25%; background-repeat: no-repeat;">
                <div class="text-black px-3 py-4 p-md-5 mx-md-4 text-center">
                    <h4 class="mt-4">Bienvenido {{ auth()->user()->name ?? auth()->user()->username }}</h4>

                    <h4 class="mt-4">Nuestra misión es simple: <br>
                        Crear productos digitales increíbles</h4>

                    <p class="mt-4">Desarrollamos software que ayuda a optimizar los procesos digitales de organizaciones,
                        empresas y agencias en todo el país</p>
                </div>
            </div>

        @endauth
    </div>


    {{-- para los que no estan autenticados --}}
    @guest
        <div class="text-center">
            <p>Para poder hacer registos usted debe registarse <a href="/login">!Aqui</a></p>
        </div>
    @endguest


@endsection
