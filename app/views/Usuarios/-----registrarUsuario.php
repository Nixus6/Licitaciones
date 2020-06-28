<?php
include("../../models/clases_funciones.php");
try {
	$pdo = new conexion;
	header('Content-Type:application/json');

	$nombre			=   $_POST['nombre'];
	$usuario		=   strtoupper($_POST['usuario']);
	$clave			=   $_POST['clave'];
	$cedula			=   $_POST['cedula'];
	$correo			=	$_POST['correo'];
	$passHash		= 	password_hash($clave, PASSWORD_BCRYPT);
	$Acceso =  $_POST['Acceso'];
	$privilegioLicita = $_POST['Tprivilegio_perfil'];
	$privilegioCerti = $_POST['PrivilegioC'];
	$datosG			=	array(

		$usuario,
		$nombre,
		$passHash,
		$cedula,
		$correo,
		$privilegioLicita,
		$privilegioCerti,
		$Acceso,
		'0',
		'1'
	);
	$execute  =	$pdo->insertarRegistros('login', $datosG);
	$execute  = $pdo->insertar('sptli', $nombre, '1');
	$respuesta = 1;
} catch (PDOException $e) {
	$respuesta = 0;
}
echo json_encode($respuesta);
