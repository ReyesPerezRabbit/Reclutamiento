@extends('layouts.app_master')

@section('title', 'Crear Candidatos')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 mt-5">
                <div class="shadow p-4 rounded bg-light">

                    <form action="{{ route('candidato.guardar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="mb-4 text-center">Registro de Candidatos</h1>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="name" required
                                        oninput="this.value = this.value.toUpperCase()" placeholder="Nombre Completo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellidoPaterno" required
                                        oninput="this.value = this.value.toUpperCase()" placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellidoMaterno" required
                                        oninput="this.value = this.value.toUpperCase()" placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Estado Civil</label>
                                    <select class="form-select" name="estadoCivil" required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="casado">Casado</option>
                                        <option value="viudo">Viudo</option>
                                        <option value="soltero">Soltero</option>
                                        <option value="divorciado">Divorciado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Estatus</label>
                                    <select class="form-select" name="status" required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="Entrevistado">Entrevistado</option>
                                        <option value="Evaluación">Evaluación</option>
                                        <option value="Contratado">Contratado</option>
                                        <option value="En espera">En espera</option>
                                        <option value="Rechazado">Rechazado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Vacante</label>
                                    <select class="form-select" name="vacante" required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="Gerente">Gerente</option>
                                        <option value="PMO">PMO</option>
                                        <option value="Desarrollador">Desarrollador</option>
                                        <option value="DBA">DBA</option>
                                        <option value="Diseñador UI/UX">Diseñador UI/UX</option>
                                        <option value="Contador">Contador</option>
                                        <option value="Operador">Operador</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de registro</label>
                                    <input type="date" class="form-control" name="fechaRegistro" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Edad</label>
                                    <input type="text" class="form-control" name="years" placeholder="Edad" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Domicilio</label>
                                    <input type="text" class="form-control" name="domicilio" required
                                        oninput="this.value = this.value.toUpperCase()" placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de envío de evaluación</label>
                                    <input type="date" class="form-control" name="fechaEnvioEvaluacion" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Observaciones de la Entrevista</label>
                                    <input type="text" class="form-control" name="observaciones" required
                                        oninput="this.value = this.value.toUpperCase()" placeholder="Observaciones">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">CV (PDF o .doc)</label>
                                    <input type="file" class="form-control" name="cv" accept=".pdf,.doc">
                                </div>

                                @if ($errors->has('cv'))
                                <div class="alert alert-danger">{{ $errors->first('cv') }}</div>
                                @endif
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
