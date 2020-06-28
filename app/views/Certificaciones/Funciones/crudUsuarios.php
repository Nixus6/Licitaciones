<?php

include('certificacion/sentencias.php');

$direccion = '';
if (isset($_POST['accion']) || isset($_GET['accion'])) {

	if (isset($_POST['accion'])) {
		$direccion = $_POST['accion'];
	}elseif (isset($_GET['accion'])) {
		$direccion = $_GET['accion'];
	}
	switch ($direccion) {
		case 'Registrar' : 
		$nameUser = $_POST['nameUser'];
		$nickname = $_POST['nickname'];
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		$passHash = password_hash($contrasena, PASSWORD_BCRYPT);
		$id_rol = $_POST['id_rol'];
		agregarUsuario($nameUser,$nickname,$correo,$passHash,$id_rol);
		break;
		
		case 'Actualizar':
		$id = $_POST['id'];
		$nameUser = $_POST['nameUser'];
		$nickname = $_POST['nickname'];
		$correo = $_POST['correo'];
		$id_rol = $_POST['id_rol'];

		actualizarUsuario($nameUser,$nickname,$correo,$id_rol,$id);

		break;

		case 'Cambiar contraseña':
		$id = $_POST['id'];
		$contraseñaNueva = $_POST['contraseñaNueva'];
		$contrasena = password_hash($contraseñaNueva, PASSWORD_BCRYPT);
		cambioContrasena($id,$contrasena);
		break;
	}
}
?>