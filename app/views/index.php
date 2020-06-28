<!------ Include the above in your HEAD tag ---------->
<?php //session_start() ?>
<?php
// $sw1                 =   '0';
// $ingreso            =   '0';

// if (isset($_POST['iniciar'])) {

//     //include("../models/clases_funciones.php");
//     include("app/models/clases_funciones.php");

//     $usuario1        =   strtoupper($_POST['usuario']);
//     $clave1          =   $_POST['clave'];
//     $pdo            =   new conexion;
//     $execute1        =   $pdo->_conexion();
//     $query1          =   $execute1->query("CALL traerLogin('$usuario1')");

//     foreach ($query1 as $key) {
//         $login          = $key['usuario'];
//         $nombre         = strtolower($key['nombre']);
//         $hashclave1      = $key['clave_1'];
//         $rollicita            = $key['Tprivilegio'];
//         $rolcerti = $key['PrivilegioCert'];
//         $acceso = $key['Acceso'];
//         $correo      = $key['correo'];

//         $_SESSION['id']   = $key['id'];
//         $_SESSION['acceso'] =  $acceso;
//         $_SESSION['nombre'] = $nombre;
//         $_SESSION['rolcerti'] = $rolcerti;
//         $_SESSION['rollicita'] = $rollicita;
//         $_SESSION['cedula'] = $key['cedula'];
//         $_SESSION['correo'] = $key['correo'];
//         $_SESSION['usuario'] = $key['usuario'];
//         $_SESSION['usuNuevo'] = $key['nvClave'];
//     }
//     if (isset($hashclave1)) {
//         if (password_verify($clave1, $hashclave1)) {
//             header('location: principal/');
//         } else {
//             $sw1 =   '1';
//         }
//     } else {
//         $sw1 =   '1';
//     }
// }


if (isset($_POST['usuario']) && isset($_POST['clave'])){

    require_once "app/controllers/LoginC.php";
    $login = new LoginC();
    echo $login->Iniciar_Sesion_C();

}
?>

<html lang="en">

<?php include FOLDER_TEMPLATE . "index/head.php"; ?>
<title>Grupo Licitaciones</title>

<body>

    <div class="overlay"></div>

    <div class="login-box">
        <img id="divImg" class="imgArea" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area">
        <hr>
        <h2 id="cambio">Licitaciones</h2>
        <hr>
        <br>
        <form method="post" autocomplete="off">
            <!-- Aqui la de usuario-->
            <div class="form-group" id="div-User">
                <label for="username"></label>
                <input id="input-user" name="usuario" type="text" class="form-control" placeholder="Usuario" required>
                <i id="i-user"><img id="logo-user" src="<?= URL_IMG ?>icon159.png"></i>
            </div>
            <br>

            <!-- Aqui la de la Clave-->
            <div class="form-group2" id="div-User">

                <input id="input-pass" name="clave" type="password" class="form-control" placeholder="Contraseña" required />
                <i id="i-pass"><img id="logo-pass" src="<?= URL_IMG ?>icon187.png"></i>
                <a onclick="mostrarContrasena();"><span id="showandhide" class="far fa-eye-slash" action="ocultar"></span></a>

            </div>
                    <strong style="color:red">Contraseña incorrecta.</strong> <a style="color:white">Vuelve a intentarlo o haz clic en Contraseña olvidada para recuperarla.</a>
            <br>

            <center>
                <input name="iniciar" id="iniciar" type="submit" class="btn btn-outline-primary" value="Iniciar / Ingresar" />
                <a href="recuperarContrasena.php" class="s" value="Login"> Olvido su contraseña? </a>
            </center>

            <!-- <?php //if ($sw1 == '1') { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> No ingresaste el usuario/Contraseña Correcta.
                </div>
            <?php //} //elseif ($sw1 == '2') { ?>
                <strong>Error!</strong> Su cuenta esta inactiva.
            <?php //} ?> -->


        </form>

    </div>

    <div class="contenedor"><img id="divImg3" src="<?= URL_IMG ?>LogoLetrasBlancas.png"></div>
</body>

<script>
    function mostrarContrasena() {
        var tipo = document.getElementById("input-pass");
        var option = $('#showandhide').attr('action');
        if (tipo.type == "password") {
            tipo.type = "text";
            if (option == 'ocultar') {
                $('#showandhide').removeClass('far fa-eye-slash').addClass('far fa-eye').attr('action', 'mostrar');
            }
        } else {
            tipo.type = "password";
            if (option == 'mostrar') {
                $('#showandhide').removeClass('far fa-eye').addClass('far fa-eye-slash').attr('action', 'ocultar');
            }
        }
    }

    //  $(document).ready(function() {

    //     $('#showandhide').click(function() {

    //      var option = $('#showandhide').attr(action);

    //      if (option == 'ocultar') {
    //          $('#input-pass').attr('type', 'text');
    //$(this).removeClass('far fa-eye-slash').addClass('far fa-eye').attr('action', 'mostrar');
    //     }
    //      if (option == 'mostrar') {
    //         $('#input-pass').attr('type', 'password');
    //$(this).removeClass('far fa-eye').addClass('far fa-eye-slash').attr('action', 'ocultar');
    //     }
    //    });
    //});

</script>



<?php include FOLDER_TEMPLATE . "index/scripts.php"; ?>

</html>