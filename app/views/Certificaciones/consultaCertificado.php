<?php include "../../../config.php"; ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
	include("../../models/conexionCERT.php");
} else {
	header('location: ../index.php');
}
$conexion  = new conexionCert;
$execute = $conexion->conectar();

if ($_GET) {

	$nitEntidad = $_GET['nitEntidad'];
	$Entidad = $_GET['entidad'];
	$numeroRegistro = $_GET['numeroRegistro'];
	$fechaInicio = $_GET['fechaInicio'];
	$fechaFin = $_GET['fechaFin'];
	$duracionMeses = $_GET['duracionMeses'];
	$valorSmlvMin = $_GET['valorSmlvMin'];
	$valorSmlvMax = $_GET['valorSmlvMax'];
	$expedicionInicio = $_GET['expedicionInicio'];
	$expedicionFinal = $_GET['expedicionFinal'];
	$estado = $_GET['estado'];
	$producto = $_GET['producto'];
	$tipoEmpresa = $_GET['tipoEmpresa'];
	$sector = $_GET['sector'];
	$operador = $_GET['operador'];
	$creador = $_GET['creador'];
	$ano = $_GET['ano'];
	$codigoProducto = $_GET['codigoProducto'];
} else {

	$nitEntidad = $_POST['nit'];
	$Entidad = $_POST['entidad'];
	$numeroRegistro = $_POST['numeroRegistro'];
	$fechaInicio = $_POST['fechaInicio'];
	$fechaFin = $_POST['fechaFin'];
	$duracionMeses = $_POST['duracionMeses'];
	$valorSmlvMin1 = $_POST['valorSmlvMin'];
	$valorSmlvMin = (float) str_replace(',', '', $valorSmlvMin1);
	$valorSmlvMax1 = $_POST['valorSmlvMax'];
	$valorSmlvMax = (float) str_replace(',', '', $valorSmlvMax1);
	$expedicionInicio = $_POST['expedicionInicio'];
	$expedicionFinal = $_POST['expedicionFinal'];
	$estado = $_POST['estado'];
	if (!empty($_POST['producto'])) {
		$producto1 = $_POST['producto'];
		$producto = implode(", ", $producto1);
	} else {
		$producto = "";
	}
	$tipoEmpresa = $_POST['tipoEmpresa'];
	$sector = $_POST['sector'];
	$operador = $_POST['operador'];
	$creador = $_POST['creador'];
	$ano = $_POST['año'];
	$codigoProducto = $_POST['codigoProducto'];
}





