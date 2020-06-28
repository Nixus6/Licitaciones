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

$sector = $execute->query("SELECT * FROM sector");
$creador = $execute->query("SELECT * FROM usuarios");
$productos = $execute->query("SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">


<?php include FOLDER_TEMPLATE . "head.php"; ?>


<body class="">

	<div class="wrapper">


		<?php include FOLDER_TEMPLATE . "menu.php"; ?>

		<div class="main-panel">

			<?php include FOLDER_TEMPLATE . "top.php"; ?>

			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body">
								<form action="consultaCertificado.php" method="POST">
									<center>
										<h4>Búsqueda avanzada</h4><br>
									</center>

									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Numero de registro en el RUP</label></label>
											<input type="text" name="numeroRegistro" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>NIT</label>
											<input type="text" name="nit" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Entidad</label>
											<input type="text" name="entidad" class="form-control">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Fecha inicio del contrato</label>
											<input type="date" name="fechaInicio" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Fecha final del contrato</label>
											<input type="date" name="fechaFin" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Duraciones meses</label>
											<input type="number" name="duracionMeses" class="form-control">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Año de creación</label>
											<input name="año" id="año" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Valor SMLV (Minimo)</label>
											<input name="valorSmlvMin" id="valorSmlvMin" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Valor SMLV (Maximo)</label>
											<input name="valorSmlvMax" id="valorSmlvMax" class="form-control">
										</div>
									</div>
									<br>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Proveedor</label>
											<select name="operador" id="operador" class="form-control">
												<option value="">---------------------------------------------------</option>
												<option value="UNE EPM TELECOMUNICACIONES S.A.">UNE EPM TELECOMUNICACIONES S.A.</option>
												<option value="COLOMBIA MÓVIL S.A. E.S.P.">COLOMBIA MÓVIL S.A. E.S.P.</option>
												<option value="EDATEL S.A.">EDATEL S.A.</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label>Tipo empresa</label>
											<select name="tipoEmpresa" class="form-control">
												<option value="">---------------------------------------------------</option>
												<option value="Publica">Publica</option>
												<option value="Privada">Privada</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label>Sector</label>
											<select name="sector" class="form-control">
												<option value="">---------------------------------------------------</option>
												<?php foreach ($sector as $key) { ?>
													<option value="<?php echo $key['id_sector'] ?>"><?php echo $key['sector'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Fecha de expedición de la certificación (Inicio)</label>
											<input type="date" name="expedicionInicio" id="expedicionInicio" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Fecha de expedición de la certificación (Final)</label>
											<input type="date" name="expedicionFinal" id="expedicionFinal" class="form-control">
										</div>
										<div class="form-group col-md-4">
											<label>Estado</label>
											<select name="estado" id="estado" class="form-control">
												<option value="">---------------------------------------------------</option>
												<option value="Firmado">Firmado</option>
												<option value="Borrador">Borrador</option>
												<option value="Documento enviado">Documento enviado</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Producto</label>
											<select multiple name="producto[]" id="producto" class="form-control" size="6.5">
												<?php foreach ($productos as $key) { ?>
													<option value="<?php echo $key['nombreProducto'] ?>"><?php echo $key['nombreProducto'] ?></option>
												<?php } ?>
											</select><br>
										</div>
										<div class="form-group col-md-6">
											<label>Creador por</label>
											<select name="creador" id="creador" class="form-control">
												<option value="">---------------------------------------------------</option>
												<?php foreach ($creador as $key1) { ?>
													<option value="<?php echo $key1['id_usuario'] ?>"><?php echo $key1['nameUser'] ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group col-md-12">
											<label>Codigos de servicio</label>
											<textarea name="codigoProducto" id="codigoProducto" class="form-control"></textarea>

										</div>
									</div>
									<br>
									<center>
										<input type="submit" value="Consultar" name="accion" class="btn btn-primary">
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>

				<?php include FOLDER_TEMPLATE . "footer.php"; ?>
			</div>
		</div>


	</div>


	<?php include FOLDER_TEMPLATE . "scripts.php"; ?>


	<!--Script menuPrincipal -->
	<script type="text/javascript">
		$("#valorTotal").on({
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
		$("#valorSmlvMin").on({
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
		$("#valorSmlvMax").on({
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


		});
	</script>
	
</body>

</html>