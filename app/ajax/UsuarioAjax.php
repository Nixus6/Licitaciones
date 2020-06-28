<?php
$peticionAjax = true;
// require_once "../../config.php";

switch ($_REQUEST['op']) {
    case 'ListarUsuarios';

        require_once "../controllers/UsuarioC.php";
        $Usr = new UsuarioC();
        echo $Usuarios = $Usr->listar_usuarios();

        break;

    case 'RegistrarUsuario';

        require_once "../controllers/UsuarioC.php";
        $Usr = new UsuarioC();
        if (
            isset($_POST['nombre'])
            && isset($_POST['apellido'])
            && isset($_POST['cedula'])
            && isset($_POST['email'])
            && isset($_POST['usuario'])
            && isset($_POST['clave'])
            && isset($_POST['PL'])
            && isset($_POST['PC'])
            && isset($_POST['Acceso'])
        ) {
            echo $Usuarios = $Usr->crear_usuario_acceso_c();
        }

        break;

    // default;
    //     session_start(['name' => 'SL']);
    //     session_destroy();
    //     echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
    //     break;
}
