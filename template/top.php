<!-- Navbar -->
<nav style="margin-bottom: 100%" class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<div class="navbar-minimize">
				<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
					<i style="color: black;" class="fas fa-bars"></i>
				</button>
			</div>

			<a id="letraP" class="navbar-brand" href="#">Certificaciones</a>
		</div>
		<div style="color:Black;" class="collapse navbar-collapse justify-content-end" id="navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">

						<p style="text-align: center">
							<span id="letra"><?php echo $_SESSION['nombre']; ?></span>
							<br>

							<?php if ($_SESSION['rolcerti'] === "1") { ?>
								<span id="letraP" class="">(Coordinador)</span>


							<?php } elseif ($_SESSION['rolcerti'] === "2") { ?>
								<span id="letraP" class="">(Usuario)</span>


							<?php } elseif ($_SESSION['rolcerti'] === "3") { ?>
								<span id="letraP" class="">(Consultar)</span>


							<?php } elseif ($_SESSION['rolcerti'] === "4") { ?>
								<span id="letraP" class="">(Usuario Peticiones)</span>

							<?php } ?>
						</p>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i><img id="photo" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area"></i>
					<p class="d-lg-none d-md-block">
						Account
					</p>
					<div class="ripple-container"></div>
				</a>
				<div style="margin-right: 20px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
					<a class="dropdown-item" href="<?php echo SERVERURL; ?>MiPerfil/">
						<i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/settings.png"></i>
						<p>
							<span id="letra" class="">Mi Perfil</span>
						</p>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../../functions/cerrarSesion.php">
						<i class="fas fa-sign-out-alt"> </i>
						<p>
							<span>Salir</span>
						</p>
					</a>
				</div>
			</ul>
		</div>
	</div>
</nav>

<br>
<br>
<br>
<br>
<br>