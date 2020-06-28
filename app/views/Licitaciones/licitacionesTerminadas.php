<?php //include "../../../config.php"; 
?>
<?php
// session_start();
// if (isset($_SESSION['id'])) {
//   $_SESSION['rol'] = $_SESSION['rollicita'];
// } else {

//   header('location:../index.php');
// }
// include("app/models/clases_funciones.php");
// $sentencia  = new conexion;
// $seguimiento = $sentencia->_conexion();
?>

<style type="text/css">
  .panel {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 123, 255, 0.8);
    border-radius: 3px;
    cursor: pointer;
    z-index: 0;
    box-shadow: 2px 5px 20px rgba(0, 123, 255, 0.479)
  }

  #contenedorOpciones {
    width: 100%;
  }

  ul#navbarOpciones li a {
    text-decoration: none;
    font-size: 16px;
    padding: 20px 0px;
    text-align: center;
    color: black;
  }

  ul#navbarOpciones .nav-link {
    position: relative;
    z-index: 9999;
  }

  ul#navbarOpciones li {
    width: 33.3333%;
  }

  ul#navbarOpciones {
    display: flex;
    list-style: none;
    margin-left: 0px;
    padding: 0px;
    position: relative;
  }
</style>
<!-- Inicio Modal Actualizar Licitacion -->

