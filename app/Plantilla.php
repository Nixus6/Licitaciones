<?php
include "config.php"; 
$peticionAjax=false;

require_once "app/controllers/VistasC.php";
$vt = new VistasC();
$vistasR = $vt->obtener_vistas_c();

if ($vistasR == "login" || $vistasR == "404") {
    if ($vistasR == "login") {

        require_once "app/views/index.php";
    } else {

        require_once "app/views/Error404.php";
    }
} elseif ($vistasR[0]['seccion'] == "Principal" or $vistasR[0]['seccion'] == "Usuarios") {

    session_start(['name' => 'SL']);
    require_once "app/controllers/LoginC.php";
    $lc = new LoginC();
    require_once "app/functions/mainFunction.php";
    $functions = new mainFunction();
    if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
        $lc->Forzar_Cierre_Sesion_C();
    }

?>
    <!DOCTYPE html>

    <html lang="en">

    <?php include FOLDER_TEMPLATE . "head.php"; ?>

    <body>

        <div class="wrapper ">

            <div class="main-panel" style="width: 100%">
                <?php include FOLDER_TEMPLATE . "topPrincipal.php"; ?>

                <?php require_once $vistasR[0]['url']; ?>

                <?php include FOLDER_TEMPLATE . "footer.php"; ?>

            </div>
        </div>

        <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

            <?php if ($vistasR[0]['seccion'] == "Principal") { ?>

                <?php require_once "scripts/" . "/" . $vistasR[0]['UbicacionAjax'] . "Scripts.php"; ?>

            <?php } else { ?>

                <?php require_once "scripts/" . $vistasR[0]['seccion'] . "/" . $vistasR[0]['UbicacionAjax'] . "Scripts.php"; ?>

            <?php } 
            require_once "scripts/logoutScript.php";
            ?>

    </body>

    </html>

<?php } elseif ($vistasR[0]['seccion'] == "Licitaciones") {

    session_start(['name' => 'SL']);
    require_once "controllers/LoginC.php";
    $lc = new LoginC();
    if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
        $lc->Forzar_Cierre_Sesion_C();
    }

?>

    <!DOCTYPE html>
    <html lang="es">


    <?php include FOLDER_TEMPLATE . "head.php"; ?>

    <body class="">



        <div class="wrapper">


            <?php include FOLDER_TEMPLATE . "licitaciones/menu.php"; ?>

            <div class="main-panel" id="main-panel">

                <?php include FOLDER_TEMPLATE . "licitaciones/top.php"; ?>

                <!-- Contenido -->
                <?php require_once $vistasR[0]['url']; ?>

                <?php include FOLDER_TEMPLATE . "footer.php"; ?>
            </div>

        </div>

        <?php include FOLDER_TEMPLATE . "licitaciones/scripts.php"; ?>

            <?php require_once "scripts/" . $vistasR[0]['seccion'] . "/" . $vistasR[0]['UbicacionAjax'] . "Scripts.php"; ?>

    </body>

    </html>

<?php } elseif ($vistasR[0]['seccion'] == "Certificaciones") {

    session_start(['name' => 'SL']);
    require_once "controllers/LoginC.php";
    $lc = new LoginC();
    if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
        $lc->Forzar_Cierre_Sesion_C();
    }

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>

        <?php include FOLDER_TEMPLATE . "head.php"; ?>

    </head>

    <body class="">

        <div class="wrapper ">

            <?php include FOLDER_TEMPLATE . "menu.php"; ?>

            <div class="main-panel">

                <?php include FOLDER_TEMPLATE . "top.php"; ?>


                <!-- Contenido -->
                <?php require_once $vistasR[0]['url']; ?>


                <?php include FOLDER_TEMPLATE . "footer.php"; ?>

            </div>
        </div>

        <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

        <?php if (is_file("ajax/") . $vistasR[0]['seccion'] . "/" . $vistasR[0]['UbicacionAjax'] . "Ajax.js") { ?>
            <script>
                <?php require_once "ajax/" . $vistasR[0]['seccion'] . "/" . $vistasR[0]['UbicacionAjax'] . "Ajax.js"; ?>
            </script>
        <?php } else { ?>
            <script>
                console.log("No se encontro el Script Certificaciones");
            </script>
        <?php } ?>

    </body>

    </html>


<?php } ?>