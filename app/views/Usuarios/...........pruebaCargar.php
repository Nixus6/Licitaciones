<?php
include("../../models/clases_funciones.php");


try {
	$sentencia	= new conexion;
	$seguimiento = $sentencia->_conexion();

	$idR = $_POST['id'];
	$documento =  $_POST['documento'];
	$nombre = $_POST['nombre'];
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	// if ($Tprivilegio_perfil === 'Govermment' || $Tprivilegio_perfil === 'ConsultorVP' || $Tprivilegio_perfil === 'Corporativo' || $Tprivilegio_perfil === 'Pymes' || $Tprivilegio_perfil === 'Whosale') {

	$sentencia = $seguimiento->query("UPDATE login set cedula = '$documento', nombre = '$nombre' , usuario = '$usuario',correo='$correo' where id='$idR'");
	// $sentencia2 = $seguimiento->query("DELETE FROM sptli WHERE  nombre_sp = '$nombre'");

	// }else{
	// 	$sentencia =$seguimiento->query("UPDATE login set Tprivilegio = '$Tprivilegio_perfil', estado = $estado	 where login.id='$id_login'");

	// 	if (!isset($_POST['split'])){
	// 		$split = 0;
	// 		$sentencia =$seguimiento->query("UPDATE sptli set valido_id = '$split' where nombre_sp='$nombre'");
	// 	}else{
	// 		$split = 1;
	// 		$sentencia =$seguimiento->query("UPDATE sptli set valido_id = '$split' where nombre_sp='$nombre'");
	// 	}


	// }
	$respuesta['codigo'] = '1';
	echo json_encode($respuesta);

} catch (PDOException $ex) {
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}
header('Content-Type:application/json; charset=utf-8');
