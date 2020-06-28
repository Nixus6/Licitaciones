<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

$id = $_GET["id"];
$myse = $_GET['myse'];
$idUsuario = $_SESSION['id_login'];

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->prepare("DELETE FROM seguimiento WHERE id = ?;");
$resultado = $sentencia->execute([$id]);

$borrado = $seguimiento->prepare("INSERT INTO historialborrados (nombre, id_myse) values (?,?)");
$historial = $borrado->execute([$idUsuario,$myse]);

if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";


header("Location:".$_SERVER['HTTP_REFERER']);


?>