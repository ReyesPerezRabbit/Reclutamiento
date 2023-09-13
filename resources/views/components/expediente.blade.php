@extends('layouts.app_expe')

@section('title', 'Crear Candidatos')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1>Expediente de candidato</h1>
        </div>
        <form action="{{ route('candidato.actualizar', $candidato) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- FORMULARIO --}}

            <div class="mb-3">
                <label class="form-label">Vacante</label>
                <select class="form-select" name="vacante" required>
                    <option value="" disabled selected>Seleccione la vacante</option>
                    <option value="Gerente" {{ old('vacante', $candidato->vacante) === 'Gerente' ? 'selected' : '' }}>
                        Gerente</option>
                    <option value="PMO" {{ old('vacante', $candidato->vacante) === 'PMO' ? 'selected' : '' }}>PMO
                    </option>
                    <option value="Desarrollador"
                        {{ old('vacante', $candidato->vacante) === 'Desarrollador' ? 'selected' : '' }}>Desarrollador
                    </option>
                    <option value="DBA" {{ old('vacante', $candidato->vacante) === 'DBA' ? 'selected' : '' }}>DBA
                    </option>
                    <option value="Diseñador UI/UX"
                        {{ old('vacante', $candidato->vacante) === 'Diseñador UI/UX' ? 'selected' : '' }}>Diseñador UI/UX
                    </option>
                    <option value="Contador" {{ old('vacante', $candidato->vacante) === 'Contador' ? 'selected' : '' }}>
                        Contador</option>
                    <option value="Operador" {{ old('vacante', $candidato->vacante) === 'Operador' ? 'selected' : '' }}>
                        Operador</option>
                    <option value="Otro" {{ old('vacante', $candidato->vacante) === 'Otro' ? 'selected' : '' }}>Otro
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Fotografía (PDF o .doc)</label>
                <input type="file" class="form-control" name="fotografia" accept=".pdf,.doc" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $candidato->name) }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Edad</label>
                    <input type="text" class="form-control" name="years" value="{{ old('years', $candidato->years) }}"
                        required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoPaterno"
                        value="{{ old('apellidoPaterno', $candidato->apellidoPaterno) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoMaterno"
                        value="{{ old('apellidoMaterno', $candidato->apellidoMaterno) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" name="fechaRegistro" value="{{ old('fechaRegistro', $candidato->fechaRegistro) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Envío de Evaluación</label>
                    <input type="date" class="form-control" name="fechaEnvioEvaluacion" value="{{ old('fechaEnvioEvaluacion', $candidato->fechaEnvioEvaluacion) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" name="sexo" required>
                        <option value="" disabled selected>Seleccione el genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="estadoCivil" class="form-select">
                        <option value="" disabled selected>Seleccione el estado civil</option>

                        <option value="Soltero"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'soltero' ? 'selected' : '' }}>Soltero
                        </option>

                        <option value="Casado"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'casado' ? 'selected' : '' }}>
                            Casado</option>

                        <option value="Divorciado"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'divorciado' ? 'selected' : '' }}>Divorciado
                        </option>

                        <option value="Viudo"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'viudo' ? 'selected' : '' }}>
                            Viudo</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio"
                        value="{{ old('domicilio', $candidato->domicilio) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo Personal</label>
                    <input type="email" class="form-control" name="correoPersonal" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Condiciones Médicas Específicas</label>
                <textarea class="form-control" name="condicionesMedicas" rows="4"></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Observaciones</label>
                    <input class="form-control" name="observaciones"
                        value="{{ old('observaciones', $candidato->observaciones) }}" rows="4">
                </div>

                <div class="col-md-5 mb-3">
                    <label class="form-label">IQ</label>
                    <select class="form-select" name="iq" required>
                        <option value="" disabled selected>Selecciona una opcion</option>
                        <option value="Menos de 70 puntos">Menos de 70 puntos: bajo rendimiento</option>
                        <option value="Entre 70 y 79 puntos">Entre 70 y 79 puntos: inteligencia limítrofe</option>
                        <option value="Entre 80 y 89 puntos">Entre 80 y 89 puntos: Bajo</option>
                        <option value="Entre 90 y 109 puntos">Entre 90 y 109 puntos: Promedio normal</option>
                        <option value="Entre 110 y 119 puntos">Entre 110 y 119 puntos: Alto</option>
                        <option value="Entre 120 y 129 puntos">Entre 120 y 129 puntos: inteligencia superior al promedio
                        </option>
                        <option value="Más de 130 puntos">Más de 130 puntos: inteligencia muy superior al promedio</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Resultados Evaluación Técnica (x%)</label>
                    <input type="number" class="form-control" name="resultadosEvaluacion" min="0"
                        max="100">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="" disabled selected>Selecciona una opcion</option>
                        <option value="Entrevistado"
                            {{ old('status', $candidato->status) === 'entrevistado' ? 'selected' : '' }}>Entrevistado
                        </option>
                        <option value="Evaluación"
                            {{ old('status', $candidato->status) === 'Evaluacion' ? 'selected' : '' }}>
                            Evaluación
                        </option>
                        <option value="Contratado"
                            {{ old('status', $candidato->status) === 'Contratado' ? 'selected' : '' }}>
                            Contratado
                        </option>
                        <option value="En espera"
                            {{ old('status', $candidato->status) === 'En espera' ? 'selected' : '' }}>En
                            espera
                        </option>
                        <option value="Rechazado"
                            {{ old('status', $candidato->status) === 'Rechazado' ? 'selected' : '' }}>
                            Rechazado
                        </option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Conocimientos</label>
                    <select class="form-select" name="conocimientos">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="Laravel">Laravel</option>
                        <option value="PHP">PHP</option>
                        <option value="React">React</option>
                        <option value="Angular">Angular</option>
                        <option value="Symfony">Symfony</option>
                        <option value="Django">Django</option>
                        <option value="Phalcon">Phalcon</option>
                        <option value="Spring">Spring</option>
                        <option value="Express JS">Express JS</option>
                        <option value="Struts">Struts</option>
                        <option value="Zend">Zend</option>
                        <option value="Java">Java</option>
                        <option value="Figma">Figma</option>
                        <option value="Smartsheet">Smartsheet</option>
                        <option value="Scrum">Scrum</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">CV (PDF o .doc)</label>
                <input type="file" class="form-control" name="cv" accept=".pdf,.doc">
            </div>
           <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Confirmar Registro</button>
           </div>
        </form>
    </div>
@endsection
