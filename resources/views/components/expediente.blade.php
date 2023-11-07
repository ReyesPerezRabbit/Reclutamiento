@extends('layouts.app_expe')

@section('title', 'Crear Candidatos')

@section('content')
    <div class="container mt-5">
        <div class="text-center mt-3">
            <h1>Expediente de candidato</h1>
        </div>
        <form action="{{ route('candidato.actualizar', $candidato) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('put')

            {{-- FORMULARIO --}}

            <div class="col-md-12 mb-5 mt-5">
                <div id="file-preview">
                    <img id="preview-image" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; max-height: 200px;">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotografia" name="fotografia" accept=".jpg, .png" required onchange="previewImage(this)">
                    <label class="custom-file-label" for="fotografia"></label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $candidato->name) }}"
                        required oninput="this.value = this.value.toUpperCase()">
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
                    <input type="text" class="form-control" name="apellidoPaterno" value="{{ old('apellidoPaterno', $candidato->apellidoPaterno) }}" required oninput="this.value = this.value.toUpperCase()">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoMaterno"
                        value="{{ old('apellidoMaterno', $candidato->apellidoMaterno) }}" required oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
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
                            {{ old('vacante', $candidato->vacante) === 'Diseñador UI/UX' ? 'selected' : '' }}>Diseñador
                            UI/UX
                        </option>
                        <option value="Contador"
                            {{ old('vacante', $candidato->vacante) === 'Contador' ? 'selected' : '' }}>
                            Contador</option>
                        <option value="Operador"
                            {{ old('vacante', $candidato->vacante) === 'Operador' ? 'selected' : '' }}>
                            Operador</option>
                        <option value="Otro" {{ old('vacante', $candidato->vacante) === 'Otro' ? 'selected' : '' }}>Otro
                        </option>
                    </select>
                </div>
            </div>




            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" name="fechaRegistro"
                        value="{{ old('fechaRegistro', $candidato->fechaRegistro) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Envío de Evaluación</label>
                    <input type="date" class="form-control" name="fechaEnvioEvaluacion"
                        value="{{ old('fechaEnvioEvaluacion', $candidato->fechaEnvioEvaluacion) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento"
                        value="{{ old('fechaNacimiento', $candidato->fechaNacimiento) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" name="sexo" required>
                        <option value="" disabled selected>Seleccione el género</option>
                        <option value="Masculino" {{ old('sexo', $candidato->sexo) === 'Masculino' ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="Femenino" {{ old('sexo', $candidato->sexo) === 'Femenino' ? 'selected' : '' }}>
                            Femenino</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="estadoCivil" class="form-select">
                        <option value="" disabled selected>Seleccione el estado civil</option>

                        <option value="Soltero"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'Soltero' ? 'selected' : '' }}>Soltero
                        </option>

                        <option value="Casado"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'Casado' ? 'selected' : '' }}>
                            Casado</option>

                        <option value="Divorciado"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'Divorciado' ? 'selected' : '' }}>Divorciado
                        </option>

                        <option value="Viudo"
                            {{ old('estadoCivil', $candidato->estadoCivil) === 'Viudo' ? 'selected' : '' }}>
                            Viudo</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono"
                        value="{{ old('telefono', $candidato->telefono) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio"
                        value="{{ old('domicilio', $candidato->domicilio) }}" required oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo Personal</label>
                    <input type="email" class="form-control" name="correoPersonal"
                        value="{{ old('correoPersonal', $candidato->correoPersonal) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Condiciones Médicas Específicas</label>
                <textarea class="form-control" name="condicionesMedicas" rows="4">{{ old('condicionesMedicas', $candidato->condicionesMedicas) }}</textarea>
            </div>


            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Observaciones</label>
                    <input class="form-control" name="observaciones"
                        value="{{ old('observaciones', $candidato->observaciones) }}" rows="4" oninput="this.value = this.value.toUpperCase()">
                </div>

                <div class="col-md-5 mb-3">
                    <label class="form-label">IQ</label>
                    <select class="form-select" name="iq" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="Menos de 70 puntos"
                            {{ old('iq', $candidato->iq) === 'Menos de 70 puntos' ? 'selected' : '' }}>
                            Menos de 70 puntos: bajo rendimiento
                        </option>
                        <option value="Entre 70 y 79 puntos"
                            {{ old('iq', $candidato->iq) === 'Entre 70 y 79 puntos' ? 'selected' : '' }}>
                            Entre 70 y 79 puntos: inteligencia limítrofe
                        </option>
                        <option value="Entre 80 y 89 puntos"
                            {{ old('iq', $candidato->iq) === 'Entre 80 y 89 puntos' ? 'selected' : '' }}>
                            Entre 80 y 89 puntos: Bajo
                        </option>
                        <option value="Entre 90 y 109 puntos"
                            {{ old('iq', $candidato->iq) === 'Entre 90 y 109 puntos' ? 'selected' : '' }}>
                            Entre 90 y 109 puntos: Promedio normal
                        </option>
                        <option value="Entre 110 y 119 puntos"
                            {{ old('iq', $candidato->iq) === 'Entre 110 y 119 puntos' ? 'selected' : '' }}>
                            Entre 110 y 119 puntos: Alto
                        </option>
                        <option value="Entre 120 y 129 puntos"
                            {{ old('iq', $candidato->iq) === 'Entre 120 y 129 puntos' ? 'selected' : '' }}>
                            Entre 120 y 129 puntos: inteligencia superior al promedio
                        </option>
                        <option value="Más de 130 puntos"
                            {{ old('iq', $candidato->iq) === 'Más de 130 puntos' ? 'selected' : '' }}>
                            Más de 130 puntos: inteligencia muy superior al promedio
                        </option>
                    </select>
                </div>


                <div class="col-md-3 mb-3">
                    <label class="form-label">Resultados Evaluación Técnica (x%)</label>
                    <input type="number" class="form-control" name="resultadosEvaluacion" min="0"
                        max="100" value="{{ old('resultadosEvaluacion', $candidato->resultadosEvaluacion) }}">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Estatus</label>
                    <select class="form-select" name="status" required>
                        <option value="" disabled selected>Selecciona una opcion</option>
                        <option value="Entrevistado"
                            {{ old('status', $candidato->status) === 'Entrevistado' ? 'selected' : '' }}>Entrevistado
                        </option>
                        <option value="Evaluacion"
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
                        <option value="Laravel"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Laravel' ? 'selected' : '' }}>Laravel
                        </option>
                        <option value="PHP"
                            {{ old('conocimientos', $candidato->conocimientos) === 'PHP' ? 'selected' : '' }}>PHP</option>
                        <option value="React"
                            {{ old('conocimientos', $candidato->conocimientos) === 'React' ? 'selected' : '' }}>React
                        </option>
                        <option value="Angular"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Angular' ? 'selected' : '' }}>Angular
                        </option>
                        <option value="Symfony"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Symfony' ? 'selected' : '' }}>Symfony
                        </option>
                        <option value="Django"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Django' ? 'selected' : '' }}>Django
                        </option>
                        <option value="Phalcon"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Phalcon' ? 'selected' : '' }}>Phalcon
                        </option>
                        <option value="Spring"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Spring' ? 'selected' : '' }}>Spring
                        </option>
                        <option value="Express JS"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Express JS' ? 'selected' : '' }}>
                            Express JS</option>
                        <option value="Struts"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Struts' ? 'selected' : '' }}>Struts
                        </option>
                        <option value="Zend"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Zend' ? 'selected' : '' }}>Zend
                        </option>
                        <option value="Java"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Java' ? 'selected' : '' }}>Java
                        </option>
                        <option value="Figma"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Figma' ? 'selected' : '' }}>Figma
                        </option>
                        <option value="Smartsheet"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Smartsheet' ? 'selected' : '' }}>
                            Smartsheet</option>
                        <option value="Scrum"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Scrum' ? 'selected' : '' }}>Scrum
                        </option>
                        <option value="Otro"
                            {{ old('conocimientos', $candidato->conocimientos) === 'Otro' ? 'selected' : '' }}>Otro
                        </option>
                    </select>
                </div>

            </div>

            <div class="mb-3">
                <label class="form-label">CV (PDF o .doc)</label>
                <input type="file" class="form-control" name="cv" accept=".pdf,.doc">
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Confirmar Registro</button>
                <a href="{{ route('candidato.lista') }}" class="btn btn-primary">Ir a la lista de candidatos</a>
            </div>

        </form>
    </div>
@endsection
