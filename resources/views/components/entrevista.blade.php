<h1>entrevista</h1>

<form action="{{ route('subir.archivo.s3') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="texto">Texto:</label>
    <input type="text" name="texto" id="texto">
    <br>
    <label for="file">Selecciona un archivo PDF:</label>
    <input type="file" name="file" id="file">
    <br>
    <button type="submit">Subir PDF</button>
</form>



<!-- Botón para listar archivos en AWS S3 -->
<form action="{{ route('ruta.listarArchivosS3') }}" method="POST">
    @csrf
    <button type="submit">Listar Archivos en AWS S3</button>
</form>


{{-- <!DOCTYPE html>
<html>
<head>
    <title>Datos en AWS S3</title>
</head>
<body>
    <h1>Datos en AWS S3</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre del Archivo</th>
                <th>Otra Información</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($archivos as $archivo)
                <tr>
                    <td>{{ $archivo['nombre'] }}</td>
                    <td>{{ $archivo['otra_informacion'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}










{{-- <div>
    <div class="text-center">
        <button type="button" class="btn btn-primary mt-4" id="mostrarDatosJSON">Mostrar Datos JSON</button>
    </div>
    <div id="datosJSON" style="display: none;">
        <!-- Aquí se mostrarán los datos JSON -->
    </div>

    <script>
        document.getElementById('mostrarDatosJSON').addEventListener('click', function () {
            fetch('{{ route('ruta.listarArchivosS3') }}')
                .then(response => response.json())
                .then(data => {
                    const datosJSON = JSON.stringify(data, null, 2); // Formatear JSON para mejor legibilidad
                    document.getElementById('datosJSON').innerHTML = '<pre>' + datosJSON + '</pre>';
                    document.getElementById('datosJSON').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error al cargar los datos JSON:', error);
                });
        });
    </script>
</div> --}}
