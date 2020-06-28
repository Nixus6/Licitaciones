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

$id = $_GET['id'];

/*$nitEntidad = $_GET['nitEntidad'];
$Entidad = $_GET['entidad'];
$numeroRegistro = $_GET['numeroRegistro'];
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];
$duracionMeses = $_GET['duracionMeses'];
$valorSmlvMin1 = $_GET['valorSmlvMin'];
$valorSmlvMin = (double)str_replace(',', '', $valorSmlvMin1);
$valorSmlvMax1 = $_GET['valorSmlvMax'];
$valorSmlvMax = (double)str_replace(',', '', $valorSmlvMax1);
$expedicionInicio = $_GET['expedicionInicio'];
$expedicionFinal = $_GET['expedicionFinal'];
$estado = $_GET['estado'];
$producto = $_GET['producto'];
$tipoEmpresa = $_GET['tipoEmpresa'];
$sector2 = $_GET['sector'];
$operador = $_GET['operador'];
$creador = $_GET['creador'];
$ano = $_GET['ano'];
$codigoProducto = $_GET['codigoProducto']; 
*/

$sentencia = $execute->prepare("SELECT c.ano as ano,c.fecha as fecha,c.nitEntidad as nitEntidad, c.entidad as entidad, c.contratoCliente as contratoCliente, c.contratoEmpresa as contratoEmpresa, c.fechaInicio as fechaInicio, c.fechaFinal as fechaFinal, c.duracion as duracion, c.producto as producto, c.lugarEjecucion as lugarEjecucion, c.valorSmlv as valorSmlv, c.ejecutivo as ejecutivo, c.objeto as objeto, c.fechaEnvio as fechaEnvio, c.entregaEjecutivo as entregaEjecutivo, c.operador as operador,c.expedicionCertificacion as expedicionCertificacion,c.tipoEmpresa as tipoEmpresa, c.sector as id_sector ,s.sector as sector, c.numeroRegistroRut as numeroRegistroRut, c.certificado as certificado, c.valorIvaInc as valorIvaInc, c.estado as estado, c.alcance as alcance, c.fechaSuscripcion as fechaSuscripcion, c.codigoProducto as codigoProducto FROM certificados c
	Join sector s on c.sector = s.id_sector
	WHERE c.id_certificados = ?;");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);


$sector = $execute->query("SELECT * FROM sector");
$productos = $execute->query("SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>
<style type="text/css">
	.subir {
		padding: 10px 100px;
		background: #1d3c61;
		color: #fff;
		border: 2px solid #fff;
	}

	.subir:hover {
		color: #fff;
		background: red;
	}

	#suggesstion-box {
		float: left;
		list-style: none;
		margin-top: -7px;
		padding: 0;
		width: 320px;
		position: auto;
	}

	#suggesstion-box li {
		padding: 2px;
		background: #f0f0f0;
		border-bottom: #bbb9b9 1px solid;
	}

	#suggesstion-box li:hover {
		background: #405c8c;
		cursor: pointer;
	}

	#suggesstion-box2 {
		float: left;
		list-style: none;
		margin-top: -7px;
		padding: 0;
		width: 320px;
		position: auto;
	}

	#suggesstion-box2 li {
		padding: 2px;
		background: #f0f0f0;
		border-bottom: #bbb9b9 1px solid;
	}

	#suggesstion-box2 li:hover {
		background: #405c8c;
		cursor: pointer;
	}
</style>


