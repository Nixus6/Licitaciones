<?php

session_start();
if (isset($_SESSION['id_login'])){ 
}else{

	header('location: ../../iniciarSesion.php');
}

$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();

$Tprivilegio_perfil =  $_POST ['Tprivilegio_perfil'];
$estado = $_POST['estado'];
$id_login= $_POST['id_usuario'];
$nombre = $_POST['nombreUsuario'];


if ($Tprivilegio_perfil === 'Govermment' || $Tprivilegio_perfil === 'ConsultorVP' || $Tprivilegio_perfil === 'Corporativo' || $Tprivilegio_perfil === 'Pymes' || $Tprivilegio_perfil === 'Whosale') {

	$sentencia =$seguimiento->query("UPDATE login set Tprivilegio = '$Tprivilegio_perfil', estado = $estado	 where login.id='$id_login'");
	$sentencia2 = $seguimiento->query("DELETE FROM sptli WHERE  nombre_sp = '$nombre'");
	
}else{
	$sentencia =$seguimiento->query("UPDATE login set Tprivilegio = '$Tprivilegio_perfil', estado = $estado	 where login.id='$id_login'");

	if (!isset($_POST['split'])){
		$split = 0;
		$sentencia =$seguimiento->query("UPDATE sptli set valido_id = '$split' where nombre_sp='$nombre'");
	}else{
		$split = 1;
		$sentencia =$seguimiento->query("UPDATE sptli set valido_id = '$split' where nombre_sp='$nombre'");
	}


}


header("location: ../../administrador/usuarios.php");

?>