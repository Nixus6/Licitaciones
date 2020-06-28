<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");

try{

$documentos = $_POST['nombreFA'];
$firmarl = $_POST['firmarlFA'];
$requisitos = $_POST['requisitosFA'];
$observaciones = $_POST['observacionesFA'];
$myse = $_POST['id'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("UPDATE formanexos SET entregable = '$documentos', firmarl = '$firmarl', requisitos = '$requisitos', observaciones = '$observaciones'  where id = '$myse'");

    $array['codigo'] = 1;
    $array['mensaje'] = 'Registro editado';
} catch (Exception $ex) {
    $array['codigo'] = -1;
    $array['mensaje'] = 'registro no editado';
}
header('Content-Type:application/json');
echo json_encode($array);