<body class="">

	<!-- Modal de los certificados -->
	<div class="modal fade" id="archivos" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<center>
						<h4>Archivos subidos</h4>
						<?php
						$certificado = $objeto->certificado;
						if (strlen($certificado) > 0) {
							$ubicacion = explode("/", $certificado);
							$carpeta = "Certificados/" . str_replace(' ', '_', $ubicacion[1]) . '/';
							$directorio =    $carpeta;
							if (file_exists($directorio) == true) {
								$rep        =    opendir($directorio);
								while ($arc = readdir($rep)) {
									if ($arc != '..' && $arc != '.' && $arc != '' && $arc != 'index.php') {
										print  "<a href=" . $directorio . "" . $arc . " target='_blank'>" . $arc . "</a><br/>";
									}
								}
								closedir($rep);
								clearstatcache();
							} else { ?>
								<span class="alert-info">No se encontraron archivos. (Contactar con administrador para mas información)</span>
							<?php }
						} else { ?>
							<span class="alert-info">No se han subido archivos</span>
						<?php } ?>
					</center>
				</div>
			</div>
		</div>

	</div>


	<div class="wrapper ">

		<?php include FOLDER_TEMPLATE . "menu.php"; ?>

		<div class="main-panel">

			<?php include FOLDER_TEMPLATE . "top.php"; ?>

			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body">
								<a href="menuPrincipal.php" class="btn btn-primary" style="color:white;">Regresar</a>
								<a href='consultaCertificado.php?nitEntidad=<?php echo $nitEntidad ?>
								&entidad=<?php echo $Entidad ?>&numeroRegistro=<?php echo $numeroRegistro ?>
								&fechaInicio=<?php echo $fechaInicio ?>&fechaFin=<?php echo $fechaFin ?>
								&duracionMeses=<?php echo $duracionMeses ?>&valorSmlvMin=<?php echo $valorSmlvMin ?>
								&valorSmlvMax=<?php echo $valorSmlvMax ?>&expedicionInicio=<?php echo $expedicionInicio ?>
								&expedicionFinal=<?php echo $expedicionFinal ?>&estado=<?php echo $estado ?>
								&producto=<?php echo $producto ?>&tipoEmpresa=<?php echo $tipoEmpresa ?>
								&sector=<?php echo $sector2 ?>&operador=<?php echo $operador ?>&creador=<?php echo $creador ?>
								&ano=<?php echo $ano ?>&codigoProducto=<?php echo $codigoProducto ?>' class="btn btn-primary" hidden>Regresar</a>
								<center>
									<?php if (strlen($objeto->certificado) > 0) { ?>
										<h4>Editar certificado</h4><br>
									<?php } else { ?>
										<h4>Editar borrador</h4><br>
									<?php } ?>
								</center>
								<form action="Funciones/crudCertificaciones.php" onsubmit="return cargarArchivo();" method="POST" enctype="multipart/form-data">
									<div class="form-row">
										<div class="form-group col-md-4">
											<input type="text" name="id" value="<?php echo $_GET['id']; ?>" hidden>
											<!-- Año -->
											<label>Año</label>
											<input type="text" name="año" id="año" value="<?php echo $objeto->ano ?>" class="form-control"><br>
											<!-- Entidad -->
											<label>Entidad</label>
											<input type="text" name="entidad" value="<?php echo $objeto->entidad ?>" class="form-control"><br>
											<!-- Fecha de inicio -->
											<label>Fecha inicio</label>
											<input type="date" name="fechaInicio" value="<?php echo $objeto->fechaInicio ?>" class="form-control"><br>
											<!-- Duración meses -->
											<label>Duracion meses</label>
											<input type="number" name="duracion" value="<?php echo $objeto->duracion ?>" class="form-control"><br>
											<!-- Entrega ejecutivo -->
											<label>Entrega ejecutivo</label>
											<input type="date" name="entregaEjecutivo" value="<?php echo $objeto->entregaEjecutivo ?>" class="form-control"><br>
											<!-- Valor Iva Includo -->
											<label>Valor total ejecutado iva incluido</label>
											<input type="" name="valorIva" id="valorIva" value="<?php echo number_format($objeto->valorIvaInc) ?>" class="form-control"><br>
											<!-- Numero de registro en el Rut -->
											<label>Numero de registro en el Rup</label>
											<input type="text" name="numeroRegistro" value="<?php echo $objeto->numeroRegistroRut ?>" class="form-control"><br>

											<!-- Producto -->
											<label>Producto/s</label>
											<input type="text" name="producto1" id="valProducto" value="<?php echo $objeto->producto ?>" class="form-control">
											<select multiple name="producto[]" id="producto" class="form-control" size="4"><br>
												<?php foreach ($productos as $key) { ?>
													<option value="<?php echo $key['nombreProducto'] ?>"><?php echo $key['nombreProducto'] ?></option>
												<?php } ?>
											</select><br>

										</div>
										<div class="form-group col-md-4">
											<!-- Fecha -->
											<label>Fecha</label>
											<input type="date" name="fecha" value="<?php echo $objeto->fecha ?>" class="form-control"><br>
											<!-- Contrato cliente -->
											<label>Contrato cliente</label>
											<input type="text" name="contratoCliente" value="<?php echo $objeto->contratoCliente ?>" class="form-control"><br>
											<!-- Fecha final -->
											<label>Fecha final</label>
											<input type="date" name="fechaFinal" id="fechaFinal" value="<?php echo $objeto->fechaFinal ?>" class="form-control"><br>
											<!-- Lugar de ejecución -->
											<label>Lugar de ejecución</label>
											<input type="text" name="lugarEjecucion" value="<?php echo $objeto->lugarEjecucion ?>" class="form-control"><br>
											<!-- Sector -->
											<label>Sector</label>
											<select name="sector" id="sector" class="form-control">
												<option value="<?php echo $objeto->id_sector ?>"><?php echo $objeto->sector ?></option>
												<?php foreach ($sector as $key) { ?>
													<option value="<?php echo $key['id_sector'] ?>"><?php echo $key['sector'] ?></option>
												<?php } ?>
											</select><br>
											<!-- Valor SMLV -->
											<label>Valor SMLV</label>
											<input type="" name="valorSmvl" id="valorSmvl" value="<?php echo $objeto->valorSmlv ?>" class="form-control"><br>
											<!-- Tipo empresa -->
											<label>Tipo de empresa</label>
											<select name="tipoEmpresa" class="form-control">
												<option value="<?php echo $objeto->tipoEmpresa ?>"><?php echo $objeto->tipoEmpresa ?></option>
												<option value="Publica">Publica</option>
												<option value="Privada">Privada</option>
											</select><br>
											<!-- Objeto -->
											<div style="margin-top: 15px;">
												<label>Objeto</label>
												<textarea type="text" name="objeto" class="form-control"><?php echo $objeto->objeto ?> </textarea>
											</div>
										</div>
										<div class="form-group col-md-4">
											<!-- Nit -->
											<label>Nit</label>
											<input type="number" name="nit" value="<?php echo $objeto->nitEntidad ?>" class="form-control"><br>
											<!-- Contrato empresa -->
											<label>Contrato empresa</label>
											<input type="text" name="contratoEmpresa" value="<?php echo $objeto->contratoEmpresa ?>" class="form-control"><br>
											<!-- Fecha de suscripción -->
											<label>Fecha de suscripción</label>
											<input type="date" name="fechaSuscripcion" id="fechaSuscripcion" value="<?php echo $objeto->fechaSuscripcion ?>" class="form-control"><br>
											<!-- Ejecutivo -->
											<label>Ejecutivo</label>
											<input type="text" name="ejecutivo" id="ejecutivo" value="<?php echo $objeto->ejecutivo ?>" class="form-control">
											<div id="suggesstion-box"></div><br>
											<!-- Fecha de expedición de la certificación -->
											<label>Fecha de expedición de la certificación</label>
											<input type="date" name="expedicionCertificacion" value="<?php echo $objeto->expedicionCertificacion ?>" class="form-control"><br>
											<!-- Fecha de envio -->
											<label>Fecha de envio al ejecutivo</label>
											<input type="date" name="fechaEnvio" value="<?php echo $objeto->fechaEnvio ?>" class="form-control"><br>
											<!-- Proveedor -->
											<label>Proveedor</label>
											<select name="operador" class="form-control">
												<option value="<?php echo $objeto->operador ?>"><?php echo $objeto->operador ?></option>
												<option value="UNE EPM TELECOMUNICACIONES S.A.">UNE EPM TELECOMUNICACIONES S.A.</option>
												<option value="COLOMBIA MÓVIL S.A. E.S.P.">COLOMBIA MÓVIL S.A. E.S.P.</option>
												<option value="EDATEL S.A.">EDATEL S.A.</option>
											</select><br>
											<!-- Alcance -->
											<div style="margin-top: 15px;">
												<label>Alcance</label>
												<textarea type="text" name="alcance" class="form-control"><?php echo $objeto->alcance ?> </textarea>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-4">
											<!-- Codigos de producto/s -->
											<label>Codigos de producto/s</label>
											<textarea name="codigoProducto" id="codigoProducto" class="form-control" style="margin-top: -14px"><?php echo $objeto->codigoProducto; ?></textarea><br>
										</div>
										<div class="form-group col-lg-4">
											<!-- Codigo de servicio -->
											<label>Codigo de servicio</label>
											<input type="number" id="codigoServicio" class="form-control">
											<div id="suggesstion-box2"></div><br>
										</div>
										<div class="form-group col-lg-4">
											<!-- Estado -->
											<label>Estado</label>
											<select name="estado" id="estado" class="form-control">
												<option value="<?php echo $objeto->estado ?>"><?php echo $objeto->estado ?></option>
												<option value="Borrador">Borrador</option>
												<option value="Documento enviado">Documento enviado</option>
												<option value="Firmado">Firmado</option>
											</select><br>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-4">
											<!-- Certificado -->
											<label for="file-upload" class="subir" style="margin-top: 20px">
												<i class="fas fa-cloud-upload-alt"></i> Certificado
											</label>
											<input id="file-upload" name="certificado" type="file" style='display: none;' /><br>
											<input type="text" name="archivo" value="<?php echo $objeto->certificado ?>" hidden>
											<center>
												<input type="button" class="btn btn-info" id="archivosSubidos" style="margin-right: 40px" data-toggle="modal" data-target="#archivos" value="Archivos subidos"><br>
											</center>
											<a href="exportWord.php?id=<?php echo $id; ?>" id='btnExportar' style="margin-left: 85px" title='Exportar borrador'>Exportar borrador</span></a>
										</div>
									</div>
							</div>
							<?php if ($_SESSION['id_rol'] != '3') { ?>
								<center>
									<input type="submit" name="accion" value="Guardar" class="btn btn-primary">
								</center>
							<?php } ?>
							</form>
						</div>
					</div>
				</div>

				<?php include FOLDER_TEMPLATE . "footer.php"; ?>

			</div>
		</div>
	</div>

	</div>
	</div>

	<?php include FOLDER_TEMPLATE . "scripts.php"; ?>

	<script type="text/javascript">
		$('#objeto').on('input', function() {
			this.value = this.value.replace(/['-]/g, '');
		});

		$('#alcance').on('input', function() {
			this.value = this.value.replace(/['-]/g, '');
		});

		$('#valProducto').css('pointer-events', 'none');
		$('#año').css('pointer-events', 'none');
		$('#valorSmvl').css('pointer-events', 'none');

		$("#valorIva").on({
			"focus": function(event) {
				$(event.target).select();
			},
			"keyup": function(event) {
				$(event.target).val(function(index, value) {
					return value.replace(/\D/g, "")
						.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
				});
			}
		});

		$(document).ready(function() {
			$('#ejecutivo').on("keyup input", function() {
				var filtro = $('#ejecutivo').val();
				$.ajax({
					type: "POST",
					url: "Funciones/crudCertificaciones.php",
					data: {
						'filtro': filtro,
						'accion': 'Consultar',
						'tabla': 'ejecutivos',
						'columna': 'nombre'
					},
					success: function(data) {
						if (filtro === "") {
							$("#suggesstion-box").hide();
							$("#suggesstion-box").html('');

						} else {
							$("#suggesstion-box").show();
							$("#suggesstion-box").html(data);

						}
					}
				});
			})
		});

		function selectCountry(ejecutivo, sector) {
			$('#ejecutivo').val(ejecutivo);
			$('#sector').val(sector);
			$("#suggesstion-box").hide();
		}

		$(document).ready(function() {
			$('#codigoServicio').on("keyup input", function() {
				var filtro = $('#codigoServicio').val();
				$.ajax({
					type: "POST",
					url: "Funciones/crudCertificaciones.php",
					data: {
						'filtro': filtro,
						'accion': 'Consultar servicio',
						'tabla': 'codigoproductos',
						'columna': 'codigoProducto'
					},
					success: function(data) {
						if (filtro === "") {
							$("#suggesstion-box2").hide();
							$("#suggesstion-box2").html('');

						} else {
							$("#suggesstion-box2").show();
							$("#suggesstion-box2").html(data);

						}
					}
				});
			})
		});

		function servicio(nombreProducto, codigoProducto) {
			var productos = $('#codigoProducto').val();
			$('#nombreProducto').val(nombreProducto);
			$('#codigoProducto').val(productos + codigoProducto + ',');
			$('#codigoServicio').val("");
			$("#suggesstion-box2").hide();
		}

		function cargarArchivo() {

			var file = $("#file-upload")[0].files[0];
			if (file) {
				var fileName = file.name;
				var fileSize = file.size;
				var fileType = file.type;
				if (fileType === 'application/pdf' || fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || fileType === 'image/gif' || fileType === 'image/jpeg' || fileType === 'image/png' || fileType === 'image/bmp' || fileType === 'image/jpeg') {
					alert("Se ha cargado un archivo: " + fileName);
				} else {
					alertify.error('El formato del archivo no esta permitido');
					alertify.error('Tipo de archivo: ' + fileType);
					alertify.log("Los formatos admitidos son: PDF, archivos de Word");
					return false;
				}
			} else {

			}

		}
		$(document).ready(function() {
			$('#valorIva,#fechaFinal').on("keyup input", function() {
				var valor = $('#valorIva').val();
				var fechaFinal = $('#fechaFinal').val();
				$.ajax({
					type: "POST",
					url: "Funciones/crudCertificaciones.php",
					data: {
						'valor': valor,
						'accion': 'Valor SMLV',
						'fechaFinal': fechaFinal
					},
					success: function(data) {
						$('#valorSmvl').val(data);
					}
				});
			})
		});
	</script>

</body>

</html>