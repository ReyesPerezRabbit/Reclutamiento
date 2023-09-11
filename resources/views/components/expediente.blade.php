<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Colaborador</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/expediente.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar CSS personalizado para algunas validaciones -->
    <style>
        /* Agregar aquí estilos personalizados según sea necesario */
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="text-center">
            <h1>Expediente</h1>
        </div>
        <form action="{{ route('candidato.actualizar', $candidato) }}" method="POST"></form>
        @csrf
        @method('put')

        <!-- Campo Puesto -->
        <div class="form-group">
            <label for="puesto">Vacante:</label>
            <select class="form-control" id="puesto" name="vacante">
                <option value="" disabled selected>Seleciona la opcion</option>
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

        <div class="form-group">
            <label for="foto">Fotografía:</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*"
                onchange="mostrarImagen()">
        </div>
        <!-- Vista previa de la imagen -->
        <div class="form-group">
            <img id="imagen-preview" src="#" alt="Vista previa de la imagen" style="display: none;">
        </div>

        <!-- Campo Nombre -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre(s):</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $candidato->name) }}"
                    placeholder="Nombre(s)">
            </div>
            <div class="form-group col-md-4">
                <label for="apellidoPaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellidoP"
                    value="{{ old('apellidoP', $candidato->apellidoP) }}" placeholder="Apellido Paterno">
            </div>
            <div class="form-group col-md-4">
                <label for="apellidoMaterno">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellidoM"
                    value="{{ old('apellidoM', $candidato->apellidoM) }}" placeholder="Apellido Materno">
            </div>
        </div>

        <!-- Campo Fecha de Ingreso -->
        <div class="form-group">
            <label for="fechar">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fechar" name="fechar">
        </div>

        <!-- Campo Fecha de Nacimiento -->
        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
        </div>

        <!-- Campo Estado Civil -->
        <div class="form-group">
            <label for="estadocivil">Estado Civil:</label>
            <select class="form-control" id="estadocivil" name="estadocivil">
                <option value="" disabled selected>Seleciona la opcion</option>
                <option value="casado">Casado</option>
                <option value="viudo">Viudo</option>
                <option value="soltero">Soltero</option>
                <option value="divorciado">divorciado</option>
            </select>
        </div>

        <!-- Campo Domicilio -->
        <div class="text-center">
            <h3>Domicilio</h3>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="colonia">Colonia:</label>
                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
            </div>
            <div class="form-group col-md-4">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
            </div>
            <div class="form-group col-md-4">
                <label for="numeroCasa">Número de Casa:</label>
                <input type="text" class="form-control" id="numeroCasa" name="numeroCasa"
                    placeholder="Número de Casa">
            </div>
            <div class="form-group col-md-4">
                <label for="municipio">Municipio:</label>
                <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio">
            </div>
            <div class="form-group col-md-4">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
            </div>
            <div class="form-group col-md-4">
                <label for="pais">País:</label>
                <input type="text" class="form-control" id="pais" name="pais" placeholder="País">
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio:</label>
                <input type="text" class="form-control" id="domicilio" name="domicilio"
                    value="{{ old('domicilio', $candidato->domicilio) }}" placeholder="Domicilio">
            </div>
        </div>

        <!-- Campo Teléfono -->
        <div class="text-center">
            <h3>Datos Personales</h3>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
        </div>

        <!-- Campo Correo Personal -->
        <div class="form-group">
            <label for="correoPersonal">Correo Personal:</label>
            <input type="email" class="form-control" id="correoPersonal" name="correoPersonal"
                placeholder="Correo Personal">
        </div>

        <!-- Campo Correo Empresarial -->
        <div class="form-group">
            <label for="correoEmpresarial">Correo Empresarial:</label>
            <input type="email" class="form-control" id="correoEmpresarial" name="correoEmpresarial"
                placeholder="Correo Empresarial

