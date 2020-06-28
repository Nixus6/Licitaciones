<?php include "../../../config.php"; ?>
<?php
session_start();
if (isset($_SESSION['id'])) {
} else {
  header('location: ../index.php');
}
include("../../models/clases_funciones.php");
$pdo = new conexion;
$id = $_GET["id"];
$llego = false;
if (!empty($_GET["lugar"])) {
  $tabla = $_GET["opcion"];
  $lugar = $_GET["lugar"];
  $dato = $_GET["dato"];
  $llego = true;
} else {
  $llego = false;
}
$seguimiento = $pdo->_conexion();
$sentencia = $seguimiento->prepare("SELECT * FROM seguimiento WHERE id = ?;");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);
$presu = number_format((float) $objeto->Presu);
$mensualidad = number_format((float) $objeto->mensualidad);
$vlofer = number_format((float) $objeto->vlofer);
$myse = $objeto->myse;
$Proid = $objeto->nombre_tiproces;
$sentencia1 = $seguimiento->prepare("SELECT * FROM ecce WHERE myse = ?;");
$sentencia1->execute([$myse]);
$objetoe = $sentencia1->fetch(PDO::FETCH_OBJ);
if ($Proid == "6") {
  if ($objetoe == "") {
    $respuesta = 1;
  } else {
    $respuesta = 0;
  }
} else {
  $respuesta = 1;
}
?>

<!-- <meta charset="UTF-8">
<title>Licitaciones</title>
<link rel="icon" type="../assets/imagenes/jpg" href="../assets/imagenes/LOGO.ico" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<LINK REL=StyleSheet HREF="../estilos/estiloPerfiles2.css" TYPE="text/css" MEDIA=screen> -->

<!-- LIBRERIAS VALIDACION DE FORMULARIO-->
<!-- <script src="../assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="../assets/js/additional-methods.js" type="text/javascript"></script> -->


<style type="text/css">
  #suggesstion-box {
    float: left;
    list-style: none;
    margin-top: -3px;
    padding: 0;
    width: 380px;
    position: absolute;
  }

  #suggesstion-box li {
    padding: 1px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
  }

  #suggesstion-box li:hover {
    background: #405c8c;
    cursor: pointer;
  }

  .alert-error {
    color: red;
  }

  #suggesstion-box2 {
    float: left;
    list-style: none;
    margin-top: -3px;
    padding: 0;
    width: 380px;
  }

  #suggesstion-box2 li {
    padding: 1px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
  }

  #suggesstion-box2 li:hover {
    background: #405c8c;
    cursor: pointer;
  }
</style>



<!DOCTYPE html>
<html lang="es">


<?php include FOLDER_TEMPLATE . "head.php"; ?>



