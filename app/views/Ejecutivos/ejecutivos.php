<?php include "../../../config.php"; ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
  $_SESSION['rol'] = $_SESSION['id'];
} else {
  header('location: ../../index.php');
}
if ($_SESSION['rol'] === 'Usuario' || $_SESSION['rol'] === 'ConsultorVP' || $_SESSION['rol'] === 'Corporativo' || $_SESSION['rol'] === 'Govermment' || $_SESSION['rol'] === 'Pymes' ||  $_SESSION['rol'] === 'Whosale' || $_SESSION['rol'] === 'Asignar' || $_SESSION['rol'] === 'UsuarioCCE') {
  header("Location: menuAdministrador.php");
}
include("../../models/clases_funciones.php");
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
?>


<?php
$ejecutivos = $sentencia->_consultatablaEjecutivos("ejecutivos");
//$ejecutivos = $sentencia->_consultastablasGenerales("ejecutivos");
/*
  if ($_SESSION['rol'] === 'Administrador') {

    $convertir  = $seguimiento->query("SELECT EJ.id_ejecutivo, EJ.nombre,EJ.consultor,Ej.id_sector,EJ.id_region from ejecutivos EJ
    LEFT OUTER JOIN sect SE ON EJ.id_sector = SE.nombre_concepto
    LEFT OUTER JOIN region RE ON EJ.id_regional = RE.nombre_reg
      ");
  }

  */
?>




<!DOCTYPE html>
<html lang="es">


<?php include FOLDER_TEMPLATE . "head.php"; ?>



<body class="">

  <div class="wrapper ">

    <div class="main-panel" style="width: 100%;">

      <?php include FOLDER_TEMPLATE . "topPrincipal.php"; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card ">

                <div class="card-header">
                  <a href="../Principal.php"><i style="color:black;font-size: 20px;float: right;" class="fas fa-home"></i></a>
                  <center>
                    <h2>Ejecutivos Registrados</h2>
                </div>

                <div class="card-body">

                  <div class="table">
                    <div class="row justify-content">
                      <div class="col-md-3">
                        <input class="form-control" type="text" id="search" placeholder="Buscar" />
                      </div>
                      <div class="col-md-3">
                        <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-outline-primary">Nuevo Ejecutivo</button>
                      </div>
                    </div>
                    <br>
                    <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                      <thead>
                        <tr>
                          <th>
                            <h5>Nombre Ejecutivo</h5>
                          </th>
                          <th>
                            <h5>Consultor</h5>
                          </th>
                          <!-- <th>
                            <h5>Director</h5>
                          </th>
                          <th>
                            <h5>Correo</h5>
                          </th> -->
                          <th>
                            <h5>Sector</h5>
                          </th>
                          <th>
                            <h5>Regional</h5>
                          </th>
                          <th>
                            <h5>Opciones</h5>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ejecutivos as $key) { ?>
                          <td><?php echo $key['nombre']; ?></td>
                          <td><?php echo $key['consultor']; ?></td>
                          <!-- <td><?php echo $key['Director']; ?></td>
                          <td><?php echo $key['Correo']; ?></td> -->
                          <td><?php echo $key['nombre_concepto']; ?></td>
                          <td><?php echo $key['nombre_reg']; ?></td>

                          <td> <a href="actualizarEjecutivo.php?id_ejecutivo=<?php echo $key['id_ejecutivo'] ?>"><span class="fas fa-edit"></a></span></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>





    </div>
  </div>
  <?php include FOLDER_TEMPLATE . "licitaciones/scripts.php"; ?>
</body>

</html>

<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<div id="id01" class="w3-modal">
  <div class="w3-modal-content ">
    <header class="w3-container w3-teal">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
    </header>
    <div class="w3-container">
      <form id="formRegistrarEjecutivo" action="../administrador/function/registrarEjecutivo.php" class="login100-form validate-form" method="post" autocomplete="off">
        <center>
          <h2><img src="../assets/imagenes/cabecera.png">Nuevo Ejecutivo</h2>
        </center>
        <br>
        <!---Nombre Ejecutivo--->
        <label for="clave">Nombre Completo del Ejecutivo</label>
        <input name="nombre" id="nombreEje" placeholder="Escriba el nombre completo del Ejecutivo" class="form-control">
        <br>
        <!---Consultor--->
        <label for="clave">Nombre Completo del Consultor</label>
        <input id="consultor" name="consultor" placeholder="Escriba el nombre completo del Consultor" class="form-control">
        <br>

        <div class="fourm-group">
          <!-- Sector -->
          <label>Seleccione el Sector </label>
          <select name="id_sector" class="form-control">
            <option value="1">PRIME</option>
            <option value="2">LARGE</option>
            <option value="3">GOVERMENT</option>
            <option value="4">WHOSALE</option>
            <option value="5">PYMES</option>
          </select>
          <!-- Region -->
          <label>Seleccione la Region </label>
          <select name="id_regional" class="form-control">
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
        <input class="btn btn-lg btn-primary btn-block" type="submit" style=" color: #fff!important;
                       background-color: #092e6e!important;" name="iniciar" id="btnRegistrarEjecutivos" value="Registrar" />
      </form>

    </div>
  </div>
</div>

<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<script type="text/javascript">
  $('#formRegistrarEjecutivo').submit(function() {
    if ($('#nombreEje').val() !== "") {
      return true;
    } else {
      return false;
    }
  })

  $('"btnRegistrarEjecutivos').click(function() {
    let formulario = $("form").serialize()
    console.log(formulario)
    $("#formRegistrarEjecutivo").submit()
    $("#formRegistrarEjecutivo").validate({
      rules: {
        nombre: {
          require: true
        }
      },
      message: {
        nombre: {
          require: "El campo es obligatoria"
        }
      },
    })
  })

  $(document).ready(function() {
    $('.leftmenutrigger').on('click', function(e) {
      $('.side-nav').toggleClass("open");
      $('#wrapper').toggleClass("open");
      e.preventDefault();
    });
  });
  $(function() {

    $('#search').quicksearch('table tbody tr');
  });
</script>