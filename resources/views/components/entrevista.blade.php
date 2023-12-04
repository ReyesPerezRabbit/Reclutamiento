<h1>entrevista</h1>

<!-- Botón para listar archivos en AWS S3 -->
<form action="{{ route('ruta.listarArchivosS3') }}" method="POST">
    @csrf
    <button type="submit">Listar Archivos en AWS S3</button>
</form>

