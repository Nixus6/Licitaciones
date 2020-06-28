<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
  header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

 $sentencia  = new conexion;
 
 $seguimiento = $sentencia->_conexion();
 	$id = $_POST['id'];
 	$fCreacion = $_POST["fCreacion"];
 	$nomEntidad = $_POST["nomEntidad"];
 	$numContrato = $_POST["numContrato"];
 	$Objeto = $_POST["Objeto"];
 	$Presupuesto = $_POST["Presu"];
 	$ubicacion = $_POST["ubicacion"]; 
 	$fPublicacion = $_POST["fPublicacion"];
 	$fcierre = $_POST["fcierre"];
 	$sector = $_POST["nombre_concepto"]; 
 	$Consultor = $_POST["Consultor"]; 
 	$ejecutivo = $_POST["ejecutivo"];
 	$gerente = $_POST["gerente"];
 	$estado = $_POST["estado"];
 	$MYSE = $_POST["MYSE"];
 	$link = $_POST["link"];
 	$obser = $_POST["obser"];


try {
	$sentencia = $seguimiento->prepare("UPDATE oportunidades SET fCreacion = ? , nomEntidad = ? ,numContrato = ? ,Objeto = ? ,Presu = ? ,ubicacion = ? ,fPublicacion = ? ,fcierre = ? ,nombre_concepto = ? ,Consultor = ? ,ejecutivo = ? ,gerente = ? ,estado = ? ,MYSE = ? ,link = ? ,obser = ? WHERE id = ?");

	$resultado = $sentencia->execute([$fCreacion,$nomEntidad,$numContrato,$Objeto, $Presupuesto ,$ubicacion,$fPublicacion,$fcierre,$sector,$Consultor,$ejecutivo,$gerente,$estado,$MYSE,$link,$obser,$id]); 
	    header("location: ../../administrador/consultaOportunidad.php");
} catch (Exception $e) {
    echo "Hubo un error:". $e;
}




?>