<h1>entrevista</h1>

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
