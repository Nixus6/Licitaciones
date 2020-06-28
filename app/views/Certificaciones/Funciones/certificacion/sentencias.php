<?php
class conexionCert{

	public static function conectar() {
		try {
			$cnn = new PDO('mysql:=localhost;dbname=certificaciones','root', '');
			$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $cnn;
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}

function agregarCertificado($idUsuario, $ano, $fecha, $nit, $entidad, $contratoCliente, $contratoEmpresa, $fechaInicio, $fechaFinal, $duracion, $producto, $lugarEjecucion, $valorSmvl, $ejecutivo, $objeto, $fechaEnvio, $entregaEjecutivo, $operador, $expedicionCertificacion, $tipoEmpresa, $sector, $numeroRegistro, $certificado, $valorIvaInc, $estado, $alcance, $fechaSuscripcion, $codigoProducto)
{

	$conexion  = new conexion;
	$execute = $conexion->conectar();
	try {
		$sql = $execute->query("INSERT INTO `certificados`(`usuCreador`,`ano`, `fecha`, `nitEntidad`, `entidad`, `contratoCliente`, `contratoEmpresa`, `fechaInicio`, `fechaFinal`, `duracion`, `producto`, `lugarEjecucion`, `valorSmlv`, `ejecutivo`, `objeto`, `alcance`, `fechaEnvio`, `entregaEjecutivo`, `operador`, `expedicionCertificacion`, `tipoEmpresa`, `sector`, `numeroRegistroRut`, `certificado`, `valorIvaInc`, `estado`, `fechaSuscripcion`, `codigoProducto`)

			VALUES ($idUsuario,'$ano','$fecha','$nit','$entidad','$contratoCliente','$contratoEmpresa','$fechaInicio','$fechaFinal','$duracion','$producto','$lugarEjecucion',$valorSmvl,'$ejecutivo','$objeto','$alcance','$fechaEnvio','$entregaEjecutivo','$operador','$expedicionCertificacion','$tipoEmpresa',$sector,'$numeroRegistro','$certificado',$valorIvaInc,'$estado', '$fechaSuscripcion','$codigoProducto')");
		header("Location: ../menuPrincipal.php");
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
}
function editarCertificado($id, $ano, $fecha, $nit, $entidad, $contratoCliente, $contratoEmpresa, $fechaInicio, $fechaFinal, $duracion, $producto, $lugarEjecucion, $valorSmvl, $ejecutivo, $objeto, $fechaEnvio, $entregaEjecutivo, $operador, $expedicionCertificacion, $tipoEmpresa, $sector, $numeroRegistro, $certificado, $valorIvaInc, $estado, $alcance, $fechaSuscripcion, $codigoProducto)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();
	try {
		$sql = $execute->query("UPDATE `certificados` SET `ano`='$ano',`fecha`='$fecha',`nitEntidad`='$nit',`entidad`='$entidad',`contratoCliente`='$contratoCliente',`contratoEmpresa`='$contratoEmpresa',`fechaInicio`='$fechaInicio',`fechaFinal`='$fechaFinal',`duracion`= '$duracion' ,`producto`= '$producto',`lugarEjecucion`= '$lugarEjecucion',`valorSmlv`= $valorSmvl,`ejecutivo`= '$ejecutivo' ,`objeto`= '$objeto' ,`alcance`= '$alcance', `fechaEnvio`= '$fechaEnvio',`entregaEjecutivo`= '$entregaEjecutivo' ,`operador`= '$operador',`expedicionCertificacion`= '$expedicionCertificacion',`tipoEmpresa`= '$tipoEmpresa' ,`sector`= $sector ,`numeroRegistroRut`= '$numeroRegistro',`certificado`='$certificado', `valorIvaInc` = $valorIvaInc, `estado` = '$estado', `fechaSuscripcion` = '$fechaSuscripcion',`codigoProducto` = '$codigoProducto'  WHERE id_certificados = $id");
		header("Location: ../menuPrincipal.php");
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
}
function borrarCertificado($id)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();
	try {
		$sql = $execute->query("DELETE FROM `certificados` WHERE id_certificados = $id");
		header("Location: ../menuPrincipal.php?estado=1");
	} catch (Exception $e) {
		header("Location: ../menuPrincipal.php?estado=2");
	}
}

function consultaTabla($filtro, $tabla, $columna)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();

	$sql = "SELECT * FROM $tabla WHERE $columna LIKE '%$filtro%' ORDER BY $columna LIMIT 10";

	$sentencia = $execute->prepare($sql);
	$sentencia->execute();
	$array = $sentencia->fetchAll();
	return $array;
}

function consultarSalario($ano)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();

	$sql = "SELECT * FROM salariosanos WHERE ano = '$ano'";
	$sentencia = $execute->prepare($sql);
	$sentencia->execute();
	$array = $sentencia->fetchAll();
	return $array;
}

function agregarUsuario($nameUser, $nickname, $correo, $passHash, $id_rol)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();

