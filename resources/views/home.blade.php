@extends('layouts.app_master')

@section('title', 'Inicio')

@section('content')

    <div class="container d-flex justify-content-center align-items-center">
        <div class="text-center">
            @auth
                <h2 class="display-4 mt-5">Bienvenidos a Higtech°</h2>
                <div class="mt-5 col-auto p-4"
                    style="background-color: rgb(230, 242, 250); background-image: url('https://htpro.dev/wp-content/uploads/2022/06/Group-7.svg'); background-size: 25%; background-repeat: no-repeat; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <h4 class="mt-4">Bienvenido, {{ auth()->user()->name ?? auth()->user()->username }}.</h4>
                    <h4 class="mt-4">Nuestra misión es simple:</h4>
                    <p class="lead">Crear productos digitales increíbles que optimizan los procesos digitales de
                        organizaciones, empresas y agencias en todo el país.</p>
                </div>
            @endauth
        </div>
    </div>
@endsection
