<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");


header('Content-Type:application/json');

$entregable = $_POST['nombreFA'];
$firmarl = $_POST['firmarlFA'];
$requisitos = $_POST['requisitosFA'];
$observaciones = $_POST['observacionesFA'];
$myse = $_POST['myseFA'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("INSERT INTO formanexos(entregable, firmarl, requisitos, observaciones,myse) values('$entregable', '$firmarl', '$requisitos', '$observaciones','$myse')");

if ($sentencia) {
	$respuesta['mensaje'] = 'Registrado correctamente';
	$respuesta['codigo'] = '1';
	echo json_encode($respuesta);
} else {
	$respuesta['mensaje'] = 'Erro al Registrar';
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}