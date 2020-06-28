<?php include "../../config.php"; ?>

<?php include FOLDER_TEMPLATE."Index/head.php"; ?>

<div class="login-reg-panel">
	<div class="register-info-box">
		<div class="login-logo">
			<img src="<?=URL_IMG?>LOGO.png" alt=""/>
		</div>
	</div>
	<div class="white-panel">
		<form action="Licitacion/administrador/function/envioCorreo.php" method="post" autocomplete="off">
			<div class="form-control">
				<div class="login-show">
					<h2><b> Recuperar contraseña </b></h2>
					<h4><b id="cambio">Licitaciones</b></h4>
					<br>
					<div class="form-group">
						<input name="usuario" class="form-control" placeholder="Escriba su nombre de usuario"style="top:100px" required>
					</div>
					<div class="form-group">
						<select name="optionL" id="optionL" class="form-control" required>
							<option value="">Seleccionar</option>
							<option value="lici">Licitaciones</option>
							<option value="cont">Contratos</option>
							<option value="cer">Certificados</option>
							<option value="fact">Facturacion</option>
						</select>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Recuperar"  />	
					</div>
					<div class="form-group">
						<center><a href="index.php">Iniciar sesión</a></center><br>
					</div><br>
					<div class="alert alert-info">
							¡En construcción! el recuperar contraseña solo esta habilitado por el momento al modulo de licitaciones.
						</div>
					<?php if ($_GET) {?>
						<div class="alert alert-success">
							La solicitud de recuperar contraseña ha sido enviada correctamente.
						</div>
					<?php } ?>
				</div> 
			</div>
		</form>
	</div>


</div>

<?php include FOLDER_TEMPLATE."Index/scripts.php"; ?> 