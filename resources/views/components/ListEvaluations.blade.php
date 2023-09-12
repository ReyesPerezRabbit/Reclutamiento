@extends('layouts.app_list')

@section('title', 'Lista de Evaluacion')

@section('content')
    <section>
        @include('layouts.partials.menssage')

        <div class="mt-3" style="display: flex; justify-content: center; align-items: center;">
            <h1 style="margin-right: 60px; margin-bottom: 0;">Lista de Evaluación</h1>
            <a type="button" class="btn btn-info" href="{{ route('candidato.guardar') }}" style="margin-left: 30px;">Agregar
                Candidato</a>
            <div class="input-group input-group-sm mt-2 mx-auto" style="max-width: 350px;">
                <input type="text" class="form-control form-control-sm" placeholder="Buscar candidato ....">
                <button class="btn btn-outline-secondary btn-sm" type="button">Buscar</button>
            </div>

        </div>

        {{-- <div class="input-group input-group-sm mt-3 mx-auto" style="max-width: 350px;">
            <input type="text" class="form-control form-control-sm" placeholder="Buscar candidato ....">
            <button class="btn btn-outline-secondary btn-sm" type="button">Buscar</button>
        </div> --}}

        <div class="table-scroll text-center w-auto p-3 h-100 d-inline-block mt-3">
            <table id="miTabla" class="table table-responsive table-bordered mt-4 table-scroll table-tall table-extended">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Estado Civil</th>
                        <th>Estatus</th>
                        <th>Vacante</th>
                        <th>Fecha de registro</th>
                        <th>Edad</th>
                        <th>Domicilio</th>
                        <th>Fecha de envío de evaluación</th>
                        <th>Notas</th>
                        <th>CV</th>
                        {{-- <th>Expediente</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach ($candidatocreate as $listas)
                        <tr>
                            <th scope="row">{{ $counter++ }}</th>
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
                            {{-- <td>
                                <a href="{{ route('candidato.editar', $listas->id) }}" class="boton-carpeta">
                                    <span class="carpeta-icono">&#128193;</span>
                                </a>
                            </td> --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $candidatocreate->links() }}
        </div>
    </section>
@endsection
