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

$rol = $execute->query("SELECT * FROM roles");
?>
<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body class="">
	<div class="wrapper ">

		<div class="main-panel">


			<?php include FOLDER_TEMPLATE . "menu.php"; ?>

			<?php include FOLDER_TEMPLATE . "top.php"; ?>


			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body ">
								<center>
									<h4>Registro de usuarios</h4>
								</center>
								<form method="post" action="Funciones/crudUsuarios.php" autocomplete="off">
									<div class="form-row">
										<div class="form-group col-md-6">
											<div class="form-group">
												<label class="control-label"><b>Nombre</b></label>
												<input name="nameUser" type="text" class="form-control form-control-success" required />
											</div>

											<div class="form-group">
												<label class="control-label"><b> Nombre de Red </b></label>
												<input name="nickname" type="text" class="form-control form-control-success" required />
											</div>
										</div>

										<div class="form-group col-md-6">
											<div class="form-group">
												<label class="control-label"><b> Correo </b></label>
												<input name="correo" type="text" class="form-control form-control-success" required />
											</div>

											<div class="form-group">
												<label class="control-label"><b> Contraseña </b></label>
												<input name="contrasena" type="password" class="form-control form-control-success" required />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label"><b> Rol </b></label>
										<select name="id_rol" id="id_rol" class="form-control" required>
											<option value="">Seleccionar</option>
											<?php foreach ($rol as $key) { ?>
												<option value="<?php echo $key['id_rol'] ?>"><?php echo $key['nombreRol'] ?></option>
											<?php } ?>
										</select>
									</div><br>
									<center><button type="submit" name="accion" value="Registrar" class="btn btn-primary">Registrar</button></center>
								</form>
							</div>
						</div>
					</div>
				</div>

				<?php include FOLDER_TEMPLATE . "footer.php"; ?>

			</div>
		</div>
	</div>
	</div>

	<?php include FOLDER_TEMPLATE . "scripts.php"; ?>

</body>

</html>