	try {
		$sql = $execute->query("INSERT INTO `usuarios`(`nickname`, `correo`, `contrasena`, `id_rol`, `nameUser`) VALUES ('$nickname','$correo','$passHash','$id_rol','$nameUser') ");
		header("Location: ../consultaUsuarios.php");
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
}
function actualizarUsuario($nameUser, $nickname, $correo, $id_rol, $id)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();

	try {
		$sql = $execute->query("UPDATE usuarios SET  nickname='$nickname', correo='$correo', id_rol=$id_rol, nameUser='$nameUser' WHERE id_usuario= $id");
		header("Location: ../consultaUsuarios.php?id=" . $id);
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
}
function cambioContrasena($id, $contrasena)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();

	try {
		$sql = $execute->query("UPDATE usuarios SET contrasena = '$contrasena' WHERE id_usuario= $id");
		header("Location: ../cambioContrasena.php?cambio=true");
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
}

function agregarPeticion($nomUsuario, $proveedor, $productos, $observacion, $idPdf,$estado, $fecRegistro, $fecPendiente, $fecCierre)
{
	$conexion = new conexion;
	$execute = $conexion->conectar();
	try {

		$sql = $execute->query("INSERT INTO peticion (`nomUsuario`,`proveedor`,`productos`,`observacion`,`idPdf`,`estado`,`fecRegistro`,`fecPendiente`,`fecCierre`) 
		VALUES ('$nomUsuario','$proveedor','$productos','$observacion','$idPdf','$estado','$fecRegistro','$fecPendiente','$fecCierre')");
		header("Location: ../menuPrincipal.php");
	} catch (Exception $e) {
		echo "Error:" . $e;
	}
	

}



function actualizarPeticion($idPeticion,$nomUsuario, $proveedor, $productos, $observacion, $idPdf,$estado, $fecRegistro, $fecPendiente, $fecCierre)
	{
		$conexion = new conexion;
		$execute = $conexion->conectar();
		try { 
			$sql = $execute->query("UPDATE peticion set  nomUsuario = '$nomUsuario',proveedor = '$proveedor', productos = '$productos',observacion = '$observacion', idPdf = '$idPdf',estado = '$estado',fecRegistro = '$fecRegistro', fecPendiente = '$fecPendiente',fecCierre = '$fecCierre' WHERE idPeticion = '$idPeticion' ");
			header("Location: ../menuPrincipal.php");
		} catch (Exception $e) { }
	}

	function borrarPeticion($idPeticion)
{
	$conexion  = new conexion;
	$execute = $conexion->conectar();
	try {
		$sql = $execute->query("DELETE FROM `peticion` WHERE idPeticion = $idPeticion");
		header("Location: ../menuPrincipal.php?estado=1");
	} catch (Exception $e) {
		header("Location: ../menuPrincipal.php?estado=2");
	}
}

