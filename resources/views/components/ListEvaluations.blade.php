@extends('layouts.app_list')

@section('title', 'Lista de Evaluacion')

@section('content')
    <section>
        @include('partials.menssage')

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <h1 class="mb-0">Lista de Evaluación</h1>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <a href="{{ route('candidato.guardar') }}" class="btn btn-primary">Añadir Candidatos</a>
                </div>
            </div>

            <div class="input-group input-group-sm mt-3">
                <input type="text" class="form-control form-control-sm" placeholder="Buscar candidato ....">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-sm" type="button">Buscar</button>
                </div>
            </div>
        </div>

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
                        <th>Observaciones</th>
                        <th>CV</th>
                        <th>Expediente</th>
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
                            <td>{{ $listas->apellidoPaterno }}</td>
                            <td>{{ $listas->apellidoMaterno }}</td>
                            <td>{{ $listas->estadoCivil }}</td>
                            <td>{{ $listas->status }}</td>
                            <td>{{ $listas->vacante }}</td>
                            <td>{{ $listas->fechaRegistro }}</td>
                            <td>{{ $listas->years }}</td>
                            <td>{{ $listas->domicilio }}</td>
                            <td>{{ $listas->fechaEnvioEvaluacion }}</td>
                            <td>{{ $listas->observaciones }}</td>
                            <td>{{ $listas->cv }}</td>
                            <td>
                                <a href="{{ route('candidato.editar', $listas->id) }}" class="boton-carpeta">
                                    <span class="carpeta-icono">&#128193;</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <!-- Botón "Anterior" -->
                    <li class="page-item {{ $candidatocreate->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $candidatocreate->previousPageUrl() }}" aria-label="Anterior">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <!-- Números de página -->
                    @foreach ($candidatocreate->getUrlRange(1, $candidatocreate->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $candidatocreate->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Botón "Siguiente" -->
                    <li class="page-item {{ $candidatocreate->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $candidatocreate->nextPageUrl() }}" aria-label="Siguiente">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </section>
@endsection