<!-- <div class="modal fade" id="miModalLicita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-edit"></i>
        <h2 class="modal-title">Actualizar Licitación en Curso</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="d-flex justify-content-center">
        <ul class="nav bg-light" role="tablist" id="navbarOpciones" style="width: 100%;">
          <li class="nav-item">
            <a href="#sec1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab">Seccion 1</a>
          </li>
          <li class="nav-item">
            <a href="#sec2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab">Seccion 2</a>
          </li>
          <li class="nav-item">
            <a href="#sec3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab">Seccion 3</a>
          </li>
          <div class="panel rounded"></div>
        </ul>
      </div>

      <div class="modal-body">

        <form>
          <div class="tab-content">
            <div class="tab-pane fade show ative" id="sec1" aria-labelledby="step1-tab" role="tabpanel">

              <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Seccion 1</h2>
              <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="first-name"> Myse Licitaciones </label>
                    <input value="<?php //echo $objeto->myse 
                                  ?>" name="myse" type="numer" id="myse" class="form-control" required>
                    <input value="<?php //echo $objeto->myse 
                                  ?>" name="myseH" type="numer" class="form-control" readonly="true" style="background:Yellow;" hidden>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tiproces">Tipo de Proceso </label>
                    <?php
                    // $idPro = $objeto->nombre_tiproces;
                    // $tiproces = $pdo->_comboboxdinamic_campos("tiproces", "nombre_tiproces", $id, "nombre_tiproces", $idPro);
                    // echo $tiproces; 
                    ?>
                    <input value="<?php //echo $objeto->nombre_tiproces 
                                  ?>" name="nombre_tiprocesH" type="numer" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" id="segm">
                    <label for="segmento"> Segmento NP </label>
                    <select name="segmento" id="segmento" class="form-control">
                      <option value="<?php //echo $objeto->segmento 
                                      ?>"><?php //echo $objeto->segmento  
                                          ?> </option>
                      <option value="Google"> Google </option>
                      <option value="Microsoft Azure"> Microsoft Azure </option>
                      <option value="Amazon aws"> Amazon aws </option>
                      <option value="IBM"> IBM </option>
                      <option value="Oracle"> Oracle </option>
                    </select>
                  </div>
                </div>

                <script>
                  // $(document).ready(function() {
                  //     var seg = document.getElementById("segmento").value;
                  //     if (seg === "") {
                  //         $('#segm').hide();
                  //     }
                  // });
                </script>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="objcontra">Objeto del Contrato</label><br>
                    <textarea class="form-control" name="objcontra"><?php //echo $objeto->objcontra; 
                                                                    ?></textarea>
                    <textarea class="form-control" name="objcontraH" readonly="true" style="background:Yellow;" hidden><?php //echo $objeto->objcontra; 
                                                                                                                        ?></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ejecu">Ejecutivo</label>
                    <input value="<?php //echo $objeto->ejecu 
                                  ?>" name="ejecu" type="text" id="ejecu" class="form-control" required>
                    <input class="form-control" value="<?php //echo $objeto->ejecu 
                                                        ?>" name="ejecuH" readonly="true" style="background:Yellow;" hidden>

                    <div id="suggesstion-box"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="first-name"> Sector </label>
                    <?php
                    // $idConcepto = $objeto->nombre_concepto;
                    // $sect  =   $pdo->_comboboxdinamic_campos("sect", "nombre_concepto", $id, "nombre_concepto", $idConcepto);
                    // echo $sect; 
                    ?>
                    <input value="<?php //echo $objeto->nombre_concepto 
                                  ?>" name="nombre_conceptoH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                  </div>
                </div>
                <div class="col-md-4" id="certificados21">
                  <label for="indis">Indicadores Financieros</label>

                  <select id="indis" class="form-control">
                    <?php //if ($objeto->indi_Interes == 'Pendiente') { 
                    ?>
                      <option value="3">Pendiente</option>
                      <option value="1">No Cumple</option>
                      <option value="2">Si Cumple</option>
                      <option value="4">N/A</option>

                    <?php //} 
                    ?>
                    <?php //if ($objeto->indi_Interes == 'N/A') { 
                    ?>
                      <option value="4">N/A</option>
                      <option value="3">Pendiente</option>
                      <option value="1">No Cumple</option>
                      <option value="2">Si Cumple</option>
                    <?php //} 
                    ?>
                    <?php //if (empty($objeto->indi_Interes)) { 
                    ?>
                      <option value="Seleccionar">Seleccionar</option>
                      <option value="2">Si Cumple</option>
                      <option value="1">No Cumple</option>
                      <option value="3">Pendiente</option>
                      <option value="4">N/A</option>

                    <?php //} 
                    ?>

                    <?php //if ($objeto->indi_Interes === "Si") { 
                    ?>
                      <option value="2">Si Cumple</option>
                      <option value="1">No Cumple</option>
                      <option value="3">Pendiente</option>
                      <option value="4">N/A</option>

                    <?php // }
                    // if (strlen($objeto->indi_Interes) > 9 || $objeto->indi_Interes === 'No') { 
                    ?>
                      <option value="1">No Cumple</option>
                      <option value="2">Si Cumple</option>
                      <option value="3">Pendiente</option>
                      <option value="4">N/A</option>

                    <?php //} 
                    ?>
                  </select>

                  <textarea class="form-control" id="profe" value="<?php //echo $objeto->indi_Interes 
                                                                    ?>" disabled><?php //echo $objeto->indi_Interes 
                                                                                  ?></textarea>
                  <input value="<?php //echo $objeto->indi_Interes 
                                ?>" name="indi_InteresH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  <input class="btn btn-primary" type="button" id="probando21" value="+" style="color: #fff!important;
        background-color: #092e6e!important;">
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="Mobs"> Hora Presentacion de Observación </label>
                    <input value="<?php //echo $objeto->Mobs 
                                  ?>" name="Mobs" type="time" id="Mobs" class="form-control" required>
                    <input value="<?php //echo $objeto->Mobs 
                                  ?>" name="MobsH" type="time" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" id="fprese">
                    <label for="Fprese"> Fecha de Manifestación de Interes </label>
                    <input value="<?php //echo $objeto->fechmanifesta 
                                  ?>" name="Fprese" type="date" class="form-control" required>
                    <input value="<?php //echo $objeto->fechmanifesta 
                                  ?>" name="FpreseH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fhcierre">Fecha de Cierre </label>
                    <input value="<?php //echo $objeto->fhcierre 
                                  ?>" name="fhcierre" type="date" id="fhcierre" class="form-control" required>
                    <input value="<?php //echo $objeto->fhcierre 
                                  ?>" name="fhcierreH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="vlofer">Valor Oferta </label>
                    <input value="<?php //echo $vlofer 
                                  ?>" name="vlofer" type="" id="valorOferta" class="form-control" required>
                    <input value="<?php //echo $objeto->vlofer 
                                  ?>" name="vloferH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="propo"> Proponente</label>
                    <?php
                    // $idPro = $objeto->nombre_pro;
                    // $propo = $pdo->_comboboxdinamic_campos("propo", "nombre_pro", $id, "nombre_pro", $idPro);
                    // echo $propo; 
                    ?>
                    <input value="<?php //echo $objeto->nombre_pro 
                                  ?>" name="nombre_proH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="poder"> Poder </label>
                    <?php
                    // $idPoder = $objeto->nombre_poder;
                    // $poder = $pdo->_comboboxdinamic_campos("poder", "nombre_poder", $id, "nombre_poder", $idPoder);
                    // echo $poder; 
                    ?>
                    <input value="<?php //echo $objeto->nombre_poder 
                                  ?>" name="nombre_poderH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estampi"> Requiere pago estampillas </label>
                    <input type="text" name="estampi" class="form-control" value="<?php //echo $objeto->estanpi; 
                                                                                  ?>" required>
                    <input value="<?php //echo $objeto->estanpi 
                                  ?>" name="estampiH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="platafo"> Plataforma </label>
                    <input type="text" name="platafo" class="form-control" value="<?php //echo $objeto->plataforma; 
                                                                                  ?>" required>
                    <input value="<?php //echo $objeto->plataforma 
                                  ?>" name="platafoH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group" id="fhlegal">
                    <label for="fhlegal"> Fecha de legalizacion </label>
                    <input value="<?php //echo $objeto->fhlegal 
                                  ?>" name="fhlegal" type="date" class="form-control">
                    <input value="<?php //echo $objeto->fhlegal 
                                  ?>" name="fhlegalH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="result">Resultado </label>
                    <?php
                    // $idRes = $objeto->nombre_res;
                    // $result = $pdo->_comboboxdinamic_campos("result", "nombre_res", $id, "nombre_res", $idRes);
                    // echo $result; 
                    ?>
                    <input value="<?php //echo $objeto->nombre_res 
                                  ?>" id="resultado" name="nombre_resH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="seg"> Valor de la oferta ganadora </label>
                    <input value="<?php //echo $objeto->vlofergana 
                                  ?>" name="vlofergana" type="" id="valOferGana" class="form-control" required>
                    <input value="<?php //echo $objeto->vlofergana 
                                  ?>" name="vloferganaH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                  </div>
                </div>
                <!-- <?php //if ($respuesta == 0) { 
                      ?>
                                <div class="form-group" id="obligado" style="display:block;">
                                    <label for="obligado"> Obligado ACM </label>
                                    <input type="text" id="obligado1" name="obligado" class="form-control" value="<?php //echo $objetoe->obligado 
                                                                                                                  ?>" required>
                                </div>
                                <div class="form-group" id="ordenc" style="display:block;">
                                    <label for="ordenc"> Orden de compra </label>
                                    <input type="text" id="ordenc1" name="ordenc" class="form-control" value="<?php //echo $objetoe->ordenc 
                                                                                                              ?>" required>
                                </div>
                                <div class="form-group" id="vpntari" style="display:block;">
                                    <label for="vpntari"> VPN tarifa mínima </label>
                                    <input type="text" id="vpntari1" name="vpntari" class="form-control" value="<?php //echo $objetoe->vpntari 
                                                                                                                ?>" required>
                                </div>
                                <div class="form-group" id="ctari" style="display:block;">
                                    <label for="ctari"> Causa tarifa </label>
                                    <input type="text" id="ctari1" name="ctari" class="form-control" value="<?php //echo $objetoe->ctari 
                                                                                                            ?>" required>
                                </div>
                            <?php //} else { 
                            ?>
                                <div class="form-group" id="obligado" style="display:none;">
                                    <label for="obligado"> Obligado ACM</label>
                                    <input type="text" id="obligado1" name="obligado" class="form-control" value="Pendiente" required>
                                </div>
                                <div class="form-group" id="ordenc" style="display:none;">
                                    <label for="ordenc"> Orden de compra </label>
                                    <input type="text" id="ordenc1" name="ordenc" class="form-control" value="Pendiente" required>
                                </div>
                                <div class="form-group" id="vpntari" style="display:none;">
                                    <label for="vpntari"> VPN tarifa mínima </label>
                                    <input type="text" id="vpntari1" name="vpntari" class="form-control" value="Pendiente" required>
                                </div>
                                <div class="form-group" id="ctari" style="display:none;">
                                    <label for="ctari"> Causa tarifa </label>
                                    <input type="text" id="ctari1" name="ctari" class="form-control" value="Pendiente" required>
                                </div>
                            <?php //} 
                            ?> 

                <?php //if ($_SESSION['rollicita'] === 'Administrador') { 
                ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="obCalidadProces"> Observacion Calidad del Proceso </label>
                      <textarea type="text" name="obCalidadProces" class="form-control"><?php //echo $objeto->obCalidadProces; 
                                                                                        ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="imputabilidad"> Imputabilidad </label>
                      <input value="<?php //echo $objeto->imputabilidad 
                                    ?>" type="text" name="imputabilidad" id="imputabilidad" class="form-control">


                      <div id="suggesstion-box2"></div>
                    </div>
                  </div>
                <?php //} 
                ?>

              </div>

            </div>
            <div class="tab-pane fade" id="sec2" aria-labelledby="step2-tab" role="tabpanel">
              Seccion 2
            </div>
            <div class="tab-pane fade" id="sec3" aria-labelledby="step3-tab" role="tabpanel">
              Seccion 3
            </div>
          </div>

        </form>
      </div>
      <!- Fin Seccion 1

      <div class="modal-footer">
        <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="btnActualizar" id="btnActualizar" onclick="ActualizarOportunidad();">Actualizar</button>
      </div>
    </div>

  </div>
