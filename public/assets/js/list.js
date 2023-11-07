document.addEventListener("DOMContentLoaded", function () {
    const tabla = document.getElementById("miTabla");
    const filas = tabla.getElementsByTagName("tr");
    const inputBusqueda = document.querySelector(".form-control");

    inputBusqueda.addEventListener("keyup", function () {
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
document.getElementById('btnFiltrar').addEventListener('click', function () {
    // Obtén los valores del formulario
    var vacante = document.getElementById('filtroVacante').value;
    var estadoCivil = document.getElementById('estadoCivil').value;
    console.log(vacante);
// Finalmente, envía el formulario
    document.getElementById('miFormulario').submit();
// Vuelve a pintar los filtros (esto es solo un ejemplo, debes adaptarlo a tus necesidades)
    document.getElementById('filtroVacante').value = vacante;
    document.getElementById('estadoCivil').value = estadoCivil;
    console.log(vacante);
});

