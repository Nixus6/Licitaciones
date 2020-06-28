<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");

$myse = $_POST['id'];
$firmarl = $_POST['firmarl'];
$requisitos = $_POST['requisitos'];
$observaciones = $_POST['observaciones'];
$entregable = $_POST['documentos'];
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("UPDATE requejudiricos SET entregable = '$entregable', firmarl = '$firmarl', requisitos = '$requisitos', observaciones = '$observaciones'  where id = '$myse'");

header("Location:".$_SERVER['HTTP_REFERER']);
