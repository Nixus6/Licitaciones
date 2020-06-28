<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");


header('Content-Type:application/json');

$entregable = $_POST['documentos'];
$firmarl = $_POST['firmarl'];
$requisitos = $_POST['requisitos'];
$observaciones = $_POST['observaciones'];
$myse = $_POST['myse'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("INSERT INTO requejudiricos  (entregable, firmarl, requisitos, observaciones,myse) values('$entregable', '$firmarl', '$requisitos', '$observaciones','$myse')");

if ($sentencia) {
	$respuesta['mensaje'] = 'Registrado correctamente';
	$respuesta['codigo'] = '1';
	echo json_encode($respuesta);
} else {
	$respuesta['mensaje'] = 'Erro al Registrar';
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}