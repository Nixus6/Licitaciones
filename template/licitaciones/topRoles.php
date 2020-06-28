<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-toggler-icon leftmenutrigger"></span>
    <a href="http://intranet.tigoune.com.co/"><img src="../assets/imagenes/LOGO.png" style="margin-left: 15%; width: 100px; height: 68px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if ($_SESSION['rol'] === 'Administrador') { ?>
      <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <?php
              $total = $seguimiento->query("SELECT COUNT(*) FROM login where recuperar = '1'");
              foreach ($total as $key) {

                if ($key['COUNT(*)'] > '0') { ?>

                <a class="nav-link" href="../administrador/cambioContrasenas.php"><b><u>Solicitudes(<?php echo $key['COUNT(*)']; ?>)</u></b></a>
            <?php }
              }
              ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    <?php }
    if ($_SESSION['rol'] === 'Asignar') { ?>
      <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    <?php }
    if ($_SESSION['rol'] === 'Usuario') { ?>
      <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>

    <?php } elseif ($_SESSION['rol'] === 'UsuarioCCE') { ?>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          <li class="nav-item">
            <a class="nav-link" href="../administrador/menuAdministrador.php" title="Menu"><i class="fas fa-home"></i>Menu<i class="fas fa-home shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../administrador/agregarLicitacion.php" title="Agregar licitacion"><i class="fas fa-plus-circle"></i>Agregar<i class="fas fa-plus-circle shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultarLicitaciones.php" title="Consultar Licitaciones"><i class="fas fa-search"></i>Licitaciones<i class="fas fa-search shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../administrador/licitacionesTerminadas.php" title="Licitaciones pendientes de adjudicación"><i class="fas fa-check-circle"></i>Pendientes adjudicación<i class="fas fa-check-circle shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    <?php } elseif ($_SESSION['rol'] === 'Govermment' || $_SESSION['rol'] === 'Corporativo' || $_SESSION['rol'] === 'ConsultorVP' || $_SESSION['rol'] === 'Pymes' || $_SESSION['rol'] === 'Whosale') { ?>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">

          <li class="nav-item">
            <a class="nav-link" href="../administrador/menuAdministrador.php" title="Menu"><i class="fas fa-home"></i>Menu<i class="fas fa-home shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultarLicitaciones.php" title="Consultar Licitaciones"><i class="fas fa-search"></i>Licitaciones<i class="fas fa-search shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../administrador/licitacionesTerminadas.php" title="Licitaciones pendientes de adjudicación"><i class="fas fa-check-circle"></i>Pendientes adjudicación<i class="fas fa-check-circle shortmenu animate"></i></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="consultaOportunidad.php" title="Oportunidades"><i class="fas fa-globe"></i>Oportunidad<i class="fas fa-globe shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../administrador/grafica.php" title="Graficos"><i class="fas fa-chart-pie"></i>Graficos<i class="fas fa-chart-pie shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    <?php } ?>

  </nav>