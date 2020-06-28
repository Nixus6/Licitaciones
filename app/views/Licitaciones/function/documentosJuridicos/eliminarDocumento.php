<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");


$myse = $_GET['id'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("DELETE FROM requejudiricos where id = '$myse'");

header("Location:".$_SERVER['HTTP_REFERER']);



