@extends('layouts.app_list')

@section('title', 'Lista de Evaluacion')

@section('content')


<div class="container-fluid vh-75">
    <div  class="row justify-content-center align-items-center h-75">
        @auth
        <div class=" mt-5">
            <div class="shadow p-4 rounded">
                @include('layouts.partials.menssage')

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Lista de Evaluación</h1>
                    <a type="button" class="btn btn-info" href="{{ route('candidato.guardar') }}">Agregar Candidato</a>
                </div>

                <!-- Barra de búsqueda -->
                <div class="input-group mt-3 ">
                    <input type="text" class="form-control" placeholder="Buscar candidato ....">
                    <button class="btn btn-outline-secondary" type="button">Buscar</button>
                </div>

                <div class="table-scroll">
                <table id="miTabla" class="table table-responsive table-bordered mt-4 table-scroll table-tall table-extended">
                    <thead>
                        <tr>
                            <th >Nombre</th>
                            <th >Apellido Paterno</th>
                            <th >Apellido Materno</th>
                            <th >Estado Civil</th>
                            <th >Estatus</th>
                            <th >Vacante</th>
                            <th >Fecha de registro</th>
                            <th >Edad</th>
                            <th >Domicilio</th>
                            <th >Fecha de envio de evaluacion</th>
                            <th >Notas</th>
                            <th >CV</th>
                            <th>Expediente</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($candidatocreate as $listas)
                            <tr>
                                <td>{{ $listas->name }}</td>
                                <td>{{ $listas->apellidoP }}</td>
                                <td>{{ $listas->apellidoM }}</td>
                                <td>{{ $listas->estado_civil }}</td>
                                <td>{{ $listas->estatus }}</td>
                                <td>{{ $listas->vacante }}</td>
                                <td>{{ $listas->fecha_registro }}</td>
                                <td>{{ $listas->year }}</td>
                                <td>{{ $listas->domicilio }}</td>
                                <td>{{ $listas->fecha_evaluacion }}</td>
                                <td>{{ $listas->nota }}</td>
                                <td>{{ $listas->cv }}</td>
                                <td>
                                    <a href="#" class="boton-carpeta">
                                        <span class="carpeta-icono">&#128193;</span>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        @endauth


        {{-- para los que no están autenticados --}}
        @guest
        <div class="text-center">
            <p class="mt-4">Para poder registrarse, debe iniciar sesión <a href="/login">aquí</a></p>
        </div>
        @endguest
    </div>
</div>
@endsection
