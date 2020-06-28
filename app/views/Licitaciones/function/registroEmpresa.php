<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();

$empgana = $_POST['empganaz'];


try {
	$sentenciax = $seguimiento->prepare("INSERT INTO empresag (empgana) VALUES (?);");
	$resultadom = $sentenciax->execute([$empgana]);	
	echo "Registro";
} catch (Exception $e) {
	echo $e;
}


?>

