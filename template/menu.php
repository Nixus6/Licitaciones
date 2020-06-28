		<!--Div para cambiar el color de la barra del menu-->
		<div class="sidebar" data-color="red">
			<!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

			<div class="sidebar-wrapper">

				<nav class="nav">
					<div class="logo">
						<a href="#" class="simple-text logo-normal">
							<center>
								<div class="logoprincipal"><img id="logo" src="<?= URL_IMG ?>LogoLetrasBlancas.png"></div>
							</center>
						</a>

					</div>
					<?php if ($_SESSION['acceso'] == '1') { ?>
						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#user" aria-expanded="false">
								<i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area"></i>
								<p> Certificaciónes
									<b class="caret"></b>
								</p>
							</a>

							<div class="collapse" id="user">
								<ul class="nav">
									<li class="nav-item">
										<a title="Agregar" href="<?php echo SERVERURL; ?>menuAdministrador/">
											<i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>Licitacion.jpg" alt="Logo del Area"></i>
											<p> Licitaciones</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" title="Agregar">
											<i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>Contratacion.jpg" alt="Logo del Area"></i>
											<p> Contrataciones </p>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" title="Agregar">
											<i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>FacturacionSao.jpg" alt="Logo del Area"></i>
											<p> Facturaciones</p>
										</a>
									</li>
								</ul>
							</div>

						</li>

					<?php } elseif ($_SESSION['acceso'] == '3') { ?>

						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#user" aria-expanded="false">
								<i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area"></i>
								<p> Certificaciónes
								</p>
							</a>

						</li>

					<?php } else {
						header('Location:' . SERVERURL . "principal/");
					} ?>
					<div class="logo"></div>


					<li class="nav-item">
						<a href="<?php echo SERVERURL; ?>principal/">
							<i style="color: white;" class="fas fa-home"></i>
							<p>Principal</p>
						</a>
					</li>

					<?php if ($_SESSION['rolcerti'] == "1") { ?>

						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#pages" aria-expanded="false">
								<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>Iconos/license.png"></i>
								<p> Certificación
									<b class="caret"></b>
								</p>
							</a>

							<div class="collapse" id="pages">

								<ul class="nav">
									<li class="nav-item">
										<a href="<?php echo SERVERURL; ?>agregarCertificado/" title="Agregar">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/plus.png"></i>
											<p>Agregar Certificación</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="<?php echo SERVERURL; ?>consultaPersonal/" title="Borradores y enviados">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>Iconos/stamp.png"></i>
											<p>Borradores y enviados</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="<?php echo SERVERURL; ?>GeneralCertificado/" title="Buscar">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/investigate.png"></i>
											<p>Certifiaciones General</p>
										</a>
									</li>
								</ul>

							</div>

						</li>

						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#pagesPeticion" aria-expanded="false">
								<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/questionary.png"></i>
								<p> Peticion
									<b class="caret"></b>
								</p>
							</a>
							<div class="collapse" id="pagesPeticion">

								<ul class="nav">
									<li class="nav-item">
										<a href=" Funciones/crudPeticiones.php?accion=Redireccionar" title="">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/plus.png"></i>
											<p>Agregar Peticion</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="<?php echo SERVERURL; ?>peticionesUsuario/" title="Peticiones Usuario">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/group.png"></i>
											<p>Peticiones Usuario</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="<?php echo SERVERURL; ?>listaPeticiones/" title="">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/investigate.png"></i>
											<p>Lista Peticiones</p>
										</a>
									</li>
								</ul>

							</div>
						</li>

						<li class="">
							<a href="<?php echo SERVERURL; ?>graficoCertificados/" title="Graficos">
								<i class=""><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/bar-chart.png"></i>
								<p>Graficos</p>
							</a>
						</li>

					<?php } else if ($_SESSION['rolcerti'] == "2") { ?>

						<!--<li class="">
                <a href="agregarPeticion.php" title="">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                    <p>Peticion</p>
                </a>
			</li>-->

						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#pages" aria-expanded="false">
								<i class="fas fa-paste"></i>
								<p> Certificación
									<b class="caret"></b>
								</p>
							</a>

							<div class="collapse" id="pages">

								<ul class="nav">
									<li class="nav-item">
										<a href="agregarCertificado.php" title="Agregar">
											<i class="now-ui-icons ui-1_simple-add"></i>
											<p>Agregar Certificación</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="consultaPersonal.php" title="Borradores y enviados">
											<i class="now-ui-icons files_paper"></i>
											<p>Borradores y enviados</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="menuPrincipal.php" title="Buscar">
											<i class="now-ui-icons ui-1_zoom-bold"></i>
											<p>Busqueda Avanzada</p>
										</a>
									</li>
								</ul>

							</div>

						</li>

						<li class="nav-item">

							<a class="nav-link collapsed" data-toggle="collapse" href="#pagesPeticion" aria-expanded="false">
								<i class="fas fa-paste"></i>
								<p> Peticion
									<b class="caret"></b>
								</p>
							</a>
							<div class="collapse" id="pagesPeticion">

								<ul class="nav">

									<li class="">
										<a href="peticionesUsuario.php" title="Peticiones Usuario">
											<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/process.png"></i>
											<p>Peticiones Usuario</p>
										</a>
									</li>

									<li class="">
										<a href=" Funciones/crudPeticiones.php?accion=Redireccionar" title="">
											<i class="now-ui-icons ui-1_simple-add"></i>
											<p>Agregar Peticion</p>
										</a>
									</li>

									<li class="">
										<a href="listaPeticiones.php" title="">
											<i class="now-ui-icons files_single-copy-04"></i>
											<p>Lista Peticiones</p>
										</a>
									</li>
								</ul>
							</div>
						</li>

					<?php } else if ($_SESSION['rolcerti'] == "3") { ?>

						<li class="">
							<a href="agregarCertificado.php" title="Agregar">
								<i class="now-ui-icons ui-1_simple-add"></i>
								<p>Agregar</p>
							</a>
						</li>
						<li class="">
							<a href=" Funciones/crudPeticiones.php?accion=Redireccionar" title="">
								<i class="now-ui-icons ui-1_simple-add"></i>
								<p>Agregar Peticion</p>
							</a>
						</li>
						<li class="">
							<a href="consultaPersonal.php" title="Borradores y enviados">
								<i class="now-ui-icons files_paper"></i>
								<p>Borradores y enviados</p>
							</a>
						</li>

					<?php } else if ($_SESSION['rolcerti'] == "4") { ?>

						<li class="">
							<a href=" Funciones/crudPeticiones.php?accion=Redireccionar" title="">
								<i class="now-ui-icons ui-1_simple-add"></i>
								<p>Agregar Peticion</p>
							</a>
						</li>

						<li class="">
							<a href="listaPeticiones.php" title="">
								<i class="now-ui-icons files_single-copy-04"></i>
								<p>Lista Peticiones</p>
							</a>
						</li>

					<?php } ?>

				</nav>
			</div>
		</div>