<?php
$peticionAjax = true;
require_once "../../config.php"; 
if (isset($_GET['token'])) {
    // $token = $_GET['token'];
    require_once "../controllers/LoginC.php";
    $logout = new LoginC();
    echo $logout->Cerrar_Sesion_C();
} 
// else {
//     session_start(['name' => 'SL']);
//     session_destroy();
//     echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
// }
