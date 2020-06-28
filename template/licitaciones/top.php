<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<div class="navbar-minimize">
				<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
					<i style="color: black;" class="fas fa-bars"></i>
				</button>
			</div>

			<a id="letraP" class="navbar-brand" href="#">Licitaciones</a>
		</div>
		<div style="color:Black;" class="collapse navbar-collapse justify-content-end" id="navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">

						<p style="text-align: center">
						<span id="letra" style="margin-right:5px"><?php echo $_SESSION['Nombre_SL']; ?></span><span id="letra"><?php echo $_SESSION['Apellido_SL']; ?></span>
							<br>
							<span id="letraP">(<?php echo $_SESSION['PLicitaciones']; ?>)</span>
							<br>
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