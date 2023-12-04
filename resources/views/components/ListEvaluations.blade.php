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

            {{-- <div class="input-group input-group-sm mt-3">
                <input type="text" class="form-control form-control-sm" placeholder="Buscar candidato ....">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-sm" type="button">Buscar</button>
                </div> --}}
        </div>
        </div>


        {{-- <input type="date" class="form-control form-control-sm" id="filtroFechaRegistro"
                placeholder="Filtrar por Fecha de Registro">

            <input type="date" class="form-control form-control-sm" id="filtroFechaEnvioEvaluacion"
                placeholder="Filtrar por Fecha de Envío de Evaluación"> --}}

        <div class="col-10">
            <form action="{{ route('candidato.lista') }}" method="GET" id="miFormulario">
                @csrf
                <div class="input-group input-group-sm mt-3 text-center">
                    <input type="text" class="form-control form-control-sm" id="filtroNombre"
                        placeholder="Buscar por nombre">

                    <select class="form-control form-control-sm" name="filtroVacante" id="filtroVacante">
                        <option value="">Vacantes</option>
                        <option value="Gerente" {{ old('filtroVacante') === 'Gerente' ? 'selected' : '' }}>Gerente</option>
                        <option value="PMO" {{ old('filtroVacante') === 'PMO' ? 'selected' : '' }}>PMO</option>
                        <option value="Desarrollador" {{ old('filtroVacante') === 'Desarrollador' ? 'selected' : '' }}>
                            Desarrollador</option>
                        <option value="DBA" {{ old('filtroVacante') === 'DBA' ? 'selected' : '' }}>DBA</option>
                        <option value="Diseñador UI/UX" {{ old('filtroVacante') === 'Diseñador UI/UX' ? 'selected' : '' }}>
                            Diseñador UI/UX</option>
                        <option value="Contador" {{ old('filtroVacante') === 'Contador' ? 'selected' : '' }}>Contador
                        </option>
                        <option value="Operador" {{ old('filtroVacante') === 'Operador' ? 'selected' : '' }}>Operador
                        </option>
                    </select>

                    <select class="form-control form-control-sm" name="estadoCivil" id="estadoCivil">
                        <option value="" disabled selected>Estado Civil</option>
                        <option value="Casado">Casado</option>
                        <option value="Viudo">Viudo</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>

                    <select class="form-control form-control-sm" name="filtroEstatus" id="filtroEstatus">
                        <option value="" disabled selected>Estatus</option>
                        <option value="Entrevistado">Entrevistado</option>
                        <option value="Evaluacion">Evaluación</option>
                        <option value="Contratado">Contratado</option>
                        <option value="En espera">En espera</option>
                        <option value="Rechazado">Rechazado</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" type="button" id="btnFiltrar">Filtrar</button>
                        <a href="{{ route('candidato.lista') }}" class="btn btn-info">Limpiar filtro</a>
                    </div>
                </div>
            </form>
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
                            <td>@php echo date('d/m/Y', strtotime($listas->fechaRegistro)); @endphp</td>
                            <td>{{ $listas->years }}</td>
                            <td>{{ $listas->domicilio }}</td>
                            <td>@php echo date('d/m/Y', strtotime($listas->fechaEnvioEvaluacion)); @endphp</td>
                            <td>{{ $listas->observaciones }}</td>
                            <td>{{ $listas->cv }}</td>

                            {{-- <td>
                                @if ($listas->cv)
                                    <!-- Muestra el enlace o el nombre del archivo del CV -->
                                    <a href="{{ route('descargar.cv', $listas->id) }}">Descargar CV</a>
                                    {{ $listas->cv }}
                                @else
                                    Sin archivo adjunto
                                @endif
                            </td>--}}

                            {{-- <td>
                                {{-- @if($listas->cv)
                                    <a href="{{ route('descargar.cv', $listas->id) }}" target="_blank">Ver CV</a>
                                @else
                                    Sin archivo adjunto
                                @endif
                            </td> --}} 

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
