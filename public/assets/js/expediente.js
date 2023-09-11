function mostrarImagen() {
    var input = document.getElementById('foto');
    var preview = document.getElementById('imagen-preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.style.display = 'block';
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
