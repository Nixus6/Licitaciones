<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");


header('Content-Type:application/json');

$entregable = $_POST['certificadosCT'];
$firmarl = $_POST['firmarlCT'];
$requisitos = $_POST['requisitosCT'];
$observaciones = $_POST['observacionesCT'];
$myse = $_POST['myseCT'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("INSERT INTO requecaractecni(entregable, firmarl, requisitos, observaciones,myse) values('$entregable', '$firmarl', '$requisitos', '$observaciones','$myse')");

if ($sentencia) {
	$respuesta['mensaje'] = 'Registrado correctamente';
	$respuesta['codigo'] = '1';
	echo json_encode($respuesta);
} else {
	$respuesta['mensaje'] = 'Erro al Registrar';
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}