">
        </div>

        <!-- Campo RFC -->
        <div class="form-group">
            <label for="rfc">RFC:</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC">
        </div>

        <!-- Campo CURP -->
        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP">
        </div>
        <div class="form-group">
            <label for="year" class="form-label">Edad</label>
            <input type="text" class="form-control" id="year" name="year"
                value="{{ old('year', $candidato->year) }}" placeholder="Edad">
        </div>

        <!-- Campo Número de Seguridad Social -->
        <div class="form-group">
            <label for="nss">Número de Seguridad Social:</label>
            <input type="text" class="form-control" id="nss" name="nss"
                placeholder="Número de Seguridad Social">
        </div>

        <!-- Campo Alergias -->
        <div class="form-group">
            <label for="alergias">Alergias:</label>
            <input type="text" class="form-control" id="alergias" name="alergias" placeholder="Alergias">
        </div>

        <!-- Campo Tipo de Sangre -->
        <div class="form-group">
            <label for="tipoSangre">Tipo de Sangre:</label>
            <select class="form-control" id="tipoSangre" name="tipoSangre">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>

        <!-- Campo Condiciones Médicas Específicas -->
        <div class="form-group">
            <label for="condicionesMedicas">Condiciones Médicas Específicas:</label>
            <textarea class="form-control" id="condicionesMedicas" name="condicionesMedicas" rows="3"></textarea>
        </div>

        <!-- Campo Nacionalidad -->
        <div class="form-group">
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                placeholder="Nacionalidad">
        </div>

        <!-- Campo Proyecto -->
        <div class="form-group">
            <label for="proyecto">Proyecto:</label>
            <select class="form-control" id="proyecto" name="proyecto">
                <option value="REPSE">REPSE</option>
                <option value="SUPPLY">SUPPLY</option>
                <option value="TAX">TAX</option>
                <option value="INVOICE">INVOICE</option>
                <option value="TRAVEL">TRAVEL</option>
                <option value="C & T">C & T</option>
                <option value="CONVERTION">CONVERTION</option>
                <option value="AGP">AGP</option>
                <option value="CONSERVA">CONSERVA</option>
                <option value="SIN ASIGNAR">SIN ASIGNAR</option>
                <option value="OTRO">OTRO</option>
            </select>
        </div>

        <!-- Campo A Quién Reporta -->
        <div class="form-group">
            <label for="reporta">A Quién Reporta:</label>
            <input type="text" class="form-control" id="reporta" name="reporta" placeholder="A Quién Reporta">
        </div>

        <!-- Características de Equipo de Computo -->
        <h3>Características de Equipo de Computo</h3>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
        </div>
        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" placeholder="RAM">
        </div>
        <div class="form-group">
            <label for="almacenamiento">Almacenamiento:</label>
            <input type="text" class="form-control" id="almacenamiento" name="almacenamiento"
                placeholder="Almacenamiento">
        </div>
        <div class="form-group">
            <label for="procesador">Procesador:</label>
            <input type="text" class="form-control" id="procesador" name="procesador" placeholder="Procesador">
        </div>
        <div class="form-group">
            <label for="gpu">GPU:</label>
            <input type="text" class="form-control" id="gpu" name="gpu" placeholder="GPU">
        </div>

        <!-- Observaciones de la Entrevista -->
        <div class="text-center">
            <h3>Extras</h3>
        </div>
        <div class="form-group">
            <label for="nota">Observaciones de la Entrevista:</label>
            <input type="text" class="form-control" id="nota" name="nota"
                value="{{ old('nota', $candidato->nota) }}">
        </div>



        <!-- Campo IQ -->
        <div class="form-group">
            <label for="iq">IQ:</label>
            <input type="number" class="form-control" id="iq" name="iq" placeholder="IQ">
        </div>

        <!-- Resultados de Evaluación Técnica -->
        <div class="form-group">
            <label for="evaluacionTecnica">Resultados Evaluación Técnica (%):</label>
            <input type="number" class="form-control" id="evaluacionTecnica" name="evaluacionTecnica"
                placeholder="Resultados Evaluación Técnica (%)">
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        </form>
    </div>

    <!-- Incluir Bootstrap JS (opcional, solo si necesita funcionalidad adicional) -->
    <script src="{{ asset('assets/js/expediente.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

