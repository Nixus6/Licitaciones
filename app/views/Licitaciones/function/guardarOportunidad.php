<?php

include("../../../models/clases_funciones.php");
try {

 $sentencia  = new conexion;
 header('Content-Type:application/json');
 $seguimiento = $sentencia->_conexion();

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



	$sentencia = $seguimiento->prepare("INSERT INTO oportunidades(fCreacion, nomEntidad,numContrato,Objeto,Presu,ubicacion,fPublicacion,fcierre,nombre_concepto,Consultor,ejecutivo,gerente,estado,MYSE,link,obser) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

	$resultado = $sentencia->execute([$fCreacion,$nomEntidad,$numContrato,$Objeto, $Presupuesto ,$ubicacion,$fPublicacion,$fcierre,$sector,$Consultor,$ejecutivo,$gerente,$estado,$MYSE,$link,$obser]); 
		header("location: ../../administrador/consultaOportunidad.php");
		$r=1;
		echo json_encode($r);
} catch (Exception $e) {
    echo "Hubo un error:". $e;
    	header("location: ../../administrador/consultaOportunidad.php");
}