</div> -->

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-body">

            <div class="container-fluid">
              <div class="col-md-12">
                <div class="form-group"><br>
                  <center>
                    <h2>Pendientes de adjudicación</h2>
                  </center><br>
                </div>
              </div>
              <form method="post" action="licitacionesTerminadasF.php">
                <div class="row justify-content">

                  <?php if ($_SESSION['PLicitaciones'] == 'Administrador') { ?>
                    <div class="col-md-2">
                      <a class="btn btn-outline-primary" href="../assets/librerias/excel/exportaT.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                    </div>


                  <?php } elseif ($_SESSION['PLicitaciones'] == 'Asignar') { ?>
                    <div class="col-md-2">
                      <a class="btn btn-outline-primary" href="../assets/librerias/excel/exportaT.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                    </div>
                    <div class="col-md-2">
                      <select class="form-control" name="opciones" id="opcioness">
                        <option value="ST.nombre_concepto">Sector</option>
                        <option value="consult">Consultor</option>
                        <option value="TL.nombre_sp">Soporte de licitaciones</option>
                        <option value="ejecu">Ejecutivo</option>
                      </select>
                    </div>
                    <div>
                      <input class="form-control" type="text" name="datoB">
                    </div>
                    &nbsp &nbsp &nbsp &nbsp &nbsp
                    <div>
                      <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                    </div>

                  <?php } elseif ($_SESSION['PLicitaciones'] == 'Usuario') { ?>
                    <div>
                      <a class="btn btn-outline-primary" href="../assets/librerias/excel/exportaT.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                    </div>
                  <?php } elseif ($_SESSION['PLicitaciones'] == 'UsuarioCCE') { ?>
                    <div class="col-md-12">
                      <a class="btn btn-outline-primary" href="../assets/librerias/excel/exportaT.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                    </div>
                  <?php } elseif ($_SESSION['PLicitaciones'] == 'Govermment' || $_SESSION['PLicitaciones'] == 'Corporativo' || $_SESSION['PLicitaciones'] == 'ConsultorVP') { ?>
                    <div class="col-md-2">
                      <select class="form-control" name="opciones" id="opcioness">
                        <option value="ST.nombre_concepto">Sector</option>
                        <option value="consult">Consultor</option>
                        <option value="TL.nombre_sp">Soporte de licitaciones</option>
                        <option value="ejecu">Ejecutivo</option>
                      </select>
                    </div>
                    <div>
                      <input class="form-control" type="text" name="datoB">
                    </div>
                    &nbsp &nbsp &nbsp &nbsp &nbsp
                    <div>
                      <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                    </div>

                  <?php } ?>
                </div>
              </form>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="datatablesPA" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info" onmousedown="return false;" onselectstart="return false;">

                    <thead>
                      <tr>
                        <th colspan="1">Opciones</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Exportar en Formato PDF</th>                      
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 300px;">Fecha y Hora de Cierre</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Soporte a licitaciones</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Myse</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Entidad</th>
                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Número de Proceso</th> -->
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Tipo de proceso</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Oferta en Seguimiento</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Mas Información</th>
                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Estado del proyecto</th> -->
                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Ejecutivo</th> -->
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Opciones</th>
                        <th rowspan="1" colspan="1">Exportar en Formato PDF</th>
                        <th rowspan="1" colspan="1">Fecha y Hora de Cierre</th>
                        <th rowspan="1" colspan="1">Soporte a licitaciones</th>
                        <th rowspan="1" colspan="1">Myse</th>
                        <th rowspan="1" colspan="1">Entidad</th>
                        <!-- <th rowspan="1" colspan="1">Número de Proceso</th> -->
                        <th rowspan="1" colspan="1">Tipo de Proceso</th>
                        <th rowspan="1" colspan="1">Oferta en Seguimiento</th>
                        <th rowspan="1" colspan="1">Mas Información</th>
                        <!-- <th rowspan="1" colspan="1">Estado del proyecto</th> -->
                        <!-- <th rowspan="1" colspan="1">Ejecutivo</th> -->
                      </tr>
                    </tfoot>
                    <!-- <thead>
                      <tr>
                        <th colspan="1">Opciones</th>
                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Exportar en Formato PDF</th>
                        <th>Fecha y Hora de Cierre</th>
                        <th>Estado</th>
                        <th>Ofertas en Seguimiento</th>
                        <th>Entidad</th>
                        <th>Soporte a licitaciones</th>
                        <th>Myse</th>
                        <th>Tipo de proceso</th>
                        <th>Número de Proceso</th>
                        <th>Estado de proyecto</th>
                        <th>Ejecutivo</th>
                        <th>Consultor</th>
                        <th>Sector</th>
                      </tr>
                    </thead> -->

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