if ($valorSmlvMin > 0 and $valorSmlvMax > 0 and strlen($expedicionInicio) > 0 and strlen($expedicionFinal) > 0) {
	$sql = $execute->query("SELECT * FROM certificados where numeroRegistroRut LIKE '%$numeroRegistro%' and entidad LIKE '%$Entidad%' and nitEntidad LIKE '%$nitEntidad%' and fechaInicio LIKE '%$fechaInicio%' and fechaFinal LIKE '%$fechaFin%' and duracion LIKE '%$duracionMeses%' and producto LIKE '%$producto%' and tipoEmpresa LIKE '%$tipoEmpresa%' and sector LIKE '%$sector%' and operador LIKE '%$operador%' and estado LIKE '%$estado%' and usuCreador LIKE '%$creador%' and ano LIKE '%$ano%'  and codigoProducto LIKE '%$codigoProducto%' and (valorSmlv between '$valorSmlvMin' and '$valorSmlvMax') and (expedicionCertificacion between '$expedicionInicio' and '$expedicionFinal')");
} elseif ($valorSmlvMin == 0 and $valorSmlvMax == 0 and strlen($expedicionInicio) > 0 and strlen($expedicionFinal) > 0) {
	$sql = $execute->query("SELECT * FROM certificados where numeroRegistroRut LIKE '%$numeroRegistro%' and entidad LIKE '%$Entidad%' and nitEntidad LIKE '%$nitEntidad%' and fechaInicio LIKE '%$fechaInicio%' and fechaFinal LIKE '%$fechaFin%' and duracion LIKE '%$duracionMeses%' and producto LIKE '%$producto%' and tipoEmpresa LIKE '%$tipoEmpresa%' and sector LIKE '%$sector%' and operador LIKE '%$operador%' and estado LIKE '%$estado%' and usuCreador LIKE '%$creador%' and ano LIKE '%$ano%'  and codigoProducto LIKE '%$codigoProducto%' and (expedicionCertificacion between '$expedicionInicio' and '$expedicionFinal')");
} elseif ($valorSmlvMin > 0 and $valorSmlvMax > 0 and strlen($expedicionInicio) == 0 and strlen($expedicionFinal) == 0) {
	$sql = $execute->query("SELECT * FROM certificados where numeroRegistroRut LIKE '%$numeroRegistro%' and entidad LIKE '%$Entidad%' and nitEntidad LIKE '%$nitEntidad%' and fechaInicio LIKE '%$fechaInicio%' and fechaFinal LIKE '%$fechaFin%' and duracion LIKE '%$duracionMeses%' and producto LIKE '%$producto%' and tipoEmpresa LIKE '%$tipoEmpresa%' and sector LIKE '%$sector%' and operador LIKE '%$operador%' and estado LIKE '%$estado%' and usuCreador LIKE '%$creador%' and ano LIKE '%$ano%' and codigoProducto LIKE '%$codigoProducto%' and (valorSmlv between '$valorSmlvMin' and '$valorSmlvMax')");
} else {
	$sql = $execute->query("SELECT * FROM certificados where numeroRegistroRut LIKE '%$numeroRegistro%' and entidad LIKE '%$Entidad%' and nitEntidad LIKE '%$nitEntidad%' and fechaInicio LIKE '%$fechaInicio%' and fechaFinal LIKE '%$fechaFin%' and duracion LIKE '%$duracionMeses%' and producto LIKE '%$producto%' and tipoEmpresa LIKE '%$tipoEmpresa%' and sector LIKE '%$sector%' and operador LIKE '%$operador%' and estado LIKE '%$estado%' and usuCreador LIKE '%$creador%' and ano LIKE '%$ano%'  and codigoProducto LIKE '%$codigoProducto%' ");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<?php include FOLDER_TEMPLATE . "head.php"; ?>

</head>
<style>
	.sidebar {
		width: 5%;
	}

	.main {
		margin-left: 5%;
	}

	/**--------------------- */
	#navigationMenu span {
		/* Container properties */
		width: 0;
		left: 69px;
		top: 0px;
		padding: 0;
		position: absolute;
		overflow: hidden;

		/* Text properties */
		font-family: 'Myriad Pro', Arial, Helvetica, sans-serif;
		font-size: 18px;
		font-weight: bold;
		letter-spacing: 0.6px;
		white-space: nowrap;
		line-height: 66px;

		/* CSS3 Transition: */

		-webkit-transition: 0.1s;

		/* Future proofing (these do not work yet): */
		-moz-transition: 0.25s;




	}

	#navigationMenu a {
		/* The background sprite: */


		display: block;
		position: relative;
		transition: 5s;

	}

	/* General hover styles */

	#navigationMenu a:hover span {
		width: auto;
		padding: 0 30px;
		overflow: visible;
		background: linear-gradient(to right, #0c2646 0%, #010a43 70%, #2a5788 100%);
		color: white;
		transition: 1s;


	}
</style>

