document.addEventListener("DOMContentLoaded", function() {
    const tabla = document.getElementById("miTabla");
    const filas = tabla.getElementsByTagName("tr");
    const inputBusqueda = document.querySelector(".form-control");

    inputBusqueda.addEventListener("keyup", function() {
        const textoBusqueda = inputBusqueda.value.toLowerCase();

        for (let i = 1; i < filas.length; i++) {
            const fila = filas[i];
            const celdas = fila.getElementsByTagName("td");
            let coincide = false;

            for (let j = 0; j < celdas.length; j++) {
                const celda = celdas[j];
                if (celda.textContent.toLowerCase().includes(textoBusqueda)) {
                    coincide = true;
                    break;
                }
            }

            if (coincide) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        }
    });
});


    $(document).ready(function () {
        $("#btnFiltrar").click(function () {
            var filtroVacante = $("#filtroVacante").val().toLowerCase();
            var filtroFechaRegistro = $("#filtroFechaRegistro").val();
            var filtroFechaEnvioEvaluacion = $("#filtroFechaEnvioEvaluacion").val();
            var filtroSexo = $("#filtroSexo").val();
            var filtroIQ = $("#filtroIQ").val();
            var filtroEstatus = $("#filtroEstatus").val().toLowerCase();
            var filtroConocimientos = $("#filtroConocimientos").val().toLowerCase();

            $("#miTabla tbody tr").filter(function () {
                var nombre = $(this).find("td:nth-child(2)").text().toLowerCase();
                var vacante = $(this).find("td:nth-child(7)").text().toLowerCase();
                var fechaRegistro = $(this).find("td:nth-child(8)").text();
                var fechaEnvioEvaluacion = $(this).find("td:nth-child(10)").text();
                var sexo = $(this).find("td:nth-child(11)").text().toLowerCase();
                var iq = parseFloat($(this).find("td:nth-child(12)").text());
                var estatus = $(this).find("td:nth-child(6)").text().toLowerCase();
                var conocimientos = $(this).find("td:nth-child(13)").text().toLowerCase();

                var cumpleFiltros = true;

                if (filtroVacante !== "" && vacante.indexOf(filtroVacante) === -1) {
                    cumpleFiltros = false;
                }

                if (filtroFechaRegistro !== "" && fechaRegistro !== filtroFechaRegistro) {
                    cumpleFiltros = false;
                }

                if (filtroFechaEnvioEvaluacion !== "" && fechaEnvioEvaluacion !== filtroFechaEnvioEvaluacion) {
                    cumpleFiltros = false;
                }

                if (filtroSexo !== "" && sexo !== filtroSexo) {
                    cumpleFiltros = false;
                }

                if (!isNaN(filtroIQ) && (iq < filtroIQ)) {
                    cumpleFiltros = false;
                }

                if (filtroEstatus !== "" && estatus.indexOf(filtroEstatus) === -1) {
                    cumpleFiltros = false;
                }

                if (filtroConocimientos !== "" && conocimientos.indexOf(filtroConocimientos) === -1) {
                    cumpleFiltros = false;
                }

                return cumpleFiltros;
            }).show();

            $("#miTabla tbody tr").filter(function () {
                return !$(this).is(":visible");
            }).hide();
        });
    });

