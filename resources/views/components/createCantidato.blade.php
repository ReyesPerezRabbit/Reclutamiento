@extends('layouts.app_master')

@section('title', 'Crear Candidatos')

@section('content')

    <div class="container  vh-50">
        <div class="text-center">
            @auth
                <h1 class="mt-5">Bienvenidos a Higtech</h1>
                <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario</label>
                            <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Archivo</label>
                            <input type="file" class="form-control" id="archivo" name="archivo">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>

            @endauth

            {{-- para los que no están autenticados --}}
            @guest
                <div class="text-center mt-5">
                    <p>Para poder registrarse, debe iniciar sesión <a href="/login">aquí</a></p>
                </div>
            @endguest
        </div>
    </div>
@endsection
