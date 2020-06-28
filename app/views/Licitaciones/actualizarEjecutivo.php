<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {

  header('location: ../../index.php');
}
if ($_SESSION['rol'] === 'Usuario' || $_SESSION['rol'] === 'ConsultorVP' || $_SESSION['rol'] === 'Corporativo' || $_SESSION['rol'] === 'Govermment' || $_SESSION['rol'] === 'Pymes' ||  $_SESSION['rol'] === 'Whosale' || $_SESSION['rol'] === 'Asignar' || $_SESSION['rol'] === 'UsuarioCCE') {
  header("Location: menuAdministrador.php");
}
include("../clases/clases_funciones.php");
$id_ejecutivo = $_GET["id_ejecutivo"];
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();

$sentencia = $seguimiento->query("SELECT * FROM ejecutivos WHERE id_ejecutivo = $id_ejecutivo");
foreach ($sentencia as $key) {
  $id_ejecutivo = $key['id_ejecutivo'];
  $nombre = $key['nombre'];
  $consultor = $key['consultor'];
  $id_sector = $key['id_sector'];
  $id_regional = $key['id_regional'];
}

$sentencia2 = $seguimiento->query("SELECT * FROM sptli WHERE nombre_sp = '$nombre'");
$valido_id = '1';
foreach ($sentencia2 as $key2) {
  $valido_id = $key2['valido_id'];
}
?>
<meta charset="UTF-8">
<title>Licitaciones</title>
<link rel="icon" type="../assets/imagenes/jpg" href="../assets/imagenes/LOGO.ico" />
<link href="../assets/css/actualizarEjecutivo.css" type="text/css">
<link rel="icon" type="../assets/css/actualizarEjecutivo.css" href="../assets/imagenes/LOGO.ico" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<LINK REL=StyleSheet HREF="../estilos/estiloPerfiles.css" TYPE="text/css" MEDIA=screen>
<style type="text/css">
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 20px;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 3;
    left: 3;
    right: 3;
    bottom: 3;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked+.slider {
    background-color: #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>

<div id="wrapper" class="animate">
  <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-toggler-icon leftmenutrigger"></span>
    <a href="http://intranet.tigoune.com.co/"><img src="../assets/imagenes/LOGO.png" style="margin-left: 15%; width: 100px; height: 68px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if ($_SESSION['rol'] === 'Administrador') { ?>
      <div class="collapse navbar-collapse" id="navbarText">
        <?php
          include_once "lateral/lateral.php";
          ?>
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
        <?php
          include_once "lateral/lateralAsignar.php"
          ?>
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
        <?php
          include_once "lateral/lateralUsuario.php"
          ?>
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
    <?php } ?>
  </nav>
  <script>
    var VariableSector = "";
  </script>
  <?php
  //Codigo inesesariamente largo para que se vea el Sector y no el id del Sector

  if ($id_sector == 1) {
    $VariableCambianteS = "PRIME";
  };
  if ($id_sector == 2) {
    $VariableCambianteS = "LARGE";
  };
  if ($id_sector == 3) {
    $VariableCambianteS = "GOVERNMENT";
  };
  if ($id_sector == 4) {
    $VariableCambianteS = "WHOSALE";
  };
  if ($id_sector == 5) {
    $VariableCambianteS = "PYMES";
  };

  //Codigo inesesariamente largo para que se vea la Region y no el id de la Region

  if ($id_regional == 1) {
    $VariableCambianteR = "Centro";
  };
  if ($id_regional == 2) {
    $VariableCambianteR = "Eje Cafetero";
  };
  if ($id_regional == 3) {
    $VariableCambianteR = "Nor Occidente";
  };
  if ($id_regional == 4) {
    $VariableCambianteR = "Norte";
  };
  if ($id_regional == 5) {
    $VariableCambianteR = "Oriente";
  };
  if ($id_regional == 6) {
    $VariableCambianteR = "Sur";
  };
  if ($id_regional == 7) {
    $VariableCambianteR = "PENDIENTE";
  };
  ?>

  <div class="container-fluid">
    <br>

    <br>
    <style>
      .form-grup {
        width: 250%;

      }

      .fourm-group {
        width: 250%;
      }

      .form {
        position: absolute;
        left: 35%;
        transform: translate(-35%);
      }

      #fourm-1 {
        width: 123%;
      }

      #fourm-2 {
        width: 120%;
        margin-top: -70px;
        margin-left: 130%;
      }

      #btn {
        width: 250%;
      }

      .title-form {
        width: 200%;
      }
    </style>

    <form action="../administrador/function/editarEjecutivo.php" method="post" autocomplete="off" class="form">
      <div class="title-form">
        <h2 style="text-align: center">Actualizar Ejecutivo</h2>
      </div>
      <br>
      <div class="form-grup">
        <input type="number" name="id_ejecutivo" value="<?php echo $id_ejecutivo ?>" class="form-control" readonly="true" hidden>
      </div>

      <div class="form-grup">
        <label>Nombre del Ejecutivo </label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control">
      </div>
      <br>
      <div class="form-grup">
        <label>Nombre del Consultor</label>
        <input type="text" name="consultor" value="<?php echo $consultor ?>" class="form-control">
      </div>
      <br>

      <div class="fourm-group" id="fourm-1">
        <label>Seleccione el Sector </label>
        <select name="id_sector" class="form-control">
          <option value="<?php echo $id_sector ?>" hidden><?php echo $VariableCambianteS ?></option>
          <option value="1">PRIME</option>
          <option value="2">LARGE</option>
          <option value="3">GOVERMENT</option>
          <option value="4">WHOSALE</option>
          <option value="5">PYMES</option>
        </select>
      </div>
      <div class="fourm-group" id="fourm-2">
        <label>Seleccione la Region </label>
        <select name="id_regional" class="form-control">
          <option value="<?php echo $id_regional ?>" hidden><?php echo $VariableCambianteR ?></option>
          <option value="1">Centro</option>
          <option value="2">Eje Cafetero</option>
          <option value="3">Nor Occidente</option>
          <option value="4">Norte</option>
          <option value="5">Oriente</option>
          <option value="6">Sur</option>
          <option value="7">PENDIENTE</option>
        </select>
      </div>

      <br>
      <input type="submit" class="btn btn" style="background-color: #092e6e;color:#fff" id="btn" value="Actualizar">
      <br>
      <br>
      <input style="width: 250%" class="btn btn-primary" onclick="redireccion()" value="Cancelar">
      <script>
        function redireccion() {
          window.location = 'ejecutivos.php';
          //alert('usted ha pulsado el boton cancelar:(')
        }
      </script>

    </form>

  </div>
</div>
</div>
</div>




<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script type="text/javascript">
  document.getElementById("id_sector").value = VariableSector;



  $(document).ready(function() {
    $('.leftmenutrigger').on('click', function(e) {
      $('.side-nav').toggleClass("open");
      $('#wrapper').toggleClass("open");
      e.preventDefault();
    });
  });
</script>