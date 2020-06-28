<?php //include "../../../config.php"; 
?>
<?php
// session_start();
// if (isset($_SESSION['id'])) {
//   $_SESSION['rol'] = $_SESSION['rollicita'];
// } else {
//   header('location: ../iniciarSesion.php');
// }
//include("../../models/clases_funciones.php");
// $sentencia  = new conexion;
// $seguimiento = $sentencia->_conexion();
?>

<!-- Inicio Modal Actualizar Oportunidad -->

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-edit"></i>
        <h2 class="modal-title">Actualizar Oportunidad</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="id">
          <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Fechas</h2>
          <div class="row justify-content-center">
            <!-- Primera columna -->

            <div class="col-md-4">
              <div class="form-group">
                <label for="fCreacion"> Fecha de Creación</label>
                <br>
                <label style="text-transform: capitalize;color: black;font-size: medium;" id="fCreacion" name="fCreacion"></label>
                <!-- <input type="date" name="fCreacion" class="form-control" id="fCreacion" tabindex="1"> -->
              </div>

              <div class="form-group">
                <label for="estado"> Estado </label>
                <select name="estado" class="form-control" tabindex="11" id="estado">
                  <option value="Pendiente">Pendiente</option>
                  <option value="No participamos">No participamos</option>
                  <option value="En gestión comercial">En gestión comercial</option>
                  <option value="Participamos">Participamos</option>
                </select>
              </div>
            </div>

          </div>
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <label for="fPublicacion"> Fecha de publicación </label>
                <input type="date" name="fPublicacion" class="form-control" id="fPublicacion" tabindex="7">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="fcierre"> Fecha Cierre </label>
                <input type="date" name="fcierre" class="form-control" tabindex="8" id="fcierre">
              </div>
            </div>
          </div>
          <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Información Oportunidad</h2>

          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nomEntidad"> Entidad </label>
                <input type="text" name="nomEntidad" class="form-control" tabindex="2" id="nomEntidad">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numContrato">Número de contrato </label>
                <input type="text" name="numContrato" class="form-control" tabindex="3" id="numContrato">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Objeto"> Objeto </label>
                <textarea name="Objeto" rows="2" class="form-control" tabindex="4" id="Objeto"></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Presu"> Presupuesto </label>
                <input type="" name="Presu" class="form-control" id="Presu" tabindex="5">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="ubicacion"> Ubicación </label>
                <input type="text" name="ubicacion" class="form-control" tabindex="6" id="ubicacion">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="link"> Link </label>
                <input type="text" name="link" class="form-control" tabindex="13" id="link">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="obser"> Observaciones </label>
                <textarea name="obser" class="form-control" tabindex="14" id="obser"></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="MYSE"> Myse </label>
                <input type="number" id="MYSE" name="MYSE" class="form-control" tabindex="12">
              </div>
            </div>
          </div>

          <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Información ...</h2>
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <label for="ejecutivo"> Ejecutivo </label>
                <input type="text" name="ejecu" class="form-control" id="ejecu" tabindex="9">
                <div id="suggesstion-box" style="margin: 1"></div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <label for="Consultor"> Consultor </label>
                <label style="text-transform: capitalize;color: black;font-size: medium;" id="consultor" name="consultor"></label>

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="gerente"> Director </label>
                <label style="text-transform: capitalize;color: black;font-size: medium;" id="gerente" name="gerente"></label>
              </div>
            </div>
            <div class="col-md-4">

              <div class="form-group">
                <label for="sector"> Sector </label>
                <input type="hidden" id="idSector">
                <br>
                <label style="text-transform: capitalize;color: black;font-size: medium;" id="sector" name="sector"></label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="btnActualizar" id="btnActualizar" onclick="ActualizarOportunidad();">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Fin Modal actualizar oportunidad -->

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">

          <div class="card-header">
            <div class="row justify-content center">

              <div class="col-md-12">
                <center>
                  <h2>Oportunidades General</h2>
                </center>
              </div>

            </div>
          </div>
          <div class="card-body">
            <form method="post" action="oportunidadesOtrosF.php">
              <div class="row justify-content center mt-3">
                <?php
                if ($_SESSION['PLicitaciones'] === 'Administrador') { ?>
                  <div class="col-md-3">
                    <a href="../assets/librerias/excel/Oportunidadesp.php" class="btn btn-outline-primary btn-md" value="Exportar"><i class="fas fa-file-excel"></i> Exportar</a>
                  </div>
                <?php } elseif ($_SESSION['PLicitaciones'] === 'Govermment'  || $_SESSION['PLicitaciones'] === 'ConsultorVP' || $_SESSION['PLicitaciones'] === 'Corporativo') { ?>
                  <div class="col-md-3">
                    <a href="../assets/librerias/excel/Oportunidadesp.php" class="btn btn-outline-primary btn-md" value="Exportar"><i class="fas fa-file-excel"></i> Exportar</a>
                  </div>
                <?php } ?>
              </div>
            </form>
            <div class="table-responsive">

              <table id="datatablesOportunidadGeneral" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                <thead>
                  <tr>

                    <th colspan="1">Opciones</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Fecha de Creación</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Fecha de Publicación</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Fecha de Cierre</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Entidad</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Número de contrato</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Objeto</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Presupuesto</th> 
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Ubicación</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Sector</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Consultor</th> 
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Ejecutivo</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Gerente</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Estado</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">MYSE</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">LINK</th>
                    <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Observaciones</th>

                  </tr>
                </thead>



              </table>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>