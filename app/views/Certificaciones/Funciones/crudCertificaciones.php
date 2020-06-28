<?php 
session_start();
include('certificacion/sentencias.php');

$direccion = '';
if (isset($_POST['accion']) || isset($_GET['accion'])) {

	if (isset($_POST['accion'])) {
		$direccion = $_POST['accion'];
	}elseif (isset($_GET['accion'])) {
		$direccion = $_GET['accion'];
	}
	switch ($direccion) {
		case 'Registrar' : 
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
		agregarCertificado($idUsuario,$año,$fecha,$nit,$entidad,$contratoCliente,$contratoEmpresa,$fechaInicio,$fechaFinal,$duracion,$producto,$lugarEjecucion,$valorSmvl,$ejecutivo,$objeto,$fechaEnvio,$entregaEjecutivo,$operador,$expedicionCertificacion,$tipoEmpresa,$sector,$numeroRegistro,$certificado,$valorIvaInc,$estado,$alcance,$fechaSuscripcion,$codigoProducto);
		break;
		case 'Guardar' : 
		$id = $_POST['id'];
		$año = $_POST['año'];
		$fecha = $_POST['fecha'];
		$nit = $_POST['nit'];
		$entidad = $_POST['entidad'];
		$contratoCliente = $_POST['contratoCliente'];
		$contratoEmpresa = $_POST['contratoEmpresa'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaFinal = $_POST['fechaFinal'];
		$duracion = $_POST['duracion'];
		if (!isset($_POST['producto'])) {
			$producto = $_POST['producto1'];
		}else{
			$producto1 = $_POST['producto'];
			$producto = implode(", ", $producto1).".";
		}
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
		$alcance = $_POST['alcance'];
		$fechaSuscripcion = $_POST['fechaSuscripcion'];
		$codigoProducto = $_POST['codigoProducto'];
		$valorIvaInc = (double)str_replace(',', '', $valorIvaInc1);
		$validacion = $_POST['archivo'];
		$estado = $_POST['estado'];
		$exists = is_file('../'.$validacion);
		if ($exists === true) {
			if ($_FILES['certificado']['size']>0) {
				$archivo = $_FILES['certificado'];
				$key = '';
				$pattern = '1234567890';
				$max = strlen($pattern)-1;
				for($i=0;$i < 4;$i++) $key .= $pattern{mt_rand(0,$max)};

				$ubicacion = explode("/", $validacion);
				$carpeta = "../Certificados/" . str_replace(' ', '_', $ubicacion[1]) .'/';

				move_uploaded_file($archivo['tmp_name'],$carpeta.$key.'_'. str_replace(' ', '_', $archivo['name']));

				$uploadDir = 'Certificados/'. str_replace(' ', '_', $ubicacion[1]).'/';
				$uploadname = $key.'_'.str_replace(' ', '_', $archivo['name']);
				$certificado = $uploadDir . $uploadname;

			}else{
				$certificado =  $validacion;
			}
		}else{
			if ($_FILES['certificado']['size']>0) {
				$archivo = $_FILES['certificado'];
				$key = '';
				$pattern = '1234567890';
				$max = strlen($pattern)-1;
				for($i=0;$i < 4;$i++) $key .= $pattern{mt_rand(0,$max)};
					$entidadArreglado = str_replace('.','',$entidad);
					$carpeta = "../Certificados/" .$key.'_'.str_replace(' ', '_', $entidadArreglado).'/';
				mkdir($carpeta, 0777, true);
				move_uploaded_file($archivo['tmp_name'],$carpeta.$key.'_'.str_replace(' ', '_', $archivo['name']));
				$uploadDir = 'Certificados/'.$key.'_'.str_replace(' ', '_', $entidadArreglado).'/';
				$uploadname = $key.'_'.str_replace(' ', '_', $archivo['name']);
				$certificado = $uploadDir . $uploadname;

			}else{
				$certificado = "";
			}
		}
		editarCertificado($id,$año,$fecha,$nit,$entidad,$contratoCliente,$contratoEmpresa,$fechaInicio,$fechaFinal,$duracion,$producto,$lugarEjecucion,$valorSmvl,$ejecutivo,$objeto,$fechaEnvio,$entregaEjecutivo,$operador,$expedicionCertificacion,$tipoEmpresa,$sector,$numeroRegistro,$certificado,$valorIvaInc,$estado,$alcance,$fechaSuscripcion,$codigoProducto);
		break;

		case 'Borrar' :
		$id = $_GET['id'];
		if (strlen($_GET['archivo']) == 0) {
			borrarCertificado($id);
		}else{
			$archivo = $_GET['archivo'];
			$array = explode("/", $archivo);
			$carpeta = '../'.$array[0].'/'.$array[1];
			foreach(glob($carpeta . "/*") as $archivos_carpeta){             
				if (is_dir($archivos_carpeta)){
					rmdir($archivos_carpeta);
				} else {
					unlink($archivos_carpeta);
				}
			}
			rmdir($carpeta);
			borrarCertificado($id);
		}
		break;

		case 'Consultar':
		$columna = $_POST['columna'];
		$filtro = $_POST['filtro'];
		$tabla = $_POST['tabla'];
		$array = consultaTabla($filtro,$tabla,$columna);
		foreach ($array as $key) {?>
			<li onClick="selectCountry('<?php echo $key['nombre'] ?>','<?php echo $key['id_sector'] ?>')"><?php echo $key["nombre"]; ?></li>
		<?php }
		break;

		case 'Consultar servicio':
		$columna = $_POST['columna'];
		$filtro = $_POST['filtro'];
		$tabla = $_POST['tabla'];
		$array = consultaTabla($filtro,$tabla,$columna);
		foreach ($array as $key) {?>
			<li onClick="servicio('<?php echo $key['nombreProducto'] ?>','<?php echo $key['codigoProducto'] ?>')"><?php echo $key["codigoProducto"].' - '. $key['nombreProducto']; ?></li>
		<?php }
		break;

		case 'Valor SMLV':
		if (strlen($_POST['fechaFinal']) > 0) {
			$fechaFinal = $_POST['fechaFinal'];
			$ano = explode("-",$fechaFinal);
			$valorEjecutado = $_POST['valor'];
			$valor = (double)str_replace(',', '', $valorEjecutado);

			$array = consultarSalario($ano[0]);
			foreach ($array as $key) {
				$salario = $key['salario'];
			}
			if (isset($salario)) {
				$smlv = $valor/$salario;
				echo bcdiv($smlv, '1', 3);
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
		
		break;
	}
}


?>