<?php 
require("../models/Certificaciones/modeloCertificación.php");

extract($_REQUEST);

$año = $_POST['año'];
$fecha = $_POST['fecha'];
$nit = $_POST['nit'];
$entidad = $_POST['entidad'];
$contratoCliente = $_POST['contratoCliente'];
$contratoEmpresa = $_POST['contratoEmpresa'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFinal = $_POST['fechaFinal'];
$duracion = $_POST['duracion'];
$producto1 = $_POST['producto'];
$producto = implode(", ", $producto1).".";
$lugarEjecucion = $_POST['lugarEjecucion'];
$valorSmvl = $_POST['valorSmvl'];
$ejecutivo = $_POST['ejecutivo'];
$objeto = $_POST['objeto'];
$fechaEnvio = $_POST['fechaEnvio'];
$entregaEjecutivo = $_POST['entregaEjecutivo'];
$operador = $_POST['operador'];
$expedicionCertificacion = $_POST['expedicionCertificacion'];
$tipoEmpresa = $_POST['tipoEmpresa'];
$sector = $_POST['sector'];
$numeroRegistro = $_POST['numeroRegistro'];
$valorIvaInc1 = $_POST['valorIva'];
$valorIvaInc = (double)str_replace(',', '', $valorIvaInc1);
$certificado = "";
$estado = $_POST['estado'];
$idUsuario = $_SESSION['idUser'];
$alcance = $_POST['alcance'];
$fechaSuscripcion = $_POST['fechaSuscripcion'];
$codigoProducto = $_POST['codigoProducto'];

$modelo = new Certificaciones($año ,$fecha ,$nit ,$entidad ,$contratoCliente ,
$contratoEmpresa , $fechaInicio , $fechaFinal ,$duracion ,
$producto1 ,$producto ,$lugarEjecucion, $valorSmvl, $ejecutivo, $objeto , 
$fechaEnvio , $entregaEjecutivo , $operador ,, $expedicionCertificacion , $tipoEmpresa , $sector , 
$numeroRegistro , $valorIvaInc1 , $valorIvaInc , $certificado , $idUsuario, $alcance , $fechaSuscripcion, 
$codigoProducto 
);


switch ($direccion) {
	case 'Registrar':
		if ($modelo->AgregarBus()) {
		header('location:../Vistas/Buses.php#Tabla');

		}else{
		}		
		break;

	case 'Consultar':

		$resultado = $modelo->ConsultarBus($Placa);
		$datos =$resultado->fetch_array();

		if ($resultado != null) {
			header("location:../Vistas/ActualizarBus.php?placa=$datos[placa]&color=$datos[color]&marca=$datos[marca]&modelo=$datos[modelo]&TipoBus=$datos[TipoBus]&Conductor=$datos[Conductor]");
		}else{
			header('location:../Vistas/Actualizar.php');
		}

	break;
	case 'Actualizar':
		if ($modelo->ActualizarBus()) {
		header('location:../Vistas/Buses.php#Tabla');

		}else{
		}		
	break;
	case 'Eliminar':
		if ($modelo->EliminarSeguro()) {
		header('location:../Vistas/esta.php#abajo');

		}else{
		header('location:../Vistas/cliente.php');
		}		
	break;

}











 ?>