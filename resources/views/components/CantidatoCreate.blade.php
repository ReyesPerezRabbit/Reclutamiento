@extends('layouts.app_master')

@section('title', 'Crear Candidatos')

@section('content')


    <div class="container vh-75">
        <div class="row justify-content-center align-items-center h-75">
            @auth

                <div class="col-lg-10 mt-5">
                    <div class="shadow p-4 rounded">

                        <form action="{{ route('candidato.guardar') }}" method="POST">
                            @csrf
                            <h1 class="mb-5">Bienvenidos a Higtech</h1>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="name"
                                            placeholder="Nombre Completo" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="apellidoP" class="form-label">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellidoP" name="apellidoP"
                                            placeholder="Apellido Paterno" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="apellidoM" class="form-label">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellidoM" name="apellidoM"
                                            placeholder="Apellido Materno" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="estadocivil" class="form-label">Estado Civil</label>
                                        <select class="form-select" id="estadocivil" name="estado_civil" required>
                                            <option value="" disabled selected>Seleciona la opcion</option>
                                            <option value="casado">Casado</option>
                                            <option value="viudo">Viudo</option>
                                            <option value="soltero">Soltero</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="estatus" class="form-label">Estatus</label>
                                        <select class="form-select" id="estatus" name="estatus" required>
                                            <option value="" disabled selected>Seleciona la opcion</option>
                                            <option value="pendiente">Pendiente</option>
                                            <option value="en_proceso">En proceso</option>
                                            <option value="completado">Completado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="vacante" class="form-label">Vacante</label>
                                        <select class="form-select" id="vacante" name="vacante" required>
                                            <option value="" disabled selected>Seleciona la opcion</option>
                                            <option value="frontend">Frontend</option>
                                            <option value="backend">Backend</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="fechar" class="form-label">Fecha de registro</label>
                                        <input type="date" class="form-control" id="fechar" name="fecha_registro" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Edad</label>
                                        <input type="text" class="form-control" id="year" name="year"
                                            placeholder="Edad" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="domicilio" class="form-label">Domicilio</label>
                                        <input type="text" class="form-control" id="domicilio" name="domicilio"
                                            placeholder="Domicilio" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fechaevaluacion" class="form-label">Fecha de envío de evaluación</label>
                                        <input type="date" class="form-control" id="fechaevaluacion" name="fecha_evaluacion"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="nota" class="form-label">Notas</label>
                                        <input type="text" class="form-control" id="nota" name="nota"
                                            placeholder="Notas" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <div class="mb-3">
                                        <label for="cv" class="form-label">CV</label>
                                        <input type="file" class="form-control" id="cv" name="cv" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Guardar</button>
                        </form>
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
