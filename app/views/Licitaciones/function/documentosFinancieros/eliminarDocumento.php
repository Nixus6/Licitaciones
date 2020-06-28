<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");
try{
header('Content-Type:application/json');
	
$myse = $_POST['id'];
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("DELETE FROM requifinancieros where id = '$myse'");

    $array['codigo'] = 1;
    $array['mensaje'] = 'Registro eliminado';
} catch (Exception $ex) {
    $array['codigo'] = -1;
    $array['mensaje'] = 'Error al eliminar';
}

echo json_encode($array);



