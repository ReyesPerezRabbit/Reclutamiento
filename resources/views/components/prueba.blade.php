@extends('layouts.app_master')

@section('title', 'Prueba')

@section('content')

    <div class="container mt-5">
        <h1>Formulario de Vacante</h1>
        <form id="miFormulario" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="vacante" class="form-label">Vacante *</label>
                <select class="form-select" id="vacante" name="vacante" required>
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
                <input type="text" class="form-control mt-2" id="otraVacante" name="otraVacante"
                    placeholder="Ingresa otra vacante" style="display: none;">
            </div>
            <div class="mb-3">
                <label for="fotografia" class="form-label">Fotografía (PDF o .doc) *</label>
                <input type="file" class="form-control" id="fotografia" name="fotografia" accept=".pdf,.doc" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno *</label>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
            </div>
            <div class="mb-3">
                <label for="apellidoMaterno" class="form-label">Apellido Materno *</label>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required>
            </div>
            <div class="mb-3">
                <label for="fechaRegistro" class="form-label">Fecha de Registro *</label>
                <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" required>
            </div>
            <div class="mb-3">
                <label for="fechaEnvioEvaluacion" class="form-label">Fecha de Envío de Evaluación</label>
                <input type="date" class="form-control" id="fechaEnvioEvaluacion" name="fechaEnvioEvaluacion">
            </div>
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento *</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="Masculino"
                        required>
                    <label class="form-check-label" for="sexoMasculino">Masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="sexoFemenino" value="Femenino"
                        required>
                    <label class="form-check-label" for="sexoFemenino">Femenino</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="estadoCivil" class="form-label">Estado Civil</label>
                <select class="form-select" id="estadoCivil" name="estadoCivil">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viudo">Viudo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio *</label>
                <input type="text" class="form-control" id="domicilio" name="domicilio" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono *</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="correoPersonal" class="form-label">Correo Personal *</label>
                <input type="email" class="form-control" id="correoPersonal" name="correoPersonal" required>
            </div>
            <div class="mb-3">
                <label for="condicionesMedicas" class="form-label">Condiciones Médicas Específicas</label>
                <textarea class="form-control" id="condicionesMedicas" name="condicionesMedicas" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="iq" class="form-label">IQ *</label>
                <select class="form-select" id="iq" name="iq" required>
                    <option value="" disabled selected>Selecciona una opción</option>
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
            <div class="mb-3">
                <label for="resultadosEvaluacion" class="form-label">Resultados Evaluación Técnica (x%)</label>
                <input type="number" class="form-control" id="resultadosEvaluacion" name="resultadosEvaluacion"
                    min="0" max="100">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Por entrevistar" selected>Por entrevistar</option>
                    <option value="Entrevistado">Entrevistado</option>
                    <option value="Evaluación">Evaluación</option>
                    <option value="Contratado">Contratado</option>
                    <option value="En espera">En espera</option>
                    <option value="Rechazado">Rechazado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">CV (PDF o .doc)</label>
                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc">
            </div>
            <div class="mb-3">
                <label for="conocimientos" class="form-label">Conocimientos</label>
                <select class="form-select" id="conocimientos" name="conocimientos">
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
                <input type="text" class="form-control mt-2" id="otroConocimiento" name="otroConocimiento"
                    placeholder="Ingresa otro conocimiento" style="display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

@endsection