<body class="">

  <div class="wrapper ">


    <?php include FOLDER_TEMPLATE . "licitaciones/menu.php"; ?>

    <div class="main-panel">

      <?php include FOLDER_TEMPLATE . "licitaciones/top.php"; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

                <div class="card-header">
                  <div class="row justify-content center">

                    <div class="col-md-12">
                     
                        <h2 style="margin-left: 200;">Actualizar licitación</h2>
                      
                    </div>

                  </div>
                </div>

                <div class="card-body">

                    <div class="container-fluid">
                      <form method="post" id="actualizarLicitacion" action="../administrador/function/editarLicitacion.php" autocomplete="off">
                        <div class="row justify-content center">
                          <div class="col-md-10">
                            <label for="fCreacion"> Fecha Creacion: <?php echo $objeto->fCreacion ?> </label>


                          </div>
                          <?php if ($_SESSION['rol'] === 'Govermment' || $_SESSION['rol'] == 'Corporativo' || $_SESSION['rol'] === 'ConsultorVP' || $_SESSION['rol'] === 'Pymes' || $_SESSION['rol'] === 'Whosale') {

                            if ($llego === true) { ?>
                              <div class="col-md-2">
                                <a class="btn btn-outline-primary" id="document" href="<?php echo $lugar ?>.php?opciones=<?php echo $tabla; ?>&datoB=<?php echo $dato; ?>&myse=<?php echo $objeto->myse ?>"><i class="fas fa-reply"></i></a>
                                <a class="btn btn-outline-primary" id="document" href="checkList1.php?id=<?php echo $objeto->id ?>&opcion=<?php echo $tabla; ?>&lugar=<?php echo $lugar ?>&dato=<?php echo $dato ?>&myse=<?php echo $objeto->myse ?>"><i class="fas fa-file-alt"></i> CheckList </a>
                              </div>
                            <?php } else { ?>
                              <div class="col-md-2">
                                <a class="btn btn-outline-primary" id="document" href="menuAdministrador.php"><i class="fas fa-reply"></i></a>
                                <a class="btn btn-outline-primary" id="document" href="checkList1.php?id=<?php echo $objeto->id ?>"><i class="fas fa-file-alt"></i> CheckList </a>
                              </div>
                            <?php }
                          } else {

                            if ($llego === true) { ?>
                              <div class="col-md-2">
                                <a class="btn btn-outline-primary" id="document" href="<?php echo $lugar ?>.php?opciones=<?php echo $tabla; ?>&datoB=<?php echo $dato; ?>&myse=<?php echo $objeto->myse ?>"><i class="fas fa-reply"></i></a>
                                <a class="btn btn-outline-primary" id="document" href="checkList.php?id=<?php echo $objeto->id ?>&opcion=<?php echo $tabla; ?>&lugar=<?php echo $lugar ?>&dato=<?php echo $dato ?>&myse=<?php echo $objeto->myse ?>"><i class="fas fa-file-alt"></i> CheckList </a>
                              </div>
                            <?php } else { ?>
                              <div class="col-md-2">
                                <a class="btn btn-outline-primary" id="document" href="menuAdministrador.php"><i class="fas fa-reply"></i></a>
                                <a class="btn btn-outline-primary" id="document" href="checkList.php?id=<?php echo $objeto->id ?>&myse=<?php echo $objeto->myse ?>"><i class="fas fa-file-alt"></i> CheckList </a>
                              </div>
                          <?php }
                          } ?>

                          <input type="hidden" name="id" value="<?php echo $objeto->id; ?>">
                          <input type="hidden" name="resul" id="resul" value="<?php echo $respuesta; ?>">
                          <br><br><br>
                          <!-- Primera columna  -->
                          <div class="col-md-4">


                            <div class="form-group">
                              <label for="first-name"> Myse Licitaciones </label>
                              <input value="<?php echo $objeto->myse ?>" name="myse" type="numer" id="myse" class="form-control" required>
                              <input value="<?php echo $objeto->myse ?>" name="myseH" type="numer" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="tiproces">Tipo de Proceso </label>
                              <?php
                              $idPro = $objeto->nombre_tiproces;
                              $tiproces = $pdo->_comboboxdinamic_campos("tiproces", "nombre_tiproces", $id, "nombre_tiproces", $idPro);
                              echo $tiproces; ?>
                              <input value="<?php echo $objeto->nombre_tiproces ?>" name="nombre_tiprocesH" type="numer" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>

                            <div class="form-group" id="segm">
                              <label for="segmento"> Segmento NP </label>
                              <select name="segmento" id="segmento" class="form-control">
                                <option value="<?php echo $objeto->segmento ?>"><?php echo $objeto->segmento  ?> </option>
                                <option value="Google"> Google </option>
                                <option value="Microsoft Azure"> Microsoft Azure </option>
                                <option value="Amazon aws"> Amazon aws </option>
                                <option value="IBM"> IBM </option>
                                <option value="Oracle"> Oracle </option>
                              </select>
                            </div>
                            <script>
                              $(document).ready(function() {
                                var seg = document.getElementById("segmento").value;
                                if (seg === "") {
                                  $('#segm').hide();
                                }
                              });
                            </script>

                            <div class="form-group">
                              <label for="objcontra">Objeto del contrato</label><br>
                              <textarea class="form-control" name="objcontra"><?php echo $objeto->objcontra; ?></textarea>
                              <textarea class="form-control" name="objcontraH" readonly="true" style="background:Yellow;" hidden><?php echo $objeto->objcontra; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="ejecu">Ejecutivo</label>
                              <input value="<?php echo $objeto->ejecu ?>" name="ejecu" type="text" id="ejecu" class="form-control" required>
                              <input class="form-control" value="<?php echo $objeto->ejecu ?>" name="ejecuH" readonly="true" style="background:Yellow;" hidden>

                              <div id="suggesstion-box"></div>
                            </div>
                            <div class="form-group">
                              <label for="first-name"> Sector </label>
                              <?php
                              $idConcepto = $objeto->nombre_concepto;
                              $sect  =   $pdo->_comboboxdinamic_campos("sect", "nombre_concepto", $id, "nombre_concepto", $idConcepto);
                              echo $sect; ?>
                              <input value="<?php echo $objeto->nombre_concepto ?>" name="nombre_conceptoH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>

                            <div class="form-group">
                              <div class="row justify-content center">
                                <div class="col-md-12">
                                  <label for="indis">Indicadores Financieros</label>
                                </div>


                                <div class="col-md-4" id="certificados21">
                                  <select id="indis" class="form-control">
                                    <?php if ($objeto->indi_Interes == 'Pendiente') { ?>
                                      <option value="3">Pendiente</option>
                                      <option value="1">No Cumple</option>
                                      <option value="2">Si Cumple</option>
                                      <option value="4">N/A</option>

                                    <?php } ?>
                                    <?php if ($objeto->indi_Interes == 'N/A') { ?>
                                      <option value="4">N/A</option>
                                      <option value="3">Pendiente</option>
                                      <option value="1">No Cumple</option>
                                      <option value="2">Si Cumple</option>
                                    <?php } ?>
                                    <?php if (empty($objeto->indi_Interes)) { ?>
                                      <option value="Seleccionar">Seleccionar</option>
                                      <option value="2">Si Cumple</option>
                                      <option value="1">No Cumple</option>
                                      <option value="3">Pendiente</option>
                                      <option value="4">N/A</option>

                                    <?php } ?>

                                    <?php if ($objeto->indi_Interes === "Si") { ?>
                                      <option value="2">Si Cumple</option>
                                      <option value="1">No Cumple</option>
                                      <option value="3">Pendiente</option>
                                      <option value="4">N/A</option>

                                    <?php }
                                    if (strlen($objeto->indi_Interes) > 9 || $objeto->indi_Interes === 'No') { ?>
                                      <option value="1">No Cumple</option>
                                      <option value="2">Si Cumple</option>
                                      <option value="3">Pendiente</option>
                                      <option value="4">N/A</option>

                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group" class="col-md-10">
                                  <textarea class="form-control" id="profe" value="<?php echo $objeto->indi_Interes ?>" disabled><?php echo $objeto->indi_Interes ?></textarea>
                                  <input value="<?php echo $objeto->indi_Interes ?>" name="indi_InteresH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>

                                </div>
                                <div class="col-md-1">
                                  <input class="btn btn-primary" type="button" id="probando21" value="+" style="color: #fff!important;
        background-color: #092e6e!important;">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="Mobs"> Hora presentacion de observación </label>
                              <input value="<?php echo $objeto->Mobs ?>" name="Mobs" type="time" id="Mobs" class="form-control" required>
                              <input value="<?php echo $objeto->Mobs ?>" name="MobsH" type="time" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group" id="fprese">
                              <label for="Fprese"> Fecha de manifestación de interes </label>
                              <input value="<?php echo $objeto->fechmanifesta ?>" name="Fprese" type="date" class="form-control" required>
                              <input value="<?php echo $objeto->fechmanifesta ?>" name="FpreseH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>

                            <div class="form-group">
                              <label for="fhcierre">Fecha de cierre </label>
                              <input value="<?php echo $objeto->fhcierre ?>" name="fhcierre" type="date" id="fhcierre" class="form-control" required>
                              <input value="<?php echo $objeto->fhcierre ?>" name="fhcierreH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="vlofer">Valor Oferta </label>
                              <input value="<?php echo $vlofer ?>" name="vlofer" type="" id="valorOferta" class="form-control" required>
                              <input value="<?php echo $objeto->vlofer ?>" name="vloferH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="propo"> Proponente</label>
                              <?php
                              $idPro = $objeto->nombre_pro;
                              $propo = $pdo->_comboboxdinamic_campos("propo", "nombre_pro", $id, "nombre_pro", $idPro);
                              echo $propo; ?>
                              <input value="<?php echo $objeto->nombre_pro ?>" name="nombre_proH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="poder"> Poder </label>
                              <?php
                              $idPoder = $objeto->nombre_poder;
                              $poder = $pdo->_comboboxdinamic_campos("poder", "nombre_poder", $id, "nombre_poder", $idPoder);
                              echo $poder; ?>
                              <input value="<?php echo $objeto->nombre_poder ?>" name="nombre_poderH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="estampi"> Requiere pago estampillas </label>
                              <input type="text" name="estampi" class="form-control" value="<?php echo $objeto->estanpi; ?>" required>
                              <input value="<?php echo $objeto->estanpi ?>" name="estampiH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="platafo"> Plataforma </label>
                              <input type="text" name="platafo" class="form-control" value="<?php echo $objeto->plataforma; ?>" required>
                              <input value="<?php echo $objeto->plataforma ?>" name="platafoH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group" id="fhlegal">
                              <label for="fhlegal"> Fecha de legalizacion </label>
                              <input value="<?php echo $objeto->fhlegal ?>" name="fhlegal" type="date" class="form-control">
                              <input value="<?php echo $objeto->fhlegal ?>" name="fhlegalH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="result">Resultado </label>
                              <?php
                              $idRes = $objeto->nombre_res;
                              $result = $pdo->_comboboxdinamic_campos("result", "nombre_res", $id, "nombre_res", $idRes);
                              echo $result; ?>
                              <input value="<?php echo $objeto->nombre_res ?>" id="resultado" name="nombre_resH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="seg"> Valor de la oferta ganadora </label>
                              <input value="<?php echo $objeto->vlofergana ?>" name="vlofergana" type="" id="valOferGana" class="form-control" required>
                              <input value="<?php echo $objeto->vlofergana ?>" name="vloferganaH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <?php if ($respuesta == 0) { ?>
                              <div class="form-group" id="obligado" style="display:block;">
                                <label for="obligado"> Obligado ACM </label>
                                <input type="text" id="obligado1" name="obligado" class="form-control" value="<?php echo $objetoe->obligado ?>" required>
                              </div>
                              <div class="form-group" id="ordenc" style="display:block;">
                                <label for="ordenc"> Orden de compra </label>
                                <input type="text" id="ordenc1" name="ordenc" class="form-control" value="<?php echo $objetoe->ordenc ?>" required>
                              </div>
                              <div class="form-group" id="vpntari" style="display:block;">
                                <label for="vpntari"> VPN tarifa mínima </label>
                                <input type="text" id="vpntari1" name="vpntari" class="form-control" value="<?php echo $objetoe->vpntari ?>" required>
                              </div>
                              <div class="form-group" id="ctari" style="display:block;">
                                <label for="ctari"> Causa tarifa </label>
                                <input type="text" id="ctari1" name="ctari" class="form-control" value="<?php echo $objetoe->ctari ?>" required>
                              </div>
                            <?php } else { ?>
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
                            <?php } ?>

                            <?php if ($_SESSION['rol'] === 'Administrador') { ?>
                              <div class="form-group">
                                <label for="obCalidadProces"> Observacion Calidad del Proceso </label>
                                <textarea type="text" name="obCalidadProces" class="form-control"><?php echo $objeto->obCalidadProces; ?></textarea>
                              </div>

                              <div class="form-group">
                                <label for="imputabilidad"> Imputabilidad </label>
                                <input value="<?php echo $objeto->imputabilidad ?>" type="text" name="imputabilidad" id="imputabilidad" class="form-control">


                                <div id="suggesstion-box2"></div>
                              </div>

                            <?php } ?>

                          </div>

                          <!-- Segunda columna  -->
                          <div class="col-md-4">

                            <div class="form-group">
                              <label for="first-name"> Nit </label>
                              <input value="<?php echo $objeto->nit ?>" name="nit" type="text" id="nit" class="form-control">
                              <input value="<?php echo $objeto->nit ?>" name="nitH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="stadpro">Estado del proyecto</label>
                              <?php
                              $idstapro = $objeto->nombre_stadpro;
                              $stadpro = $pdo->_comboboxdinamic_campos("stadpro", "nombre_stadpro", $id, "nombre_stadpro", $idstapro);
                              echo $stadpro;   ?>
                              <input value="<?php echo $objeto->nombre_stadpro ?>" name="nombre_stadproH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="traza">Trazabilidad</label><br>
                              <textarea class="form-control" name="traza"><?php echo $objeto->traza; ?></textarea>
                              <textarea hidden class="form-control" name="trazaH" readonly="true" style="background:Yellow;"><?php echo $objeto->traza; ?></textarea>


                            </div>
                            <div class="form-group">
                              <label for="consul">Consultor</label>
                              <input value="<?php echo $objeto->consult ?>" name="consul" type="text" id="consul" class="form-control" required>
                              <input value="<?php echo $objeto->consult ?>" name="consulH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="first-name"> Numero Proceso </label>
                              <input value="<?php echo $objeto->numero ?>" name="numero" type="texcert" id="numero" class="form-control" required>
                              <input value="<?php echo $objeto->numero ?>" name="numeroH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="Mprese"> Medio de presentacion de observación </label>
                              <input value="<?php echo $objeto->Mprese ?>" name="Mprese" type="text" id="Mprese" class="form-control" required>
                              <input value="<?php echo $objeto->Mprese ?>" name="MpreseH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group" style="margin-top: -1">
                              <label for="rfcarma"> Carta de manifestación de interes </label>
                              <input value="<?php echo $objeto->rfcarma ?>" name="rfcarma" type="text" id="rfcarma" class="form-control" required>
                              <input value="<?php echo $objeto->rfcarma ?>" name="rfcarmaH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group" id="hprese">
                              <label for="Hprese"> Hora de manifestación de interes </label>
                              <input value="<?php echo $objeto->Hprese ?>" name="Hprese" type="time" class="form-control" required>
                              <input value="<?php echo $objeto->Hprese ?>" name="HpreseH" type="time" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="prese">Hora de presentación de la oferta</label>
                              <input value="<?php echo $objeto->prese ?>" name="prese" type="time" id="prese" class="form-control" required>
                              <input value="<?php echo $objeto->prese ?>" name="preseH" type="time" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group" style="margin-top: 18">
                              <label for="plzejecu">Plazo de ejecucion (Meses) </label>
                              <input value="<?php echo $objeto->plzejecu ?>" name="plzejecu" type="number" id="plazoEjecucion" class="form-control" required>
                              <input value="<?php echo $objeto->plzejecu ?>" name="plzejecuH" type="number" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="sptli">Soporte Licitaciones</label>
                              <?php
                              $idSp = $objeto->nombre_sp;
                              $sptli = $pdo->soporte2("sptli", "nombre_sp", $id, "nombre_sp", $idSp);
                              echo $sptli; ?>
                              <input value="<?php echo $objeto->nombre_sp ?>" name="nombre_spH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="seg"> Cobertura del proyecto</label>
                              <input value="<?php echo $objeto->coberturaProy ?>" name="cobertura" type="text" id="cobertura" class="form-control" required>
                              <input value="<?php echo $objeto->coberturaProy ?>" name="coberturaH" type="text" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group" id="porcentajePO">
                              <label for="hora">Porcentaje de poliza</label>
                              <input type="" name="PorcenP" id="porcentajePOO" class="form-control" max="100" value="<?php echo $objeto->porceP ?>" required>
                              <input value="<?php echo $objeto->porceP ?>" name="PorcenPH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="mysexp"> Myse experiencia</label>
                              <input type="" name="mysexp" class="form-control" value="<?php echo $objeto->MYSExp; ?> " required>
                              <input value="<?php echo $objeto->MYSExp ?>" name="mysexpH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="UserP"> Usuario </label>
                              <input type="text" name="UserP" class="form-control" value="<?php echo $objeto->plataformaU; ?>" required>
                              <input value="<?php echo $objeto->plataformaU ?>" name="UserPH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group" id="indicador">
                              <label for="indicador"> Fecha Indicador / habilitantes </label>
                              <input value="<?php echo $objeto->indicador ?>" name="indicador" id="indicador" type="date" class="form-control">
                              <input value="<?php echo $objeto->indicador ?>" name="indicadorH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                              <input type='hidden' id='i' value="0">
                              <span id="errorindicador" class="alert-error"></span>
                            </div>


                            <div class="form-group">
                              <label for="causal">Causales </label>
                              <?php
                              $idCausal = $objeto->nombre_causal;
                              $causal = $pdo->_comboboxdinamic_campos("causal", "nombre_causal", $id, "nombre_causal", $idCausal);
                              echo $causal; ?>
                              <input value="<?php echo $objeto->nombre_causal ?>" name="nombre_causalH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                              <span id="errorCausal" class="alert-warning"></span>
                            </div>

                            <div class="form-group" id="ofertasEnSeguimiento">
                              <label for="seg"> Oferta en seguimiento </label>
                              <?php
                              $idSeg = $objeto->nombre_seg;
                              $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                              echo $seg; ?>
                              <input value="<?php echo $objeto->nombre_seg ?>" name="nombre_segH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <?php if ($respuesta == 0) { ?>
                              <div class="form-group" id="vtIVA" style="display:block;">
                                <label for="hora">Valor total adjudicado con IVA</label>
                                <input type="" id="vtIVA1" name="vtIVA" class="form-control" value="<?php echo $objetoe->vtIVA ?>" required>
                              </div>
                              <div class="form-group" id="ebitda" style="display:block;">
                                <label for="ebitda"> EBITDA UNE </label>
                                <input type="text" id="ebitda1" name="ebitda" class="form-control" value="<?php echo $objetoe->ebitda ?>" required>
                              </div>
                              <div class="form-group" id="fechaoc" style="display:block;">
                                <label for="fechaoc"> Fecha inicio orden de compra </label>
                                <input type="Date" id="fechaoc1" name="fechaoc" class="form-control" value="<?php echo $objetoe->fechaoc ?>" required>
                              </div>
                              <div class="form-group" id="tarim" style="display:block;">
                                <label for="tarim"> Tarifa mínima </label>
                                <input type="text" id="tarim1" name="tarim" class="form-control" value="<?php echo $objetoe->tarim ?>" required>
                              </div>
                              <div class="form-group" id="ebitdatm" style="display:block;">
                                <label for="ebitdatm"> Ebitda de tarifa mínima </label>
                                <input type="text" id="ebitdatm1" name="ebitdatm" class="form-control" value="<?php echo $objetoe->ebitdatm ?>" required>
                              </div>
                            <?php } else { ?>
                              <div class="form-group" id="vtIVA" style="display:none;">
                                <label for="hora">Valor total adjudicado con IVA</label>
                                <input type="text" id="vtIVA1" name="vtIVA" class="form-control" value="Pendiente" required>
                              </div>
                              <div class="form-group" id="ebitda" style="display:none;">
                                <label for="ebitda"> EBITDA UNE </label>
                                <input type="text" id="ebitda1" name="ebitda" class="form-control" value="Pendiente" required>
                              </div>
                              <div class="form-group" id="fechaoc" style="display:none;">
                                <label for="fechaoc"> Fecha inicio orden de compra </label>
                                <input type="Date" id="fechaoc1" name="fechaoc" class="form-control" value="1000-01-01" required>
                              </div>
                              <div class="form-group" id="tarim" style="display:none;">
                                <label for="tarim"> Tarifa mínima </label>
                                <input type="text" id="tarim1" name="tarim" class="form-control" value="Pendiente" required>
                              </div>
                              <div class="form-group" id="ebitdatm" style="display:none;">
                                <label for="ebitdatm"> Ebitda de tarifa mínima </label>
                                <input type="text" id="ebitdatm1" name="ebitdatm" class="form-control" value="Pendiente" required>
                              </div>
                            <?php } ?>

                            <?php if ($_SESSION['rol'] === 'Administrador') { ?>
                              <div class="form-group">
                                <label for="obFallaProces"> Observacion Falla del Proceso </label>
                                <textarea type="text" name="obFallaProces" class="form-control"><?php echo $objeto->obFallaProces; ?></textarea>
                              </div>
                            <?php } else { ?>
                              <div class="form-group">
                                <label for="obFallaProces"> Observacion Falla del Proceso </label>
                                <textarea type="text" name="" class="form-control" readonly="true"><?php echo $objeto->obFallaProces; ?></textarea>
                              </div>
                            <?php } ?>

                            <div class="form-group" id="fecAreaTec">
                              <label for="fecAreaTec"> Fecha de Entrega Oferta Area Tecnica </label>
                              <input value="<?php echo $objeto->fecAreaTec ?>" name="fecAreaTec" id="fecAreaTec" type="date" class="form-control">

                              <input type='hidden' id='i' value="0">
                              <span id="errorFecAreaTec" class="alert-error"></span>
                            </div>

                          </div>



                          <!-- Tercera columna  -->

                          <div class="col-md-4">


                            <div class="form-group">
                              <label for="first-name">Entidad </label>
                              <input value="<?php echo $objeto->entidad ?>" name="entidad" type="text" id="entidad " class="form-control" required>
                              <input value="<?php echo $objeto->entidad ?>" name="entidadH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>

                            <div class="form-group" id="estado">
                              <label for="estado">Estado </label>
                              <?php
                              $idEstado = $objeto->nombre_estado;
                              $estado = $pdo->_comboboxdinamic_campos("estado", "nombre_estado", $id, "nombre_estado", $idEstado);
                              echo $estado;   ?>
                              <input value="<?php echo $objeto->nombre_estado ?>" name="nombre_estadoH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group" id="product2">
                              <div class="row justify-content center">
                                <div class="col-md-12">
                                  <label for="product">Producto/s</label>
                                </div>
                                <div class="col-md-10">
                                  <textarea class="form-control" type="product1" name="product" id="product1"><?php echo $objeto->product; ?></textarea>
                                  <input value="<?php echo $objeto->product ?>" name="productH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                                </div>
                                <div class="col-md-1">
                                  <input class="btn btn-primary" type="button" id="probando5" value="+" style="color: #fff!important;
        background-color: #092e6e!important;">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="region">Region</label>
                              <?php
                              $idRegion = $objeto->nombre_reg;
                              $region = $pdo->_comboboxdinamic_campos("region", "nombre_reg", $id, "nombre_reg", $idRegion);
                              echo $region; ?>
                              <input value="<?php echo $objeto->nombre_reg ?>" name="nombre_regH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="aboga">Abogado Asignado</label>
                              <?php
                              $idAboga = $objeto->nombre_aboga;
                              $aboga = $pdo->_comboboxdinamic_campos("aboga", "nombre_aboga", $id, "nombre_aboga", $idAboga);
                              echo $aboga; ?>
                              <input value="<?php echo $objeto->nombre_aboga ?>" name="nombre_abogaH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="fhobs"> Fecha de observación </label>
                              <input value="<?php echo $objeto->fhobs ?>" name="fhobs" type="date" id="fhobs" class="form-control" required>
                              <input value="<?php echo $objeto->fhobs ?>" name="fhobsH" type="date" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group" id="mc">
                              <label for="mc"> Medio de manifestacion de interes</label>
                              <input value="<?php echo $objeto->mc ?>" name="mc" type="text" id="mc" class="form-control" required>
                              <input value="<?php echo $objeto->mc ?>" name="mcH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>

                            <div class="form-group">
                              <label for="hopre">Medio de presentación de la oferta </label>
                              <input value="<?php echo $objeto->hopre ?>" name="hopre" type="text" id="hopre" class="form-control" required>
                              <input value="<?php echo $objeto->hopre ?>" name="hopreH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="Presu">Presupuesto</label>
                              <input value="<?php echo $presu ?>" name="Presu" id="Presupuesto" type="text" class="form-control" required>
                              <input value="<?php echo $presu ?>" name="PresuH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <label for="ejecu">Mensualidad</label>
                              <input value="<?php echo $mensualidad ?>" id="mensualidad" class="form-control" disabled>
                              <input value="<?php echo $mensualidad ?>" name="mensualidadH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>

                            <div class="form-group">
                              <div class="row justify-content center">
                                <div class="col-md-12">
                                  <label for="cerpree">Requiere certificados</label>
                                </div>
                                <div class="col-md-4" id="certificados1">
                                  <select id="cerpree" class="form-control">
                                    <?php if ($objeto->cerpre == 'Pendiente') { ?>
                                      <option value="3">Pendiente</option>
                                      <option value="1">Si</option>
                                      <option value="2">No</option>
                                    <?php } ?>
                                    <?php if (empty($objeto->cerpre)) { ?>
                                      <option value="Seleccionar">Seleccionar</option>
                                      <option value="2">No</option>
                                      <option value="1">Si</option>
                                      <option value="3">Pendiente</option>
                                    <?php } ?>
                                    <?php if ($objeto->cerpre === "No") { ?>
                                      <option value="2">No</option>
                                      <option value="1">Si</option>
                                      <option value="3">Pendiente</option>
                                    <?php }
                                    if (strlen($objeto->cerpre) > 9 || $objeto->cerpre === 'Si') { ?>
                                      <option value="1">Si</option>
                                      <option value="2">No</option>
                                      <option value="3">Pendiente</option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group" class="col-md-10">
                                  <input class="form-control" type="text" id="pro" value="<?php echo $objeto->cerpre ?>" disabled>
                                  <input value="<?php echo $objeto->cerpre ?>" name="cerpreH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                                </div>
                                <div class="col-md-1">
                                  <input class="btn btn-primary" type="button" id="probando" value="+" style="color: #fff!important; background-color: #092e6e!important;">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="ingPreve"> Ingeniero preventa </label>
                              <input type="text" name="ingPreve" class="form-control" value="<?php echo $objeto->ingPropu ?>">
                              <input value="<?php echo $objeto->ingPropu ?>" name="ingPreveH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                              <span id="erroringenieroPreventa" class="alert-error"></span>
                            </div>

                            <div class="form-group">
                              <label for="tipoPoliza">Requiere poliza</label>
                              <select name="tipoPoli" id="tipoPoliza" class="form-control">
                                <option value="<?php echo $objeto->tipPoli ?>"><?php echo $objeto->tipPoli ?></option>
                                <option value="No">No</option>
                                <option value="Garantia de seriedad de la oferta">Garantia de seriedad de la oferta</option>
                                <option value="Pendiente">Pendiente</option>
                              </select>
                              <input value="<?php echo $objeto->tipPoli ?>" name="tipoPoliH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                            </div>
                            <div class="form-group">
                              <label for="vigPro"> Vigencia de la propuesta en dias </label>
                              <input type="number" name="vigPro" class="form-control" value="<?php echo $objeto->vigeDia ?>" required>
                              <input value="<?php echo $objeto->vigeDia ?>" name="vigProH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                            </div>
                            <div class="form-group">
                              <div class="row justify-content center">
                                <div class="col-md-12"><label for="contraP"> Contraseña </label></div>
                                <div class="col-md-10"><input type="password" id="password" name="contraP" class="form-control" value="<?php echo $objeto->plataformaC; ?>"></div>
                                <input value="<?php echo $objeto->plataformaC ?>" name="contraPH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>
                                <div class="col-md-1"><a class="btn btn-outline-primary" onclick="mostrarContrasena()"><i class="fas fa-eye"></i></a></div>
                              </div>
                            </div>
                            <div class="form-group" id="hora">
                              <label for="hora"> Hora de Indicador </label>
                              <input value="<?php echo $objeto->hora ?>" name="horaIndicador" type="time" class="form-control">
                              <input value="<?php echo $objeto->hora ?>" name="horaIndicadorH" type="time" class="form-control" readonly="true" style="background:Yellow;" hidden>

                              <input type="hidden" id="h" value="0">
                              <span id="errorhoraindicador" class="alert-error"></span>
                            </div>

                            <input type="hidden" name="empre" id="empre" value="0">
                            <div class="form-group" id="empgana2" style="display:block;">
                              <label for="empgana">Empresa Ganadora</label>
                              <div class="row justify-content center">
                                <div class="col-md-10">
                                  <?php
                                  $idEmpre = $objeto->empgana;
                                  $empganat = $pdo->_comboboxdinamic_campos("empresag", "empgana", $id, "empgana", $idEmpre);
                                  echo $empganat;  ?>
                                  <input value="<?php echo $objeto->empgana ?>" name="empganaH" type="" class="form-control" readonly="true" style="background:Yellow;" hidden>

                                </div>
                                <div class="col-md-1">
                                  <input class="btn btn-primary" type="button" id="max" name="max" value="+" style="color: #fff!important;background-color: #092e6e!important;">
                                </div>
                              </div>
                            </div>
                            <div class="form-group" id="empgana1" style="display:none;">
                              <label for="empgana">Empresa Ganadora</label>
                              <div class="row justify-content center">
                                <div class="col-md-10" id="empganaText">
                                  <input class="form-control" type="text" id="empganaz" name="empganaz">
                                  <span class="alert-info" id="emp"></span>
                                </div>
                                <div class="col-md-1">
                                  <input class="btn btn-primary" type="button" id="max1" name="max1" value="+" style="color: #fff!important;background-color: #092e6e!important;">
                                </div>
                              </div>
                            </div>



                            <?php if ($respuesta == 0) { ?>
                              <div class="form-group" id="acum" style="display:block;">
                                <label for="acum"> Acuerdo Marco </label>
                                <input type="text" id="acum1" name="acum" class="form-control" value="<?php echo $objetoe->acum ?>" required>
                              </div>
                              <div class="form-group" id="tipoeventu" style="display:block;">
                                <label for="tipoeventu"> Tipo de evento para Une </label>
                                <select name="tipoeventu" id="tipoeventu1" class="form-control">
                                  <option value="<?php echo $objetoe->tipoeventu ?>"><?php echo $objetoe->tipoeventu ?></option>
                                  <option value="Nuevo UNE">Nuevo UNE</option>
                                  <option value="Nuevo CCE">Nuevo CCE</option>
                                  <option value="Renovacion">Renovacion</option>
                                </select>
                              </div>
                              <div class="form-group" id="vpn" style="display:block;">
                                <label for="vpn"> VPN marginal </label>
                                <input type="text" id="vpn1" name="vpn" class="form-control" value="<?php echo $objetoe->vpn ?>" required>
                              </div>
                              <div class="form-group" id="targetari" style="display:block;">
                                <label for="targetari"> Target tarifa </label>
                                <input type="text" id="targetari" name="targetari" class="form-control" value="<?php echo $objetoe->targetari ?>" required>
                              </div>
                            <?php } else { ?>
                              <div class="form-group" id="acum" style="display:none;">
                                <label for="acum"> Acuerdo Marco </label>
                                <input type="text" id="acum1" name="acum" class="form-control" value="Pendiente" required>
                              </div>
                              <div class="form-group" id="tipoeventu" style="display:block;">
                                <label for="tipoeventu"> Tipo de evento para UNE </label>
                                <select name="tipoeventu" id="tipoeventu1" class="form-control">
                                  <option value="Pendiente">Pendiente</option>
                                  <option value="Nuevo UNE">Nuevo UNE</option>
                                  <option value="Nuevo CCE">Nuevo CCE</option>
                                  <option value="Renovacion">Renovacion</option>
                                </select>
                              </div>
                              <div class="form-group" id="vpn" style="display:none;">
                                <label for="vpn"> VPN marginal </label>
                                <input type="text" id="vpn1" name="vpn" class="form-control" value="Pendiente" required>
                              </div>
                              <div class="form-group" id="targetari" style="display:none;">
                                <label for="targetari"> Target tarifa </label>
                                <input type="text" id="targetari" name="targetari" class="form-control" value="Pendiente" required>
                              </div>
                            <?php } ?>
                            <div class="form-group" id="ofertasEnSeguimiento2">
                            </div>

                            <?php if ($_SESSION['rol'] === 'Administrador') { ?>
                              <div class="form-group">
                                <label for="accionPreCor"> Accion Preventiva/Correctiva </label>
                                <textarea type="text" name="accionPreCor" class="form-control"><?php echo $objeto->accionPreCor; ?></textarea>
                              </div>
                            <?php } ?>

                            <div class="form-group" id="hora">
                              <label for="hora"> Hora De Entrega Oferta Area Tecnica </label>
                              <input value="<?php echo $objeto->horAreaTec ?>" id="horAreaTec" name="horAreaTec" type="time" class="form-control">

                              <input type="hidden" id="h" value="0">
                              <span id="errorHorAreaTec" class="alert-error"></span>
                            </div>




                          </div>

                          <div id="registerLE" class="col-md-12">
                            <?php if ($_SESSION['rol'] === 'Asignar' || $_SESSION['rol'] === 'Usuario' || $_SESSION['rol'] === 'UsuarioCCE') {
                              if ($objeto->nombre_res == "1" || $objeto->nombre_res == "5") { ?>
                                <center>
                                  <span class="alert-info">No se pueden guardar cambios (Contactar con un administrador)</span><br>
                                  <span class="alert-info">El resultado de la licitación es: <br> Adjudicado o Perdido .</span>
                                </center>
                              <?php } else { ?>
                                <center><input class="btn btn-outline-primary" type="submit" id="btnactualizarLicitacion" onclick="funcionValirdar()" value="Actualizar"></center>
                              <?php }
                            } elseif ($_SESSION['rol'] === 'Administrador') { ?>
                              <center><input class="btn btn-outline-primary" type="submit" id="btnactualizarLicitacion" onclick="funcionValirdar()" value="Actualizar"></center>
                            <?php } else {
                            } ?>
                          </div>

                          <!-- Modal de certificaciones -->
                          <!-- <div id="id01" class="w3-modal">
                            <div class="w3-modal-content " style="width: 650px;">
                              <header class="w3-container w3-teal">
                                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" style=" color: #fff!important;
      background-color: #092e6e!important;">&times;</span>
                              </header>
                              <div class="w3-container">
                                <div class="row justify-content center">
                                  <div class="col-md-12 " style="margin: 2rem;">
                                    <center>
                                      <h2>Certificados</h2>
                                    </center>
                                  </div>
                                  <div class="col-md-12" style="margin: 10px;">
                                    <div class="form-group">
                                      <input type="checkbox" id="checkbox1" value="OHSAS 18001"> - OHSAS 18001
                                      <input type="checkbox" id="checkbox2" value="ISO9001"> - ISO9001
                                      <input type="checkbox" id="checkbox3" value="ISO14001"> - ISO14001
                                      <input type="checkbox" id="checkbox4" value="ISO27001"> - ISO27001
                                      <input type="checkbox" id="checkbox5" value="NTCGP1000"> - NTCGP1000
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="probando4" style="width: 95%; margin: 10px;" type="text" name="cerpre" value="<?php echo $objeto->cerpre ?>">
                                  </div>
                                  <div class="col-md-12">
                                    <div class="alert alert-info col-md-12">
                                      <strong>Sugerencia:</strong> Si deseea agregar otro certificado, colocar una coma y especifique el nombre.
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="alert alert-warning col-md-12">
                                      <strong>Advertencia!</strong> Recuerde no repetir los certificados ya mostrados,
                                    </div>
                                  </div>
                                  <div class="col-md-5" style="margin-left: 38%;">
                                    <input class="btn btn-primary" type="button" id="probando2" type="button" style="margin: 1rem; color: #fff!important; background-color: #092e6e!important;" value="Aceptar" />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                          <!-- Modal de Indicadores -->
                          <!-- <div id="id03" class="w3-modal">
                            <div class="w3-modal-content " style="width: 650px;">
                              <header class="w3-container w3-teal">
                                <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright" style=" color: #fff!important;
      background-color: #092e6e!important;">&times;</span>
                              </header>
                              <div class="w3-container">
                                <div class="row justify-content center">
                                  <div class="col-md-12 " style="margin: 2rem;">
                                    <center>
                                      <h2>Indicadores Financieros</h2>
                                    </center>
                                  </div>
                                  <div class="col-md-12" style="margin: 10px;">
                                    <div class="form-group">
                                      <input type="checkbox" id="checkboxxx1" value="Razon de Cobertura de Interes"> -Razon de Cobertura de Interes<br>
                                      <input type="checkbox" id="checkboxxx2" value="Indice de Liquidez"> -Indice de Liquidez<br>
                                      <input type="checkbox" id="checkboxxx3" value="Rentabilidad del Activo"> -Rentabilidad del Activo<br>
                                      <input type="checkbox" id="checkboxxx4" value="Rentabilidad del Patrimonio"> -Rentabilidad del Patrimonio<br>
                                      <input type="checkbox" id="checkboxxx5" value="Capital del Trabajo"> -Capital del Trabajo<br>
                                      <input type="checkbox" id="checkboxxx6" value="Capacidad de Endeudamiento"> -Capacidad de Endeudamiento<br>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="probando24" style="width: 95%; margin: 10px;" type="text" name="indi_Interes" value="<?php echo $objeto->indi_Interes ?>">
                                  </div>
                                  <div class="col-md-12">
                                    <div class="alert alert-info col-md-12">
                                      <strong>Sugerencia:</strong> Si deseea agregar otro Indicador, colocar una coma y especifique el nombre.
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="alert alert-warning col-md-12">
                                      <strong>Advertencia!</strong> Recuerde no repetir los Indicadores ya mostrados,
                                    </div>
                                  </div>
                                  <div class="col-md-5" style="margin-left: 38%;">
                                    <input class="btn btn-primary" type="button" id="probando22" type="button" style="margin: 1rem; color: #fff!important; background-color: #092e6e!important;" value="Aceptar" />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->

                          <!-- Modal de productos -->
                          <!-- <div id="id02" class="w3-modal">
                            <div class="w3-modal-content " style="width: 650px;">
                              <header class="w3-container w3-teal">
                                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright" style=" color: #fff!important;
      background-color: #092e6e!important;">&times;</span>
                              </header>
                              <div class="w3-container">
                                <div class="row justify-content center">
                                  <div class="col-md-12 " style="margin: 2rem;">
                                    <center>
                                      <h2> Productos </h2>
                                    </center>
                                  </div>
                                  <div class="col-md-12" style="margin: 10px;">
                                    <div class="form-group">
                                      <input type="checkbox" id="checkboxx1" value="Cableado estructurado"> - Cableado estructurado
                                      <input type="checkbox" id="checkboxx2" value="CCT"> - CCT
                                      <input type="checkbox" id="checkboxx3" value="Centro de gestión"> - Centro de gestión <br>
                                      <input type="checkbox" id="checkboxx4" value="Comunicaciones unificadas"> - Comunicaciones unificadas
                                      <input type="checkbox" id="checkboxx5" value="Conectividad"> - Conectividad
                                      <input type="checkbox" id="checkboxx6" value="Datacenter"> - Datacenter <br>
                                      <input type="checkbox" id="checkboxx7" value="Gestión vehicular"> - Gestión vehicular
                                      <input type="checkbox" id="checkboxx8" value="Hardware y software"> - Hardware y software
                                      <input type="checkbox" id="checkboxx9" value="Licencias"> - Licencias
                                      <input type="checkbox" id="checkboxx10" value="M2m"> - M2m <br>
                                      <input type="checkbox" id="checkboxx11" value="Seguridad gestionada"> - Seguridad gestionada
                                      <input type="checkbox" id="checkboxx12" value="Solución integral"> - Solución integral
                                      <input type="checkbox" id="checkboxx13" value="Soporte y mesa de ayuda"> - Soporte y mesa de ayuda <br>
                                      <input type="checkbox" id="checkboxx14" value="Telefonía móvil"> - Telefonía móvil
                                      <input type="checkbox" id="checkboxx15" value="Venta de equipos"> - Venta de equipos
                                      <input type="checkbox" id="checkboxx16" value="Zona wifi"> - Zona wifi <br>
                                      <input type="checkbox" id="checkboxx17" value="Videoconferencias y audiencias virtuales"> - Videoconferencias y audiencias virtuales
                                      <input type="checkbox" id="checkboxx18" value="Internet Dedicado"> - Internet Dedicado
                                      <br>
                                    </div>
                                  </div>
                                  <div class="col-md-6" style="margin-left: 38%; margin-top: 2rem;">
                                    <div class="form-group">
                                      <input class="btn btn-primary" type="button" id="probando3" type="button" style="color: #fff!important; background-color: #092e6e!important;" value="Aceptar" />
                                      <input class="btn btn-primary" type="button" id="probando8" type="button" style="color: #fff!important; background-color: #092e6e!important;" value="Vaciar " />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->


                        </div>
                      </form>
                      --
                    </div>
                 



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


<?php
//---------------------------------------------------
$consulta = $pdo->_conexion();
$query = $consulta->prepare("SELECT * FROM  causal WHERE id = ?;");
$query->execute([$idCausal]);
$obj = $query->fetch(PDO::FETCH_OBJ);

//---------------------------------------------------
?>



<script type="text/javascript">
  <?php
  //Aqui traemos el año actual y el año pasado para un correcto funcionamiento de las fechas
  $year = date("Y");
  $lastYear = $year - 1;
  ?>


  //Validacion Para campos obligatorios por evento

  function funcionValirdar() {

    variableNombre_tiproces = document.getElementsByName('nombre_tiproces')[0].value;
    variableNombre_estado = document.getElementsByName('nombre_estado')[0].value;
    variableIndicador = document.getElementsByName('indicador')[0].value;
    variableHoraIndicador = document.getElementsByName('horaIndicador')[0].value;

    $('#actualizarLicitacion').submit(function() {

      console.log(<?= $year ?>);
      if ((variableNombre_tiproces === "2" || variableNombre_tiproces === "3" || variableNombre_tiproces === "4" || variableNombre_tiproces === "7" ||
          variableNombre_tiproces === "8" || variableNombre_tiproces === "9" || variableNombre_tiproces === "10" || variableNombre_tiproces === "14" ||
          variableNombre_tiproces === "15" || variableNombre_tiproces === "16" || variableNombre_tiproces === "17" || variableNombre_tiproces === "18" ||
          variableNombre_tiproces === "19" || variableNombre_tiproces === "20" || variableNombre_tiproces === "22" ||
          variableNombre_tiproces === "23") && (variableNombre_estado === "4" || variableNombre_estado === "7") &&
        ((variableIndicador < "<?= $lastYear ?>-01-01" || variableIndicador > "<?= $year ?>-12-31") || (variableHoraIndicador === "01:00"))) {

        $('#errorindicador').html('campo obligatorio');
        $('#errorhoraindicador').html('campo obligatorio');
        return false;


      } else {
        $('#errorindicador').html('');
        $('#errorhoraindicador').html('');
        return true;
      }
    });


  }
</script>

<!--**************************************************************-->
<script type="text/javascript">
  $('#actualizarLicitacion').submit(function() {

    var estado = document.getElementsByName('nombre_estado')[0].value;
    var ingPreve = document.getElementsByName('ingPreve')[0].value;
    var Abogado = document.getElementsByName('nombre_aboga')[0].value;

    console.log('estado: ' + estado);
    console.log('ing preventa:' + ingPreve);
    console.log('abogado:' + Abogado);


    if (estado == '2') {
      console.log('si es igual a dos');
      if (ingPreve == 'Pendiente' || ingPreve == '') {
        console.log('si es igual a pendiente');
        $('#erroringenieroPreventa').html('campo obligatorio');
        return false;
      } else {
        return true;
      }

    }

  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var tipoProce = $('#nombre_tiproces').val();
    var producto = $('#product').val();
    var estado = $('#nombre_estado').val();
    var estadoPro = $('#nombre_stadpro').val();
    var resultado = $('#nombre_res').val();
    var empresag = $('#empgana').val();
    // $('#nombre_concepto').css('pointer-events', 'none');
    $('#product1').css('pointer-events', 'none');
    $('#nombre_reg').css('pointer-events', 'none');
    $('#consul').prop('readonly', true);
    if (tipoProce === "1" || tipoProce === "4" || tipoProce === "12" || tipoProce === "13" || tipoProce === "23") {
      $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="1">Documentación enviada</option><option value="2">En Proceso</option><option value="3">No participamos</option><option value="5">Suspendido</option></select>');
      $('#nombre_estado').val(estado);


    } else {
      $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="1">Documentación enviada</option><option value="2">En Proceso</option><option value="3">No participamos</option><option value="4">Oferta presentada</option><option value="5">Suspendido</option></select>');
      $('#nombre_estado').val(estado);
    }

    if (tipoProce === "5") {
      $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="2">En Proceso</option><option value="5">Suspendido</option><option value="7">Oferta presentada - Estudio Mercado</option></select>');
      $('#nombre_estado').val(estado);
    }
    if (tipoProce === "24" || tipoProce === "25") {
      $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="<?php echo $objeto->nombre_estado ?>"><?php if ($idEstado === "1") {
                                                                                                                                                                                        echo "Documentación enviada";
                                                                                                                                                                                      } else if ($idEstado == "2") {
                                                                                                                                                                                        echo "En Proceso";
                                                                                                                                                                                      } else if ($idEstado == "2") {
                                                                                                                                                                                        echo "En Proceso";
                                                                                                                                                                                      } else if ($idEstado == "3") {
                                                                                                                                                                                        echo "No participamos";
                                                                                                                                                                                      } else if ($idEstado == "4") {
                                                                                                                                                                                        echo "Oferta presentada";
                                                                                                                                                                                      } else if ($idEstado === "5") {
                                                                                                                                                                                        echo "Suspendido";
                                                                                                                                                                                      }  ?></option><option value="1">Documentación enviada</option><option value="4">Oferta presentada</option></select>');

    }

    if (tipoProce === '28') {
      $('#product2').html('<div style="margin-top: 24;"></div><label>Producto</label><input type="hidden" name="producto11" id="producto11" value="<?php echo $objeto->product; ?>"><br><select class="form-control" name="product" id="producto" required><option value="Certificado digital">Certificado digital</option><option value="Colocation">Colocation</option><option value="Horas experto">Horas experto</option><option value="Laas procesamiento, almacenamiento">Laas procesamiento, almacenamiento</option><option value="Laas procesamiento, almacenamiento,pass">Laas procesamiento, almacenamiento,pass</option><option value="Pass">Pass</option></select>');
      var producto = $('#producto11').val();
      $('#producto').val(producto);
      $('#ofertasEnSeguimiento').html('');
      $('#ofertasEnSeguimiento2').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                          $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                          echo $seg; ?>');
      $('#vtIVA').css('display', 'block');
      $('#acum').css('display', 'block');
      $('#obligado').css('display', 'block');
      $('#ebitda').css('display', 'block');
      $('#tipoeventu').css('display', 'block');
      $('#vpn').css('display', 'block');
      $('#ordenc').css('display', 'block');
      $('#fechaoc').css('display', 'block');
      $('#fechafoc').css('display', 'block');
      $('#ctari').css('display', 'block');
      $('#targetari').css('display', 'block');
      $('#tarim').css('display', 'block');
      $('#ebitdatm').css('display', 'block');
      $('#vpntari').css('display', 'block');
    } else {
      $('#vtIVA').css('display', 'none');
      $('#acum').css('display', 'none');
      $('#obligado').css('display', 'none');
      $('#ebitda').css('display', 'none');
      $('#tipoeventu').css('display', 'none');
      $('#vpn').css('display', 'none');
      $('#ordenc').css('display', 'none');
      $('#fechaoc').css('display', 'none');
      $('#fechafoc').css('display', 'none');
      $('#ctari').css('display', 'none');
      $('#targetari').css('display', 'none');
      $('#tarim').css('display', 'none');
      $('#ebitdatm').css('display', 'none');
      $('#vpntari').css('display', 'none');
    }

    if (estadoPro === '1') {
      $('#nombre_estado option[value="1"]').hide();
      $('#nombre_estado option[value="4"]').hide();
      $('#nombre_estado option[value="7"]').hide();
      if (estado === "2" || estado === "5") {
        $('#nombre_res option[value="1"]').hide();
        $('#nombre_res option[value="2"]').hide();
        $('#nombre_res option[value="3"]').hide();
        $('#nombre_res option[value="4"]').hide();
        $('#nombre_res option[value="5"]').hide();
        $('#nombre_res option[value="7"]').hide();
      } else {
        $('#nombre_res option[value="1"]').show();
        $('#nombre_res option[value="2"]').show();
        $('#nombre_res option[value="3"]').show();
        $('#nombre_res option[value="4"]').show();
        $('#nombre_res option[value="5"]').show();
        $('#nombre_res option[value="7"]').show();
      }

    } else {
      $('#nombre_estado option[value="1"]').show();
      $('#nombre_estado option[value="4"]').show();
      $('#nombre_estado option[value="7"]').show();
    }

    if (resultado === "1") {
      $('#empgana2').html('<label for="empgana">Empresa Ganadora</label><div class="row justify-content center"><div class="col-md-10"><select class="form-control"   name="empgana" id="empgana" required><option value="4">Colombia Movil S.A E.S.P</option><option value="7">Edatel S.A.</option><option value="22">Une EPM Telecomunicaciones S.A.</option><option value="26">UT Une - Edatel</option></select></div><div><input type="button" <input class="btn btn-primary" type="button" id="max" name="max" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
      $('#empgana').val(empresag);
    } else {
      $('#empgana2').html('<label for="empgana">Empresa Ganadora</label><div class="row justify-content center"><div class="col-md-10"><?php $idEmpre = $objeto->empgana;
                                                                                                                                        $empganat = $pdo->_comboboxdinamic_campos("empresag", "empgana", $id, "empgana", $idEmpre);
                                                                                                                                        echo $empganat;  ?></div><div><input class="btn btn-primary" type="button" id="max" name="max" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
    }
    if (resultado === "5") {
      $('#nombre_causal option[value="8"]').hide();
      $('#nombre_causal option[value="16"]').hide();
      $('#empgana2').html('<label for="empgana">Empresa Ganadora</label><div class="row justify-content center"><div class="col-md-10"><?php $idEmpre = $objeto->empgana;
                                                                                                                                        $empganat = $pdo->_comboboxdinamic_campos("empresag", "empgana", $id, "empgana", $idEmpre);
                                                                                                                                        echo $empganat;  ?></div><div><input class="btn btn-primary" type="button"id="max" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
      $('#empgana option[value="4"]').hide();
      $('#empgana option[value="7"]').hide();
      $('#empgana option[value="22"]').hide();
      $('#empgana option[value="26"]').hide();
    } else {
      $('#nombre_causal option[value="8"]').show();
      $('#nombre_causal option[value="16"]').show();
    }



    var porcen = $("#porcentajePOO").val();
    var tipo = $("#tipoPoliza").val();
    if (tipo === 'No' || tipo === 'Pendiente') {
      $('#porcentajePOO').prop("value", '0%');
      $('#porcentajePO').prop("hidden", true);

    } else {
      $('#porcentajePO').prop("hidden", false);
      $('#ofertasEnSeguimiento').html('');
      $('#ofertasEnSeguimiento2').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                          $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                          echo $seg; ?>');
    }
  });




  function mostrarContrasena() {
    var tipo = document.getElementById("password");
    if (tipo.type == "password") {
      tipo.type = "text";
    } else {
      tipo.type = "password";
    }
  }






  $(document).ready(function() {
    $('.leftmenutrigger').on('click', function(e) {
      $('.side-nav').toggleClass("open");
      $('#wrapper').toggleClass("open");
      e.preventDefault();
    });
  });

  $("#Presupuesto").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
      });
    }
  });
  $("#mensu").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
      });
    }
  });
  $("#vtIVA1").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
      });
    }
  });

  $("#ebitda1").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\[^A-Za-z]/g, "")
          .replace(/[^0-9-,]/g, '') + '%';
      });
    }
  });
  $("#ebitdatm1").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\[^A-Za-z]/g, "")
          .replace(/[^0-9-,]/g, '') + '%';
      });
    }
  });
  $("#valOferGana").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
      });
    }
  });

  $("#valorOferta").on({
    "focus": function(event) {
      $(event.target).select();
    },


    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");

      });
    }

  });





  $("#porcentajePOO").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\[^A-Za-z]/g, "")
          .replace(/[^0-9-,]/g, '') + '%';
      });
    }
  });

  $(document).ready(function() {

    $('#tipoPoliza').change(function(e) {
      if ($(this).val() === "Pendiente" || $(this).val() === "No") {
        $('#porcentajePOO').prop("value", '0');
        $('#porcentajePO').prop("hidden", true);
        $('#ofertasEnSeguimiento2').html('');
        $('#ofertasEnSeguimiento').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                          $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                          echo $seg; ?>');
      } else {
        $('#porcentajePOO').prop("value", '0');
        $('#porcentajePO').prop("hidden", false);
        $('#ofertasEnSeguimiento').html('');
        $('#ofertasEnSeguimiento2').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                            $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                            echo $seg; ?>');
      }
    })
  });

  $(document).ready(function() {
    $('#probando5').click(function() {
      $('#id02').css('display', 'block');
    });
  });

  $(document).ready(function() {
    $('#probando3').click(function() {
      $('#id02').css('display', 'none');
    });
  });
  $(document).ready(function() {
    $('#probando8').click(function() {
      $('#product1').val('');
    });
  });


  $(document).ready(function() {
    $('#nombre_estado').change(function(e) {
      if ($('#nombre_res').val() === '6' && $('#nombre_causal').val() === '8') {
        $('#errorCausal').html('Es obligatorio este campo, el estado de la licitación es no participamos.');
        $('#nombre_causal').html("<div class='form-group'><label for='causal'>Causales </label><select class='form-control' name='nombre_causal id='nombre_causal' required><option value=''></option><option value='1'>Adjudicado</option><option value='2'>Alcance Tecnico</option><option value='3'>Cerrado por la entidad</option><option value='4'>Error en la plataforma SECOP II</option><option value='5'>Error en la plataforma del cliente</option><option value='6'>Limitado a mi Pymes</option><option value='7'>Modelo financiero</option><option value='9'>Precio</option><option value='10'>Requisitos Habilitantes</option><option value='11'>Requisitos Legales</option><option value='12'>Precio + Calidad</option><option value='13'>Precio Artifc. Bajo</option><option value='14'>Pendiente</option></select><option value='15'>Indicadores Financieros</option><option value='16'>Por Definir</option><option value='17'>Se presenta en Nicaragua</option></div><input value='<?php echo $objeto->nombre_causal ?>' name='nombre_causalH' type='' class='form - control' readonly='true' style='background: Yellow' hidden><span id = 'errorCausal'  class = 'alert-warning'>< /span>");

      }

      if ($(this).val() === "7") {
        $('#nombre_res').val('4');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#empgana').val('27');
        $('#nombre_res option[value="4"]').show();
        $('#nombre_res option[value="6"]').hide();
        $('#nombre_res option[value="9"]').hide();

      }
      if ($(this).val() === "4") {
        $('#nombre_res').val('7');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#empgana').val('27');
        $('#nombre_res option[value="4"]').hide();
        $('#nombre_res option[value="6"]').hide();
        $('#nombre_res option[value="9"]').hide();
      }
      if ($(this).val() === "3") {
        $('#nombre_res').val('6');
        $('#nombre_causal').focus();
        $('#nombre_causal').val('');
        $('#nombre_res option[value="4"]').show();
        $('#nombre_res option[value="6"]').show();
        $('#nombre_res option[value="9"]').show();
        $('#errorCausal').html('Es obligatorio este campo, el estado de la licitación es no participamos.');
        $('#nombre_causal').html("<div class='form-group'><label for='causal'>Causales </label><select class='form-control' name='nombre_causal id='nombre_causal' required><option value=''></option><option value='1'>Adjudicado</option><option value='2'>Alcance Tecnico</option><option value='3'>Cerrado por la entidad</option><option value='4'>Error en la plataforma SECOP II</option><option value='5'>Error en la plataforma del cliente</option><option value='6'>Limitado a mi Pymes</option><option value='7'>Modelo financiero</option><option value='9'>Precio</option><option value='10'>Requisitos Habilitantes</option><option value='11'>Requisitos Legales</option><option value='12'>Precio + Calidad</option><option value='13'>Precio Artifc. Bajo</option><option value='14'>Pendiente</option></select><option value='15'>Indicadores Financieros</option><option value='16'>Por Definir</option><option value='17'>Se presenta en Nicaragua</option></div><input value='<?php echo $objeto->nombre_causal ?>' name='nombre_causalH' type='' class='form - control' readonly='true' style='background: Yellow' hidden><span id = 'errorCausal'  class = 'alert-warning'>< /span>");
        $('#nombre_causal').change(function(e) {
          $('#errorCausal').html('');
        })
      }
      if ($(this).val() === "1" && $('#nombre_tiproces').val() == "23") {
        $('#nombre_res').val('4');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#empgana').val('27');
        $('#nombre_res option[value="4"]').show();
        $('#nombre_res option[value="6"]').show();
        $('#nombre_res option[value="9"]').show();
      }
      if ($(this).val() === "2" || $(this).val() === "5") {
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#nombre_res option[value="4"]').show();
        $('#nombre_res option[value="6"]').show();
        $('#nombre_res option[value="9"]').show();
      }
    })
  });
  $(document).ready(function() {
    $('#max1').on('click', function(e) {
      var empganaz = $("#empganaz").val();
      $.ajax({
        'url': 'function/registroEmpresa.php',
        'type': 'POST',
        'data': {
          'empganaz': empganaz
        },
        success: function(data) {
          $('#empganaText').prop("class", 'col-md-12');
          $('#emp').html('La proxima vez la empresa registrada aparecera en la lista desplegable');
          setTimeout(function() {
            $('#emp').html('');
          }, 3000);
        }
      });
    });
  });

  $(document).ready(function() {
    $('#max').click(function() {
      $('#empgana1').css('display', 'block');
      $('#empgana2').css('display', 'none');
      $('#empre').prop("value", '1');
    });
  });

  $(document).ready(function() {
    $('#max1').click(function() {
      $('#max1').css('display', 'none');
      alert('Empresa registrada');
    });
  });


  $(document).ready(function() {
    $('#probando').click(function() {
      $('#id01').css('display', 'block');
    });
  });
  $(document).ready(function() {
    $('#probando21').click(function() {
      $('#id03').css('display', 'block');
    });
  });



  $(document).ready(function() {
    $('#probando2').click(function() {
      $('#id01').css('display', 'none');
    });
  });
  $(document).ready(function() {
    $('#probando22').click(function() {
      $('#id03').css('display', 'none');
    });
  });



  $(document).ready(function() {
    $('#cerpree').change(function(e) {
      if ($(this).val() === "2") {
        $('#id01').css('display', 'none');
        $('#probando4').val("No");

      }
      if ($(this).val() === "1") {
        $('#id01').css('display', 'block');
        $('#probando4').val("Si");
      }
      if ($(this).val() === "3") {
        $('#probando4').val("Pendiente");
        $('#id01').css('display', 'none');
      }

    });
  });

  $(document).ready(function() {
    $('#indis').change(function(e) {
      if ($(this).val() === "2") {
        $('#id03').css('display', 'none');
        $('#probando24').val("Si");

      }
      if ($(this).val() === "1") {
        $('#id03').css('display', 'block');
        $('#probando24').val("No");
      }
      if ($(this).val() === "3") {
        $('#probando24').val("Pendiente");
        $('#id03').css('display', 'none');
      }
      if ($(this).val() === "4") {
        $('#probando24').val("N/A");
        $('#id03').css('display', 'none');
      }

    });
  });

  $(document).ready(function() {
    $('#cerpree').change(function(e) {
      if ($(this).val() === "2") {
        $('#probando4').val("No");
        $('#probando').prop("hidden", true);
        $('#certificados1').prop("class", 'col-md-4');

      }
      if ($(this).val() === "3") {
        $('#probando').prop("hidden", true);
        $('#probando4').val("Pendiente");
        $('#certificados1').prop("class", 'col-md-4');
      }
      if ($(this).val() === "1") {
        $('#probando').prop("hidden", false);
        $('#certificados1').prop("class", 'col-md-4');
      }

    })
  });

  $(document).ready(function() {
    $('#indis').change(function(e) {
      if ($(this).val() === "2") {
        $('#probando24').val("Si");
        $('#probando21').prop("hidden", true);
        $('#certificados21').prop("class", 'col-md-4');

      }
      if ($(this).val() === "3") {
        $('#probando21').prop("hidden", true);
        $('#probando24').val("Pendiente");
        $('#certificados21').prop("class", 'col-md-4');
      }
      if ($(this).val() === "1") {
        $('#probando21').prop("hidden", false);
        $('#certificados21').prop("class", 'col-md-4');
      }

    })
  });


  $(document).ready(function() {
    $('#nombre_tiproces').change(function(e) {
      if ($(this).val() === "1" || $(this).val() === "4" || $(this).val() === "12" || $(this).val() === "13" || $(this).val() === "23") {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="">Seleccione</option><option value="1">Documentación enviada</option><option value="2">En Proceso</option><option value="3">No participamos</option><option value="5">Suspendido</option></select>');
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');

      } else {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="">Seleccione</option><option value="1">Documentación enviada</option><option value="2">En Proceso</option><option value="3">No participamos</option><option value="4">Oferta presentada</option><option value="5">Suspendido</option></select>');
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
      }

      if ($(this).val() === "5") {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="">Seleccione</option><option value="2">En Proceso</option><option value="5">Suspendido</option><option value="7">Oferta presentada - Estudio Mercado </option><option value="3">No Participamos </option></select>');
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
      }
      if ($(this).val() === "24" || $(this).val() == "25") {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value="">Seleccione</option><option value="1">Documentación enviada</option><option value="4">Oferta presentada</option></select>');

      }

      if ($(this).val() === "28" || $(this).val() === "24" || $(this).val() === "25") {
        $('#product2').html('<div style="margin-top: 24;"></div><label>Producto</label><br><select class="form-control" name="product" required><option value="">Seleccione</option><option value="Certificado digital">Certificado digital</option><option value="Colocation">Colocation</option><option value="Horas experto">Horas experto</option><option value="Laas procesamiento, almacenamiento">Laas procesamiento, almacenamiento</option><option value="Laas procesamiento, almacenamiento,pass">Laas procesamiento, almacenamiento,pass</option><option value="Pass">Pass</option></select>');
        $('#ofertasEnSeguimiento').html('');
        $('#ofertasEnSeguimiento2').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                            $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                            echo $seg; ?>');
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#vtIVA').css('display', 'block');
        $('#acum').css('display', 'block');
        $('#obligado').css('display', 'block');
        $('#ebitda').css('display', 'block');
        $('#tipoeventu').css('display', 'block');
        $('#vpn').css('display', 'block');
        $('#ordenc').css('display', 'block');
        $('#fechaoc').css('display', 'block');
        $('#fechafoc').css('display', 'block');
        $('#ctari').css('display', 'block');
        $('#targetari').css('display', 'block');
        $('#tarim').css('display', 'block');
        $('#ebitdatm').css('display', 'block');
        $('#vpntari').css('display', 'block');
        $('#vtIVA1').prop("value", '0');
        $('#acum1').prop("value", 'Pendiente');
        $('#obligado1').prop("value", 'Pendiente');
        $('#ebitda1').prop("value", '0%');
        $('#tipoeventu1').prop("value", 'Pendiente');
        $('#vpn1').prop("value", 'Pendiente');
        $('#ordenc1').prop("value", 'Pendiente');
        $('#fechaoc1').prop("value", '1000-01-01');
        $('#fechafoc1').prop("value", '1000-01-01');
        $('#ctari1').prop("value", 'Pendiente');
        $('#targetari1').prop("value", 'Pendiente');
        $('#tarim1').prop("value", 'Pendiente');
        $('#ebitdatm1').prop("value", '0%');
        $('#vpntari1').prop("value", 'Pendiente');
      } else {
        $('#product2').html('<div class="row justify-content center" style="margin-top: -13"><div class="col-md-12"><label for="product">Producto</label></div><div class="col-md-10"><textarea class="form-control" type="product1" name="product" id="product1" value="<?php echo $objeto->product; ?>"></textarea></div><div class="col-md-1"><input class="btn btn-primary" type="button" id="probando5" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
        $('#nombre_concepto').css('pointer-events', 'none');
        $('#ofertasEnSeguimiento2').html('');
        $('#ofertasEnSeguimiento').html('<label for="seg"> Ofertas en Seguimiento </label><?php $idSeg = $objeto->nombre_seg;
                                                                                          $seg = $pdo->_comboboxdinamic_campos("seg", "nombre_seg", $id, "nombre_seg", $idSeg);
                                                                                          echo $seg; ?>');
        $('#nombre_res').val('9');
        $('#nombre_causal').val('14');
        $('#errorCausal').html('');
        $('#vtIVA').css('display', 'none');
        $('#acum').css('display', 'none');
        $('#obligado').css('display', 'none');
        $('#ebitda').css('display', 'none');
        $('#tipoeventu').css('display', 'none');
        $('#vpn').css('display', 'none');
        $('#ordenc').css('display', 'none');
        $('#fechaoc').css('display', 'none');
        $('#fechafoc').css('display', 'none');
        $('#ctari').css('display', 'none');
        $('#targetari').css('display', 'none');
        $('#tarim').css('display', 'none');
        $('#ebitdatm').css('display', 'none');
        $('#vpntari').css('display', 'none');
        $('#vtIVA1').prop("value", '0');
        $('#acum1').prop("value", 'N/A');
        $('#obligado1').prop("value", 'N/A');
        $('#ebitda1').prop("value", 'N/A');
        $('#tipoeventu1').prop("value", 'N/A');
        $('#vpn1').prop("value", 'N/A');
        $('#ordenc1').prop("value", 'N/A');
        $('#fechaoc1').prop("value", '1000-01-01');
        $('#fechafoc1').prop("value", '1000-01-01');
        $('#ctari1').prop("value", 'N/A');
        $('#targetari1').prop("value", 'N/A');
        $('#tarim1').prop("value", 'N/A');
        $('#ebitdatm1').prop("value", 'N/A');
        $('#vpntari1').prop("value", 'N/A');
        $(document).ready(function() {
          $('#probando5').click(function() {
            $('#id02').css('display', 'block');
          });
        });

      }


      $('#nombre_estado').change(function(e) {
        if ($(this).val() == "7") {
          $('#nombre_res').val('4');
          $('#nombre_causal').val('14');
          $('#errorCausal').html('');
          $('#empgana').val('27');
          $('#nombre_res option[value="4"]').show();
          $('#nombre_res option[value="6"]').hide();
          $('#nombre_res option[value="9"]').hide();

        }
        if ($(this).val() == "4") {
          $('#nombre_res').val('7');
          $('#nombre_causal').val('14');
          $('#errorCausal').html('');
          $('#empgana').val('27');
          $('#nombre_res option[value="4"]').hide();
          $('#nombre_res option[value="6"]').hide();
          $('#nombre_res option[value="9"]').hide();
        }
        if ($(this).val() == "3") {
          $('#nombre_res').val('6');
          $('#nombre_causal').focus();
          $('#nombre_causal').val('');
          $('#errorCausal').html('Es obligatorio este campo, el estado de la licitación es no participamos.');
          $('#nombre_res option[value="4"]').show();
          $('#nombre_res option[value="6"]').show();
          $('#nombre_res option[value="9"]').show();
          $('#nombre_causal').change(function(e) {
            $('#errorCausal').html('');
          })
        }
        if ($(this).val() === "1" && $('#nombre_tiproces').val() == "23") {
          $('#nombre_res').val('4');
          $('#nombre_causal').val('14');
          $('#errorCausal').html('');
          $('#empgana').val('27');
          $('#nombre_res option[value="4"]').show();
          $('#nombre_res option[value="6"]').show();
          $('#nombre_res option[value="9"]').show();
        }
        if ($(this).val() == "2" || $(this).val() == "5") {
          $('#nombre_res').val('9');
          $('#nombre_causal').val('14');
          $('#errorCausal').html('');
          $('#empgana').val('27');
          $('#nombre_res option[value="4"]').show();
          $('#nombre_res option[value="6"]').show();
          $('#nombre_res option[value="9"]').show();
        }
      })

    })
  });

  $(document).ready(function() {
    $('#plazoEjecucion,#Presupuesto').on("keyup input", function() {
      var valorOferta1 = $('#Presupuesto').val();
      var plazoEjecucion = $('#plazoEjecucion').val();
      var valorOferta = valorOferta1.replace(/,/g, "");
      var calculo = valorOferta / plazoEjecucion;
      var mensualidad = number_format(calculo);
      $('#mensualidad').val(mensualidad);
    })
  });



  function nitBuscar(str) {
    if (str.length == 0) {
      document.getElementById("entidad").value = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("entidad").value = this.responseText;
        }
      };
      xmlhttp.open("GET", "function/opcionesNit.php?q=" + str, true);
      xmlhttp.send();
    }
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////


  $(document).on("click", "input[id='checkbox1']", function() {

    var principal = $("#probando4").val();
    var nuevo = $("#checkbox1").val();
    $('#probando4').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox2']", function() {

    var principal = $("#probando4").val();
    var nuevo = $("#checkbox2").val();
    $('#probando4').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox3']", function() {

    var principal = $("#probando4").val();
    var nuevo = $("#checkbox3").val();
    $('#probando4').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox4']", function() {
    var principal = $("#probando4").val();
    var nuevo = $("#checkbox4").val();
    $('#probando4').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox5']", function() {
    var principal = $("#probando4").val();
    var nuevo = $("#checkbox5").val();
    $('#probando4').prop("value", principal + ',' + nuevo);
  });

  $(document).on("click", "input[id='checkbox1']", function() {

    var principal = $("#pro").val();
    var nuevo = $("#checkbox1").val();
    $('#pro').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox2']", function() {

    var principal = $("#pro").val();
    var nuevo = $("#checkbox2").val();
    $('#pro').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox3']", function() {

    var principal = $("#pro").val();
    var nuevo = $("#checkbox3").val();
    $('#pro').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox4']", function() {
    var principal = $("#pro").val();
    var nuevo = $("#checkbox4").val();
    $('#pro').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkbox5']", function() {
    var principal = $("#pro").val();
    var nuevo = $("#checkbox5").val();
    $('#pro').prop("value", principal + ',' + nuevo);
  });


  ////////////////////




  $(document).on("click", "input[id='checkboxxx1']", function() {

    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx1").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx2']", function() {

    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx2").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx3']", function() {

    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx3").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx4']", function() {
    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx4").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx5']", function() {
    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx5").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });

  $(document).on("click", "input[id='checkboxxx6']", function() {
    var principal = $("#probando24").val();
    var nuevo = $("#checkboxxx6").val();
    $('#probando24').prop("value", principal + ',' + nuevo);
  });



  $(document).on("click", "input[id='checkboxxx1']", function() {

    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx1").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx2']", function() {

    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx2").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx3']", function() {

    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx3").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx4']", function() {
    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx4").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx5']", function() {
    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx5").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxxx6']", function() {
    var principal = $("#profe").val();
    var nuevo = $("#checkboxxx6").val();
    $('#profe').prop("value", principal + ',' + nuevo);
  });


  /////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////

  $(document).ready(function() {
    $('#imputabilidad').on("keyup input", function() {
      var filtro = $('#imputabilidad').val();
      $.ajax({
        type: "POST",
        url: "function/relacionEjecutivosSP.php",
        data: {
          'filtro': filtro
        },
        beforeSend: function() {
          $("#search-box").css("background", "#FFF url(assets/imagenes/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) {
          if (filtro === "") {
            $("#suggesstion-box2").hide();
            $("#suggesstion-box2").html('');
            $("#search-box").css("background", "#FFF");
          } else {
            $("#suggesstion-box2").show();
            $("#suggesstion-box2").html(data);
            $("#search-box").css("background", "#FFF");
          }
        }
      });
    })
  });



  $(document).ready(function() {
    $('#ejecu').on("keyup input", function() {
      var filtro = $('#ejecu').val();
      $.ajax({
        type: "POST",
        url: "function/relacionEjecutivos.php",
        data: {
          'filtro': filtro
        },
        beforeSend: function() {
          $("#search-box").css("background", "#FFF url(assets/imagenes/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) {
          if (filtro === "") {
            $("#suggesstion-box").hide();
            $("#suggesstion-box").html('');
            $("#search-box").css("background", "#FFF");
          } else {
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background", "#FFF");
          }
        }
      });
    })
  });

  function selectCountry(ejecutivo, consultor, regional, sector) {
    $('#nombre_reg').val(regional);
    $('#ejecu').val(ejecutivo);
    $('#consul').val(consultor);
    $('#nombre_concepto').val(sector);
    $("#suggesstion-box").hide();
  }

  function selectCountry2(imputabilidad) {
    $('#imputabilidad').val(imputabilidad);
    $("#suggesstion-box2").hide();
  }

  $('#nombre_stadpro').change(function(e) {
    if ($(this).val() === '1') {
      $('#nombre_estado option[value="1"]').hide();
      $('#nombre_estado option[value="4"]').hide();
      $('#nombre_estado option[value="7"]').hide();
      $('#nombre_res option[value="1"]').hide();
      $('#nombre_res option[value="2"]').hide();
      $('#nombre_res option[value="3"]').hide();
      $('#nombre_res option[value="4"]').hide();
      $('#nombre_res option[value="5"]').hide();
      $('#nombre_res option[value="7"]').hide();
    } else {
      $('#nombre_res option[value="1"]').show();
      $('#nombre_res option[value="2"]').show();
      $('#nombre_res option[value="3"]').show();
      $('#nombre_res option[value="4"]').show();
      $('#nombre_res option[value="5"]').show();
      $('#nombre_res option[value="7"]').show();
      $('#nombre_estado option[value="1"]').show();
      $('#nombre_estado option[value="4"]').show();
      $('#nombre_estado option[value="7"]').show();
    }
  })

  // Validaciones Campos Resultados y Causales

  $('#nombre_res').change(function(e) {
    if ($(this).val() === '1') {
      $('#empgana2').html('<label for="empgana">Empresa Ganadora</label><div class="row justify-content center"><div class="col-md-10"><select class="form-control"   name="empgana" id="empgana" required><option value="98">UT Une - Colombia Movil SA ESP</option><option value="104">Union Temporal Nube Publica 2019</option><option value="4">Colombia Movil S.A E.S.P</option><option value="7">Edatel S.A.</option><option value="22">Une EPM Telecomunicaciones S.A.</option><option value="26">UT Une - Edatel</option></select></div><div><input class="btn btn-primary" type="button" id="max" name="max" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
    } else {
      $('#empgana2').html('<label for="empgana">Empresa Ganadora</label><div class="row justify-content center"><div class="col-md-10"><?php $idEmpre = $objeto->empgana;
                                                                                                                                        $empganat = $pdo->_comboboxdinamic_campos("empresag", "empgana", $id, "empgana", $idEmpre);
                                                                                                                                        echo $empganat;  ?></div><div><input class="btn btn-primary" type="button" id="max" name="max" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');

      $('#empgana option[value="4"]').hide();
      $('#empgana option[value="7"]').hide();
      $('#empgana option[value="22"]').hide();
      $('#empgana option[value="26"]').hide();
    }

    if ($(this).val() === "5") {
      $('#nombre_causal').focus();
      $('#nombre_causal').val('');
      $('#empgana').val('');
      $('#errorCausal').html('Es obligatorio este campo, el resultado de la licitación es perdido.');
    } else {
      $('#nombre_causal').val('16');
      $('#empgana').val('27');
      $('#errorCausal').html('');
    }
    if ($(this).val() === "6") {
      $('#nombre_causal').html("<div class='form-group'><label for='causal'>Causales </label><select class='form-control' name='nombre_causal id='nombre_causal' required><option value=''></option><option value='1'>Adjudicado</option><option value='2'>Alcance Tecnico</option><option value='3'>Cerrado por la entidad</option><option value='4'>Error en la plataforma SECOP II</option><option value='5'>Error en la plataforma del cliente</option><option value='6'>Limitado a mi Pymes</option><option value='7'>Modelo financiero</option><option value='9'>Precio</option><option value='10'>Requisitos Habilitantes</option><option value='11'>Requisitos Legales</option><option value='12'>Precio + Calidad</option><option value='13'>Precio Artifc. Bajo</option><option value='14'>Pendiente</option></select><option value='15'>Indicadores Financieros</option><option value='16'>Por Definir</option><option value='17'>Se presenta en Nicaragua</option></div><input value='<?php echo $objeto->nombre_causal ?>' name='nombre_causalH' type='' class='form - control' readonly='true' style='background: Yellow' hidden><span id = 'errorCausal'  class = 'alert-warning'>< /span>");
      $('#errorCausal').html('Es obligatorio este campo, el resultado de la licitación es No Participamos');
      $('#errorCausal').css({
        "color": "red"
      });

    }

  })

  $('#nombre_causal').change(function(e) {
    if ($(this).val() !== '') {
      $('#errorCausal').html('');

    }
  })

  var tresultado = document.getElementById('resultado').value;

  var tcausal = document.getElementById('nombre_causal').value;

  if (tresultado === "6") {
    $('#nombre_causal').html("<div class='form-group'><label for='causal'>Causales </label><select class='form-control' name='nombre_causal id='nombre_causal' required><option value='<?php echo $objeto->nombre_causal ?>'><?php echo $obj->nombre_causal ?></option><option value='1'>Adjudicado</option><option value='2'>Alcance Tecnico</option><option value='3'>Cerrado por la entidad</option><option value='4'>Error en la plataforma SECOP II</option><option value='5'>Error en la plataforma del cliente</option><option value='6'>Limitado a mi Pymes</option><option value='7'>Modelo financiero</option><option value='9'>Precio</option><option value='10'>Requisitos Habilitantes</option><option value='11'>Requisitos Legales</option><option value='12'>Precio + Calidad</option><option value='13'>Precio Artifc. Bajo</option><option value='14'>Pendiente</option></select><option value='15'>Indicadores Financieros</option><option value='16'>Por Definir</option><option value='17'>Se presenta en Nicaragua</option></div><input value='<?php echo $objeto->nombre_causal ?>' name='nombre_causalH' type='' class='form - control' readonly='true' style='background: Yellow' hidden><span id = 'errorCausal'  class = 'alert-warning'>< /span>");

  }




  $(document).on("click", "input[id='checkboxx1']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx1").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx2']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx2").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx3']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx3").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx4']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx4").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx5']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx5").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx6']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx6").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx7']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx7").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx8']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx8").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx9']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx9").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx10']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx10").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx11']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx11").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx12']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx12").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx13']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx13").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx14']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx14").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx15']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx15").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx16']", function() {
    var principal = $("#product1").val();
    var nuevo = $("#checkboxx16").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });
  $(document).on("click", "input[id='checkboxx17']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx17").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });

  $(document).on("click", "input[id='checkboxx18']", function() {

    var principal = $("#product1").val();
    var nuevo = $("#checkboxx18").val();
    $('#product1').prop("value", principal + ',' + nuevo);
  });


  function number_format(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }




  /*/-----------------------------------------------------------
  $(document).ready(function() {
    $('#nombre_tiproces').change(function(e) {
      if ($(this).val() === "2" || $(this).val() === "3" || $(this).val() === "7" || $(this).val() === "8" || $(this).val() === "9" ||
        $(this).val() === "10" || $(this).val() === "11" || $(this).val() === "14" || $(this).val() === "15" || $(this).val() === "16" || $(this).val() === "17" || $(this).val() === "18" || $(this).val() === "19" || $(this).val() === "20" || $(this).val() === "22") {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="1">Documentación enviada</option><option value="3">No participamos</option><option value="4">Oferta presentada</option><option value="5">Suspendido</option><option value="7">Oferta presentada-Estudio mercado</option></select>');
        //$('#nombre_res').val('9');
        $('#indicador').val('<?php  //e cho $objeto->indicador 
                              ?>');
        $('#hora').val('<?php // echo $objeto->hora 
                        ?>');
        $('#errorindicador').html('');
        $('#errorhoraindicador').html('');

      } else {
        $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="1">Documentación enviada</option><option value="3">No participamos</option><option value="4">Oferta presentada</option><option value="5">Suspendido</option></select>');
        $('#indicador').val('<?php // echo $objeto->indicador 
                              ?>');
        $('#hora').val('<?php // echo $objeto->hora 
                        ?>');
        $('#errorindicador').html('');
        $('#errorhoraindicador').html('');
        $('#i').val('0');
        $('#h').val('0');
      }

      $('#nombre_estado').change(function(e) {

        if ($(this).val() === "4") {

          $('#indicador').focus();
          $('#hora').focus();
          $('#indicador').val('<?php // echo $objeto->indicador 
                                ?>');
          $('#hora').val('<?php // echo $objeto->hora 
                          ?>');
          $('#i').val('1');
          $('#h').val('1');
          $('#errorindicador').html('Este campo es obligatorio, el estado de la licitación es oferta presentada.');
          $('#errorhoraindicador').html('este campo es obligatorio');

          $('#indicador').change(function(e) {
            $('#errorindicador').html('');
            $('#i').val('0');
          })
          $('#hora').change(function(e) {
            $('#errorhoraindicador').html('');
            $('#h').val('0');
            $('#indicador').val('');

          })
        } else if ($(this).val() === "7") {

          $('#indicador').focus();
          $('#hora').focus();
          $('#indicador').val('<?php // echo $objeto->indicador 
                                ?>');
          $('#hora').val('01:00');
          $('#i').val('1');
          $('#h').val('1');
          $('#errorindicador').html('Es obligatorio este campo, el estado de la licitación es estudio mercado.');
          $('#errorhoraindicador').html('este campo es obligatorio');
          $('#indicador').change(function(e) {

            $('#errorindicador').html('');
            $('#i').val('0');

          })
          $('#hora').change(function(e) {
            $('#errorhoraindicador').html('');
            $('#h').val('0');
          })

        }



      })




    })
  });

  */ //------------------------------------------------------------
</script>