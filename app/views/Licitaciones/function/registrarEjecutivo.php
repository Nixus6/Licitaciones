<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {
	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");
$pdo = new conexion;
if (isset($_POST['iniciar'])) {

	$nombre			=   $_POST['nombre'];
	$consultor		=   $_POST['consultor'];
	$sector			=   $_POST['id_sector'];
	$regional		=   $_POST['id_regional'];
	$datosG			=	array(

		$nombre,
		$consultor,
		$sector,
		$regional,

	);

	$execute		=	$pdo->insertarRegistros('ejecutivos', $datosG);
	$execute  = $pdo->insertar('sptli', $nombre, '1');
	header("Location: ../../administrador/ejecutivos.php");
}