<body class="">
	<div class="wrapper ">

		<?php include FOLDER_TEMPLATE . "menu.php"; ?>

		<div class="main">

			<?php include FOLDER_TEMPLATE . "top.php"; ?>


			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body">
								<center>
									<h4>Certificaciones</h4><br>
								</center>
								<div style="margin-left: 15%;">
									<a href='Archivos/excel/exportar.php?nitEntidad=<?php echo $nitEntidad ?>&entidad=<?php echo $Entidad ?>&numeroRegistro=<?php echo $numeroRegistro ?>&fechaInicio=<?php echo $fechaInicio ?>&fechaFin=<?php echo $fechaFin ?>&duracionMeses=<?php echo $duracionMeses ?>&valorSmlvMin=<?php echo $valorSmlvMin ?>&valorSmlvMax=<?php $valorSmlvMax ?>&expedicionInicio=<?php echo $expedicionInicio ?>&expedicionFinal=<?php echo $expedicionFinal ?>&estado=<?php $estado ?>&producto=<?php $producto ?>&tipoEmpresa=<?php echo $tipoEmpresa ?>&sector=<?php echo $sector ?>&operador=<?php echo $operador ?>&creador=<?php echo $creador ?>&ano=<?php echo $ano ?>&codigoProducto=<?php echo $codigoProducto ?>' class="btn btn-primary">Exportar</a>
								</div>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Año</th>
												<th>Fecha</th>
												<th>Nit</th>
												<th>Entidad</th>
												<th>Numero Registro Rup</th>
												<th>Contrato cliente</th>
												<th>Fecha inicio</th>
												<th>Fecha Final</th>
												<th>Duración meses</th>
												<th>Producto</th>
												<th>Lugar ejecución</th>
												<th>Fecha de expedición de la certificación</th>
												<th>Ultimo archivo subido</th>
												<th>Estado</th>
												<th colspan="3">Opciones</th>
											</tr>
										</thead>
										<tbody class="table-striped"><br>
											<?php
											foreach ($sql as $key) { ?>
												<tr>
													<td><?php echo $key['ano']; ?></td>
													<td><?php echo $key['fecha']; ?></td>
													<td><?php echo $key['nitEntidad']; ?></td>
													<td><?php echo $key['entidad']; ?></td>
													<td><?php echo $key['numeroRegistroRut']; ?></td>
													<td><?php echo $key['contratoCliente']; ?></td>
													<td><?php echo $key['fechaInicio']; ?></td>
													<td><?php echo $key['fechaFinal']; ?></td>
													<td><?php echo $key['duracion']; ?></td>
													<td><?php echo $key['producto']; ?></td>
													<td><?php echo $key['lugarEjecucion']; ?></td>
													<td><?php echo $key['expedicionCertificacion']; ?></td>
													
													<?php if ($key['estado'] == "Firmado") { ?>
														<td><a target="_black" href="<?php echo $key['certificado']; ?>" class='btn btn-info btn-sm'><span class='now-ui-icons education_paper'></a></td>
														<td><i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
													<?php } elseif ($key['estado'] == "Borrador") { ?>
														<td><a href="exportWord.php?id=<?php echo $key['id_certificados'] ?>" id='btnExportar' title='Exportar borrador'>Exportar Borrador</span></a></td>
														<td><i class="fas fa-circle" style="color: red; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
													<?php } elseif ($key['estado'] == "Documento enviado") { ?>
														<td><a href="exportWord.php?id=<?php echo $key['id_certificados'] ?>" id='btnExportar' title='Exportar borrador'>Exportar Borrador</span></a></td>
														<td><i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
													<?php } ?>
													<td><a href='editarCertificado.php?id=<?php echo $key['id_certificados'] ?>&nitEntidad=<?php echo $nitEntidad ?>&entidad=<?php echo $Entidad ?>&numeroRegistro=<?php echo $numeroRegistro ?>&fechaInicio=<?php echo $fechaInicio ?>&fechaFin=<?php echo $fechaFin ?>&duracionMeses=<?php echo $duracionMeses ?>&valorSmlvMin=<?php echo $valorSmlvMin ?>&valorSmlvMax=<?php echo $valorSmlvMax ?>&expedicionInicio=<?php echo $expedicionInicio ?>&expedicionFinal=<?php echo $expedicionFinal ?>&estado=<?php echo $estado ?>&producto=<?php echo $producto ?>&tipoEmpresa=<?php echo $tipoEmpresa ?>&sector=<?php echo $sector ?>&operador=<?php echo $operador ?>&creador=<?php echo $creador ?>&ano=<?php echo $ano ?>&codigoProducto=<?php echo $codigoProducto ?>' class='btn btn-primary btn-sm' id='btnEditar' title='Editar certificado'><span class='now-ui-icons ui-2_settings-90'></span></a></td>
													<?php if ($_SESSION['id'] == '1') { ?>
														<td><a href="Funciones/crudCertificaciones.php?id=<?php echo $key['id_certificados'] ?>&accion=Borrar&archivo=<?php echo $key['certificado'] ?>" class='btn btn-danger btn-sm' id='btnBorrar' title='Borrar certificado'><span class='now-ui-icons ui-1_simple-remove'></span></a></td>
													<?php } ?>
												</tr>
											<?php }
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include FOLDER_TEMPLATE . "footer.php"; ?>
		
	</div>
	</div>

	<?php include FOLDER_TEMPLATE . "scripts.php"; ?>
</body>

</html>