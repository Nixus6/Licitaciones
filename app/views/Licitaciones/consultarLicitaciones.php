<?php //include "../../../config.php"; ?>
<?php
// session_start();
// if (isset($_SESSION['id'])) {
// } else {
//   header('location: ../index.php');
// }
// include("../../models/clases_funciones.php");
// $sentencia  = new conexion;
// $seguimiento = $sentencia->_conexion();
?>
     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-body">

                  <div id="cargando"></div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <center>
                        <h2>Consulta licitaciones</h2>
                      </center><br>
                    </div>
                  </div>
                  <form method="post" action="filtroBusqueda.php">
                    <div class="row justify-content">
                      <div class="col-md-1"></div>
                      <div class="col-md-3">
                        <select class="form-control" name="opciones" id="opcioness" onchange="showCustomer(this.value)">
                          <option value="myse">Myse</option>
                          <option value="nit">Nit</option>
                          <option value="numero">Numero proceso</option>
                          <option value="entidad">Entidad</option>
                          <option value="TL.nombre_sp">Soporte de licitaciones</option>
                          <option value="ES.nombre_estado">Estado</option>
                          <option value="RS.nombre_res">Resultado</option>
                          <option value="todo">Todas las licitaciones</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="datoB">
                      </div>
                      <div class="col-md-1">
                        <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                      </div>
                      <?php
                      if ($_SESSION['rollicita'] === 'Administrador') { ?>
                        <div class="col-md-1">
                          <a class="btn btn-outline-primary" id="export" href="../assets/librerias/excel/exportar.php" hidden="hidden"><i class="fas fa-file-excel"></i> Exportar excel </a>
                        </div>
                      <?php } ?>
                    </div>
                  </form>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info" id="txtHint">
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


<!--<div id="wrapper" class="animate">


  <div class="container-fluid"><br>


  </div>
</div>-->




<style type="text/css">
  /* .table {
    font-size: 12px;
    width: 1250px;
  }

  .th {
    width: 90px
  }

  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 200;
    background: url('../assets/imagenes/loading.gif') 50% 60% no-repeat rgb(249, 249, 249);
    opacity: .5;
  } */
</style>

<script type="text/javascript">
  function showCustomer(str) {
    if (str === "todo") {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          $("#cargando").prop('class', 'loader');
        }
        if (this.status == 200) {
          $("#cargando").prop('class', '');
          $('#export').prop('hidden', false);
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "function/consultarTodo.php?q=" + str, true);
      xhttp.send();
    }
  }
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