function validarContrasena() {
    var p1 = document.getElementById("contraseñaNueva").value;
    var p2 = document.getElementById("confirmarContraseña").value;
    if (p1 != p2) {
        $('#alerta').html("Las contraseñas deben coincidir");
        return false;
    } else { }
    var espacios = false;
    var cont = 0;

    while (!espacios && (cont < p1.length)) {
        if (p1.charAt(cont) == " ")
            espacios = true;
        cont++;
    }

    if (espacios) {
        $('#alerta').html("La contraseña no puede contener espacios en blanco");
        return false;
    }
    if (p1.length == 0 || p2.length == 0) {
        $('#alerta').html("Los campos de la contraseña no pueden quedar vacios");
        if (p2.length == 0) {
            $('#confirmarContraseña').focus();
        }
        if (p1.length == 0) {
            $('#contraseñaNueva').focus();
        }
        return false;
    }
    if (p1.length < 9) {
        $('#alerta').html("La contraseña debe ser minimo de 9 digitos");
        return false;
    }


}
