<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");


header('Content-Type:application/json');

$entregable = $_POST['certificadosf'];
$firmarl = $_POST['firmarlF'];
$requisitos = $_POST['requisitosF'];
$observaciones = $_POST['observacionesF'];
$myse = $_POST['myseF'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("INSERT INTO requifinancieros (entregable, firmarl, requisitos, observciones,myse) values('$entregable', '$firmarl', '$requisitos', '$observaciones','$myse')");

if ($sentencia) {
	$respuesta['mensaje'] = 'Registrado correctamente';
	$respuesta['codigo'] = '1';
	echo json_encode($respuesta);
} else {
	$respuesta['mensaje'] = 'Erro al Registrar';
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}