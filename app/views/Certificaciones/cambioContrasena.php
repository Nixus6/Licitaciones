<?php include "../../../config.php"; ?>

<?php
session_start();
if (isset($_SESSION['idUser'])) {
	include("../../models/conexionCERT.php");
} else {
	header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body class="">
	<div class="wrapper ">

		<?php include FOLDER_TEMPLATE . "menu.php"; ?>

		<div class="main-panel">

			<!-- Navbar -->
			<?php include FOLDER_TEMPLATE . "top.php"; ?>
			<!-- End Navbar -->

			<!-- Start Header -->
			
			<!-- End Header -->

			<!-- Start container -->
			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body ">
								<form action="Funciones/crudUsuarios.php" onsubmit="return validarContrasena();" method="POST">
									<input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
									<div class="form-row">
										<div class="form-group col-md-6">
											<div class="form-group">
												<b><label>Nueva contraseña(*):</label></b>
												<input type="password" name="contraseñaNueva" id="contraseñaNueva" class="form-control">
											</div>
										</div>
										<div class="form-group col-md-6">
											<div class="form-group">
												<b><label>Confirmar contraseña(*):</label></b>
												<input type="password" name="confirmarContraseña" id="confirmarContraseña" class="form-control">
											</div>
										</div>
									</div>
									<center>
										<input type="submit" class="btn btn-primary" name="accion" value="Cambiar contraseña"><br>
										<?php
										if ($_GET) { ?>
											<span class="alert-success">La contraseña se ha cambiado correctamente</span>
										<?php } ?>
										<span class="alert-danger" id="alerta"></span>
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>



			<?php include FOLDER_TEMPLATE . "footer.php"; ?>

		</div>
	</div>

	<?php include FOLDER_TEMPLATE . "scripts.php"; ?>

	<script type="text/javascript">
		function validarContrasena() {
			var p1 = document.getElementById("contraseñaNueva").value;
			var p2 = document.getElementById("confirmarContraseña").value;
			if (p1 != p2) {
				$('#alerta').html("Las contraseñas deben coincidir");
				return false;
			} else {}
			var espacios = false;
			var cont = 0;

			while (!espacios && (cont < p1.length)) {
				if (p1.charAt(cont) == " ")
					espacios = true;
				cont++;
			}

			if (espacios) {
				$('#alerta').html("La contraseña no puede contener espacios en blanco");
				return false;
			}
			if (p1.length == 0 || p2.length == 0) {
				if (p2.length == 0) {
					$('#confirmarContraseña').focus();
				}
				if (p1.length == 0) {
					$('#contraseñaNueva').focus();
				}
				$('#alerta').html("Los campos de la contraseña no pueden quedar vacios");
				return false;
			}
			if (p1.length < 9) {
				$('#alerta').html("La contraseña debe ser minimo de 9 digitos");
				return false;
			}


		}
	</script>

</body>

</html>