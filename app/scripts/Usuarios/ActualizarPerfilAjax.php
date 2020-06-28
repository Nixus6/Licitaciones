<script>
function actualizar_datos() {

    // var parametros = new FormData($('formularioAU')[0]);
    // const postData = {
    var $id = $('#idUser').val();
    var $documento = $('#cedula').val();
    var $nombre = $('#nombre').val();
    var $usuario = $('#usuario').val();
    var $correo = $('#correo').val();
    // };


    $.ajax({
        type: 'POST',
        url: "<?php echo SERVERURL; ?>app/views/Usuarios/...........pruebaCargar.php",
        data: {
            'id': $id,
            'documento': $documento,
            'nombre': $nombre,
            'usuario': $usuario,
            'correo': $correo,
        },
        dataType: 'json',
        success: function () {

            alert("Datos Actualizados");
            // console.log(response.codigo);
            location.href = "<?php echo SERVERURL; ?>MiPerfil/";
        }
    })
}

$(document).ready(function () {
    $('#file').hover(function () {
        $('.picture').css('border', '4px solid rgba(0, 123, 255)');
    }, function () {
        $('.picture').css('border', '4px solid #ccc');
    });

    document.getElementById("file").onchange = function (e) {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function () {
            let image = document.getElementById('ImgPrin');

            image.src = reader.result;

        };
    }
});

// funcion Cargar Imagen con Jquery Vanilla
// (function() {
//     'use strict'

//     var file = document.getElementById('file');
//     file.addEventListener('change', function() {
//         for (var i = 0; i < file.files.length; i++) {
//             var thumbnail_id = Math.floor(Math.random() * 30000) + '_' + Date.now();
//             createThumnail(file, i, thumbnail_id);
//         }
//     });
//     var createThumnail = function(file, iterator, thumbnail_id) {
//         var thumbnail = document.getElementById('');
//         thumbnail.classList.add('thumbnail', thumbnail_id);
//         thumbnail.dataset.id = thumbnail_id;

//         thumbnail.setAttribute('style','background-image: url(${URL.createObjectURL}')
//     }
// })();

function atras() {
    window.history.back();
}
</script>