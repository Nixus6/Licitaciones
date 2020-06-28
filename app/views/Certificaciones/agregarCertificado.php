<?php

include("app/models/conexionCERT.php");

$conexion  = new conexionCert;
$execute = $conexion->conectar();

$sector = $execute->query("SELECT * FROM sector");
$productos = $execute->query("SELECT * FROM productos");
?>

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

<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="card  card-tasks">
				<div class="card-body">
					<center>
						<h4>Agregar certificación</h4><br>
					</center>
					<form action="Funciones/crudCertificaciones.php" onsubmit="return camposCompletos();" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-4">
								<!-- Año -->
								<label>Año</label>
								<?php $año = date('Y'); ?>
								<input type="text" name="año" id="año" value="<?php echo $año ?>" class="form-control"><br>
								<!-- Entidad -->
								<label>Entidad</label>
								<input type="text" name="entidad" id="entidad" class="form-control"><br>
								<!-- Fecha de inicio -->
								<label>Fecha inicio</label>
								<input type="date" name="fechaInicio" id="fechaInicio" class="form-control"><br>
								<!-- Duración meses -->
								<label>Duracion meses</label>
								<input type="number" name="duracion" id="duracion" class="form-control"><br>
								<!-- Entrega ejecutivo -->
								<label>Entrega ejecutivo</label>
								<input type="date" name="entregaEjecutivo" id="entregaEjecutivo" class="form-control"><br>
								<!-- Valor Iva Includo -->
								<label>Valor total ejecutado iva incluido</label>
								<input type="" name="valorIva" id="valorIva" class="form-control"><br>
								<!-- Numero de registro en el Rut -->
								<label>Numero de registro en el Rup</label>
								<input type="text" name="numeroRegistro" id="numeroRegistro" class="form-control"><br>
								<!-- Producto -->
								<label>Producto/s</label>
								<select multiple name="producto[]" id="producto" class="form-control" size="6.5">
									<?php foreach ($productos as $key) { ?>
										<option value="<?php echo $key['nombreProducto'] ?>"><?php echo $key['nombreProducto'] ?></option>
									<?php } ?>
								</select><br>
								<!-- Codigo de producto -->
								<label>Codigo de producto/s</label>
								<textarea name="codigoProducto" id="codigoProducto" class="form-control"></textarea><br>

							</div>
							<div class="form-group col-md-4">
								<!-- Fecha -->
								<label>Fecha</label>
								<input type="date" name="fecha" id="fecha" class="form-control"><br>
								<!-- Contrato cliente -->
								<label>Contrato cliente</label>
								<input type="text" name="contratoCliente" id="contratoCliente" class="form-control"><br>
								<!-- Fecha final -->
								<label>Fecha final</label>
								<input type="date" name="fechaFinal" id="fechaFinal" class="form-control"><br>
								<!-- Lugar de ejecución -->
								<label>Lugar de ejecución</label>
								<input type="text" name="lugarEjecucion" id="lugarEjecucion" class="form-control"><br>
								<!-- Sector -->
								<label>Sector</label>
								<select name="sector" id="sector" class="form-control">
									<option value="">Seleccionar</option>
									<?php foreach ($sector as $key) { ?>
										<option value="<?php echo $key['id_sector'] ?>"><?php echo $key['sector'] ?></option>
									<?php } ?>
								</select><br>
								<!-- Valor SMLV -->
								<label>Valor SMLV</label>
								<input type="" name="valorSmvl" id="valorSmvl" class="form-control"><br>
								<!-- Tipo empresa -->
								<label>Tipo de empresa</label>
								<select name="tipoEmpresa" id="tipoEmpresa" class="form-control">
									<option value="">Seleccionar</option>
									<option value="Publica">Publica</option>
									<option value="Privada">Privada</option>
								</select><br>
								<div style="margin-top: 15px;">
									<!-- Objeto -->
									<label>Objeto</label>
									<textarea type="text" name="objeto" id="objeto" class="form-control"></textarea>
								</div>
								<!-- Codigo de servicio -->
								<div style="margin-top: 60px;">
									<label>Codigo de servicio</label>
									<input type="number" id="codigoServicio" class="form-control">
									<div id="suggesstion-box2"></div><br>
								</div>
							</div>
							<div class="form-group col-md-4">
								<!-- Nit -->
								<label>Nit</label>
								<input type="number" name="nit" id="nit" class="form-control"><br>
								<!-- Contrato empresa -->
								<label>Contrato empresa</label>
								<input type="text" name="contratoEmpresa" id="contratoEmpresa" class="form-control"><br>
								<!-- Fecha de suscripción -->
								<label>Fecha de suscripción</label>
								<input type="date" name="fechaSuscripcion" id="fechaSuscripcion" class="form-control"><br>
								<!-- Ejecutivo -->
								<label>Ejecutivo</label>
								<input type="text" name="ejecutivo" id="ejecutivo" class="form-control">
								<div id="suggesstion-box"></div><br>
								<!-- Fecha de expedición de la certificación -->
								<label>Fecha de expedición de la certificación</label>
								<input type="date" name="expedicionCertificacion" id="expedicionCertificacion" class="form-control"><br>
								<!-- Fecha de envio -->
								<label>Fecha de envio al ejecutivo</label>
								<input type="date" name="fechaEnvio" id="fechaEnvio" class="form-control"><br>
								<!-- Proveedor -->
								<label>Proveedor</label>
								<select name="operador" id="operador" class="form-control">
									<option value="">Seleccionar</option>
									<option value="UNE EPM TELECOMUNICACIONES S.A.">UNE EPM TELECOMUNICACIONES S.A.</option>
									<option value="COLOMBIA MÓVIL S.A. E.S.P.">COLOMBIA MÓVIL S.A. E.S.P.</option>
									<option value="EDATEL S.A.">EDATEL S.A.</option>
								</select><br>
								<div style="margin-top: 15px;">
									<!-- Alcance -->
									<label>Alcance</label>
									<textarea type="text" name="alcance" id="alcance" class="form-control"></textarea> <br>
								</div>
								<!-- Estado -->
								<div style="margin-top: 38px;">
									<label>Estado</label>
									<select name="estado" id="estado" class="form-control">
										<option value="Borrador">Borrador</option>
									</select>
								</div>
							</div>
						</div>
						<center>
							<input type="submit" name="accion" value="Registrar" class="btn btn-primary">
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>