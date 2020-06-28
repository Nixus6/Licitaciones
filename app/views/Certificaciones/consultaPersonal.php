<?php
include("app/models/conexionCERT.php");
$conexion  = new conexionCert;
$execute = $conexion->conectar();

$idUsuario = $_SESSION['id'];

if ($_SESSION['id'] == '1') {
	$borrador = $execute->query("SELECT * FROM certificados WHERE estado = 'Borrador' ");
	$enviado = $execute->query("SELECT * FROM certificados WHERE estado = 'Documento enviado' ");
	$contador = $execute->query("SELECT COUNT(*) as cantidadBorradores FROM certificados where estado = 'Borrador'");
	foreach ($contador as $key) {
		$cantidadBorradores = $key['cantidadBorradores'];
	}
	$contador2 = $execute->query("SELECT COUNT(*) as cantidadDocumentoE FROM certificados where estado = 'Documento enviado'");
	foreach ($contador2 as $key2) {
		$cantidadDocumentoE = $key2['cantidadDocumentoE'];
	}
} elseif ($_SESSION['id'] == '2') {
	$borrador = $execute->query("SELECT * FROM certificados WHERE estado = 'Borrador' AND usuCreador = $idUsuario");
	$enviado = $execute->query("SELECT * FROM certificados WHERE estado = 'Documento enviado' AND usuCreador = $idUsuario");
	$contador = $execute->query("SELECT COUNT(*) as cantidadBorradores FROM certificados where estado = 'Borrador' AND usuCreador = $idUsuario");
	foreach ($contador as $key) {
		$cantidadBorradores = $key['cantidadBorradores'];
	}
	$contador2 = $execute->query("SELECT COUNT(*) as cantidadDocumentoE FROM certificados where estado = 'Documento enviado' AND usuCreador = $idUsuario");
	foreach ($contador2 as $key2) {
		$cantidadDocumentoE = $key2['cantidadDocumentoE'];
	}
}

?>


<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="card  card-tasks">
				<div class="card-body">
					<center>
						<h4 id="titulo">Borradores</h4><br>
					</center>
					<label>Busqueda</label>
					<select name="opcion" id="opcion" class="form-control">
						<option value="borrador">Borradores</option>
						<option value="enviado">Documento enviado</option>
					</select><br>
					<h7 id="cantidadBorradores">Cantidad: <?php echo $cantidadBorradores; ?></h7>
					<h7 id="cantidadDocumentoE" hidden>Cantidad: <?php echo $cantidadDocumentoE; ?></h7>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Año</th>
									<th>Fecha</th>
									<th>Nit</th>
									<th>Entidad</th>
									<th>Contrato cliente</th>
									<th>Fecha inicio</th>
									<th>Fecha Final</th>
									<th>Duración meses</th>
									<th>Producto</th>
									<th>Lugar ejecución</th>
									<th>Certificado</th>
									<th>Estado</th>
									<th colspan="3">Opciones</th>
								</tr>
							</thead>
							<tbody class="table-striped" id="borradores"><br>
								<?php foreach ($borrador as $key) { ?>
									<tr>
										<td><?php echo $key['ano']; ?></td>
										<td><?php echo $key['fecha']; ?></td>
										<td><?php echo $key['nitEntidad']; ?></td>
										<td><?php echo $key['entidad']; ?></td>
										<td><?php echo $key['contratoCliente']; ?></td>
										<td><?php echo $key['fechaInicio']; ?></td>
										<td><?php echo $key['fechaFinal']; ?></td>
										<td><?php echo $key['duracion']; ?></td>
										<td><?php echo $key['producto']; ?></td>
										<td><?php echo $key['lugarEjecucion']; ?></td>
										<?php if ($key['estado'] == "Certificado") { ?>
											<td><a target="_black" href="<?php echo $key['certificado']; ?>"><?php echo $key['certificado']; ?></a></td>
											<td><i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } elseif ($key['estado'] == "Borrador") { ?>
											<td><a href="exportWord.php?id=<?php echo $key['id_certificados'] ?>" id='btnEditar' title='Editar certificado'>Exportar Borrador</td>
											<td><i class="fas fa-circle" style="color: red; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } elseif ($key['estado'] == "Documento enviado") { ?>
											<td><a href="exportWord.php?id=<?php echo $key['id_certificados'] ?>" id='btnEditar' title='Editar certificado'>Exportar Borrador</td>
											<td><i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } ?>
										<td><a href="editarCertificado.php?id=<?php echo $key['id_certificados'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar certificado'><span class='now-ui-icons ui-2_settings-90'></td>
										<td><a href="Funciones/crudCertificaciones.php?id=<?php echo $key['id_certificados'] ?>&accion=Borrar&archivo=<?php echo $key['certificado'] ?>" class='btn btn-danger btn-sm' id='btnBorrar' title='Borrar certificado'><span class='now-ui-icons ui-1_simple-remove'></span></td>
									</tr>
								<?php } ?>
							</tbody>
							<tbody class="table-striped" id="enviados" hidden><br>
								<?php foreach ($enviado as $key2) { ?>
									<tr>

										<td><?php echo $key2['ano']; ?></td>
										<td><?php echo $key2['fecha']; ?></td>
										<td><?php echo $key2['nitEntidad']; ?></td>
										<td><?php echo $key2['entidad']; ?></td>
										<td><?php echo $key2['contratoCliente']; ?></td>
										<td><?php echo $key2['fechaInicio']; ?></td>
										<td><?php echo $key2['fechaFinal']; ?></td>
										<td><?php echo $key2['duracion']; ?></td>
										<td><?php echo $key2['producto']; ?></td>
										<td><?php echo $key2['lugarEjecucion']; ?></td>
										<!--	<td> <?php // echo $key2['expedicionCertificacion']; 
														?></td> -->
										<?php if ($key2['estado'] == "Certificado") { ?>
											<td><a target="_black" href="<?php echo $key2['certificado']; ?>"><?php echo $key2['certificado']; ?></a></td>
											<td><i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } elseif ($key2['estado'] == "Borrador") { ?>
											<td><a href="exportWord.php?id=<?php echo $key2['id_certificados'] ?>" id='btnEditar' title='Editar certificado'>Exportar Enviado</td>
											<td><i class="fas fa-circle" style="color: red; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } elseif ($key2['estado'] == "Documento enviado") { ?>
											<td><a href="exportWord.php?id=<?php echo $key2['id_certificados'] ?>" id='btnEditar' title='Editar certificado'>Exportar Enviado</td>
											<td><i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i></td>
										<?php } ?>
										<td><a href="editarCertificado.php?id=<?php echo $key2['id_certificados'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar certificado'><span class='now-ui-icons ui-2_settings-90'></td>
										<?php if ($_SESSION['id_rol'] == '1') { ?>
											<td><a href="Funciones/crudCertificaciones.php?id=<?php echo $key['id_certificados'] ?>&accion=Borrar&archivo=<?php echo $key['certificado'] ?>" class='btn btn-danger btn-sm' id='btnBorrar' title='Borrar certificado'><span class='now-ui-icons ui-1_simple-remove'></span></a></td>
										<?php } ?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>