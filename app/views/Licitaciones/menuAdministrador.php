
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


<div class="modal fade" id="miModalLicita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            ?> -->

                                <?php if ($_SESSION['rol'] === 'Administrador') { ?>
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
                                <?php } ?>

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
            <!-- Fin Seccion 1 -->

            <div class="modal-footer">
                <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="btnActualizar" id="btnActualizar" onclick="ActualizarOportunidad();">Actualizar</button>
            </div>
        </div>

    </div>
</div>

<!-- Fin Modal Actualizar Licitacion -->

<!-- <div class="wrapper ">


        <?php //include FOLDER_TEMPLATE . "licitaciones/menu.php"; 
        ?>

        <div class="main-panel">

            <?php //include FOLDER_TEMPLATE . "licitaciones/top.php"; 
            ?> -->



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <center>
                            <h2>Licitaciones en curso</h2>
                        </center><br>


                        <div class="material-datatables">
                            <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row justify-content">
                                    <div style="margin-left: 20px">
                                        <form method="post" action="menuAdministradorF.php">
                                            <div class="row justify-content">
                                                <!-- <div class="col-md-2">
                                                                <input class="form-control" type="text" id="search" placeholder="Buscar" />
                                                            </div> -->
                                                <?php if ($_SESSION['PLicitaciones'] == 'Administrador') { ?>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-outline-primary" style="margin-right: 15px;" href="ReportesPDF.php/librerias/excel/licitacionesEnCurso.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                                                    </div>
                                                    <!-- <div class="col-md-2">
                                                                    <select class="form-control" name="opciones" id="opcioness">
                                                                        <option value="ST.nombre_concepto">Sector</option>
                                                                        <option value="consult">Consultor</option>
                                                                        <option value="TL.nombre_sp">Soporte de licitaciones</option>
                                                                        <option value="ejecu">Ejecutivo</option>
                                                                        <option value="entidad">Entidad</option>
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <input class="form-control" type="text" name="datoB">
                                                                </div>
                                                                &nbsp
                                                                <div>
                                                                    <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                                                                </div> -->

                                                <?php } elseif ($_SESSION['PLicitaciones'] == 'Asignar') { ?>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-outline-primary" style="margin-right: 15px;" href="../assets/librerias/excel/licitacionesEnCurso.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="form-control" name="opciones" id="opcioness">
                                                            <option value="ST.nombre_concepto">Sector</option>
                                                            <option value="consult">Consultor</option>
                                                            <option value="TL.nombre_sp">Soporte de licitaciones</option>
                                                            <option value="ejecu">Ejecutivo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="form-control" type="text" name="datoB">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                                                    </div>
                                                <?php } elseif ($_SESSION['PLicitaciones'] == 'Usuario') { ?>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-outline-primary" style="margin-right: 15px;" href="../assets/librerias/excel/licitacionesEnCurso.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
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
                                                    &nbsp
                                                    <div>
                                                        <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                                                    </div>
                                                <?php } elseif ($_SESSION['PLicitaciones'] == 'UsuarioCCE') { ?>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-outline-primary" style="margin-right: 15px;" href="../assets/librerias/excel/licitacionesEnCurso.php"><i class="fas fa-file-excel"></i> Exportar excel </a>
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
                                                    &nbsp
                                                    <div>
                                                        <input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
                                                    </div>
                                                <?php } elseif ($_SESSION['PLicitaciones'] == 'Govermment' || $_SESSION['PLicitaciones'] == 'Corporativo' || $_SESSION['PLicitaciones'] == 'ConsultorVP' ||  $_SESSION['PLicitaciones'] === 'Pymes' || $_SESSION['PLicitaciones'] === 'Whosale') { ?>

                                                <?php } ?>
                                            </div>
                                        </form>

                                        <body>
                                            <br>
                                            <div style="font-size: 12px;">
                                                <label><b>Fechas transcurridas: </b></label>
                                                <i class="fas fa-circle" style="color: #757575; width: 50px; height: 15px"></i>
                                                <label><b>Licitaciones para el día de hoy: </b></label>
                                                <i class="fas fa-circle" style="color: red; width: 50px; height: 15px"></i>
                                                <label><b>Licitaciones pendientes para el día siguiente: </b></label>
                                                <i class="fas fa-circle" style="color: yellow; width: 30px; height: 15px"></i>
                                                <label><b>Licitaciones dentro del tiempo: </b></label>
                                                <i class="fas fa-circle" style="color: green; width: 50px; height: 15px"></i>
                                            </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">

                                            <table id="datatablesLicita" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr>
                                                        <th colspan="1">Opciones</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Exportar en Formato PDF</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Checklist</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Fecha de observación</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 300px;">Fecha y Hora de Cierre</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Soporte a licitaciones</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Myse</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Entidad</th>
                                                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Número de Proceso</th> -->
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Tipo de proceso</th>
                                                        <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Mas Información</th>
                                                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Estado del proyecto</th> -->
                                                        <!-- <th class="sorting_asc" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;">Ejecutivo</th> -->
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Opciones</th>
                                                        <th rowspan="1" colspan="1">Exportar en Formato PDF</th>
                                                        <th rowspan="1" colspan="1">Checklist</th>
                                                        <th rowspan="1" colspan="1">Fecha de observación</th>
                                                        <th rowspan="1" colspan="1">Fecha y Hora de Cierre</th>
                                                        <th rowspan="1" colspan="1">Soporte a licitaciones</th>
                                                        <th rowspan="1" colspan="1">Myse</th>
                                                        <th rowspan="1" colspan="1">Entidad</th>
                                                        <!-- <th rowspan="1" colspan="1">Número de Proceso</th> -->
                                                        <th rowspan="1" colspan="1">Tipo de Proceso</th>
                                                        <th rowspan="1" colspan="1">Mas Información</th>
                                                        <!-- <th rowspan="1" colspan="1">Estado del proyecto</th> -->
                                                        <!-- <th rowspan="1" colspan="1">Ejecutivo</th> -->
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--
                                    <div>


                                    <?php //if ($_SESSION['rollicita'] === 'Usuario') {
                                    //} elseif ($_SESSION['rollicita'] === 'UsuarioCCE') { ?>
                                        <?php //} elseif ($_SESSION['rollicita'] === 'Govermment' || $_SESSION['rollicita'] == 'Corporativo' || $_SESSION['rollicita'] == 'ConsultorVP' || $_SESSION['rollicita'] === 'Whosale' || $_SESSION['rollicita'] === 'Pymes') { ?>
                                        <?php //} else { ?>
                                            <div class="row justify-content-md-center" class="table" id="table" onmousedown="return false;" onselectstart="return false;">
                                                <div class="col-md-5">
                                                    <div class="table" style="width: 300px;">
                                                        <table class="table" style="width: 300px;">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Soporte a licitaciones</th>
                                                                    <th>Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                               // foreach ($consulta as $key) {
                                                                ?>
                                                                    <tr>
                                                                        <td bgcolor="EAEAEA"><?php //echo $key['nombre'] ?></td>
                                                                        <td bgcolor="EAEAEA"><?php //echo $key['COUNT(SG.nombre_estado)'] ?></td>
                                                                    </tr>
                                                                <?php
                                                               // }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="table" style="width: 300px;">
                                                        <table class="table" style="width: 300px;">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Soporte a licitaciones</th>
                                                                    <th>Mes</th>
                                                                    <th>Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                               // foreach ($fechaCierre as $key) {
                                                                ?>
                                                                    <tr>
                                                                        <td bgcolor="EAEAEA"><?php // echo $key['soporte'] ?></td>
                                                                        <?php
                                                                        //if ($key['mes'] == 1) { ?>
                                                                            <td bgcolor="EAEAEA">Enero</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 2) { ?>
                                                                            <td bgcolor="EAEAEA">Febrero</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 3) { ?>
                                                                            <td bgcolor="EAEAEA">Marzo</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 4) { ?>
                                                                            <td bgcolor="EAEAEA">Abril</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 5) { ?>
                                                                            <td bgcolor="EAEAEA">Mayo</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 6) { ?>
                                                                            <td bgcolor="EAEAEA">Junio</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 7) { ?>
                                                                            <td bgcolor="EAEAEA">Julio</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 8) { ?>
                                                                            <td bgcolor="EAEAEA">Agosto</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                       // if ($key['mes'] == 9) { ?>
                                                                            <td bgcolor="EAEAEA">Septiembre</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                        //if ($key['mes'] == 10) { ?>
                                                                            <td bgcolor="EAEAEA">Octubre</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                       // if ($key['mes'] == 11) { ?>
                                                                            <td bgcolor="EAEAEA">Noviembre</td>
                                                                        <?php //} ?>
                                                                        <?php
                                                                       // if ($key['mes'] == 12) { ?>
                                                                            <td bgcolor="EAEAEA">Diciembre</td>
                                                                        <?php // } ?>
                                                                        <td bgcolor="EAEAEA"><?php ///echo $key['contador'] ?></td>
                                                                    </tr>
                                                                <?php
                                                              ///////  }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            <?php //}   ?>


                                            </div>
                    

                                    </div>
                                            -->
                            </div>
                        </div>


                    </div>
                    <!--card body-->
                </div>
            </div>


        </div>
    </div>
</div>

<?php //include FOLDER_TEMPLATE . "licitaciones/scripts.php"; ?>
