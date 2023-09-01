@extends('layouts.app_master')

@section('title', 'Inicio')

@section('content')

    <div class="text-center vh-10 mt-5">
        @auth
            <h1 class="mt-10">Bienvenidos a Higtech</h1>
            <div class="d-flex justify-content-center align-items-center vh-10">

                <div class="col-lg-6 d-flex align-items-center gradient-custom-2 my-4 rounded shadow">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4 text-center">
                        <h4>Lema</h4>

                        <h1>Example heading <span class="badge bg-secondary">New</span></h1>

                        <p class="mt-4">Bienvenido {{ auth()->user()->name ?? auth()->user()->username }}, estás autenticado</p>
                        
                        <h1>Nuestra mision es simple: <br>
                            Crear productos digitales incleibles</h1>

                        <p>Desarrollamos Sotfware que ayuda a optimizar los procesos digitales de organizaciones, empresas y
                            agencias en todoe el pais</p>
                    </div>
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
