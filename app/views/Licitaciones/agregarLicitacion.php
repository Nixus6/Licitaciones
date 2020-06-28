<?php date_default_timezone_set("America/Bogota");

$year =  date('Y-m-d (H:i:a)');

?>

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<style type="text/css">
    #suggesstion-box {
        float: left;
        list-style: none;
        margin-top: -3px;
        padding: 0;
        width: 380px;
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

    .error {
        color: red;
    }

    .alert-error {
        color: red;
    }

    /* Wizard */

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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row justify-content center">

                            <div class="col-md-12">
                                <center>
                                    <h2>Agregar Licitación</h2>
                                </center>
                            </div>

                        </div>
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

                    <div class="card-body">

                        <form id="formRegistrarUsuario" action="../administrador/function/guardarLicitacion.php" method="post" autocomplete="off">

                            <div class="tab-content">
                                <div class="tab-pane active" id="sec1" aria-labelledby="step1-tab" role="tabpanel">
                                    <fieldset>
                                        <div class="Subtitulo">
                                            <i class="far fa-id-card" id="IconoSubtitulo"></i>
                                            <h2 style="margin-bottom:0px">Información Proceso</h2>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">

                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="Subtitulo">
                                            <i class="far fa-handshake" id="IconoSubtitulo"></i>
                                            <!-- <i class="far fa-id-card" id="IconoSubtitulo"></i> -->
                                            <h2 style="margin-bottom:0px">Información Licitacion</h2>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <!-- <div class="col-xs-12 col-md-4 col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label for="fCreacion"> Fecha Creacion Licitacion </label>
                                                        <input type="text" name="fCreacion" class="form-control" id="fCreacion" tabindex="1" readonly="true" value="<?php echo $year ?>">

                                                    </div>
                                                </div>-->
                                                <div class="col-xs-12 col-md-4 col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label for="fCreacion"> Fecha Cierre Licitacion </label>
                                                        <input type="date" name="fCreacion" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group label-floating is-empty">
                                                        <!---Nombre--->
                                                        <label class="control-label" for="clave">Myse (Numero Licitación)</label>
                                                        <input name="nombre" placeholder="Escriba su nombre completo" class="form-control" id="nombre" value="Natalia">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nit</label>
                                                        <input type="text" value="Success" class="form-control form-control-success" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Entidad</label>
                                                        <input type="text" value="Success" class="form-control form-control-success" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Presupuesto</label>
                                                        <input type="text" value="Success" class="form-control form-control-success" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Plazo de Ejecución</label>
                                                        <input type="text" value="Success" class="form-control form-control-success" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Mensualidad</label>
                                                        <input type="text" value="Success" class="form-control form-control-success" />
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Soporte a Licitaciones</label>
                                                        <select id="SoporteLicitaciones" class="js-example-basic-single" style="text-align-last: center;">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Otra</option>
                                                            <option value="2">Otra mas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Abogado</label>
                                                        <select class="form-control" style="text-align-last: center;">
                                                            <option value="0">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Resultado</label>
                                                        <select class="form-control" style="text-align-last: center;">
                                                            <option value="0">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Objeto del contrato</label>
                                                        <textarea name="objcontra" id="objcontra" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="traza">Trazabilidad</label>
                                                        <textarea name="traza" id="traza" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group" id="product2">
                                                        <div class="form-check" style="padding-left: 0rem; display: inline-flex;">
                                                            <label class="control-label" for="product" style="margin-right: 5px; margin-top: 4px;">Certificado/s</label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                            <img style="cursor: pointer; height: 26px; color:#007bff;" src="<?= URL_IMG ?>Iconos/agregar.png" alt="Logo del Area">
                                                        </div>
                                                        <!-- <textarea class="form-control" rows="2" name="product" id="product1"></textarea> -->
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group" id="product2">
                                                        <div class="form-check" style="padding-left: 0rem; display: inline-flex;">
                                                            <label class="control-label" for="product" style="margin-right: 5px; margin-top: 4px;">Indicadores Financieros</label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                            <img style="cursor: pointer; height: 26px; color:#007bff;" src="<?= URL_IMG ?>Iconos/agregar.png" alt="Logo del Area">
                                                        </div>
                                                        <!-- <textarea class="form-control" rows="2" name="product" id="product1"></textarea> -->
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group" id="product2">
                                                        <label class="control-label" for="product">Producto/s</label>
                                                        <textarea class="form-control" rows="2" name="product" id="product1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
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

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <script>
    $(document).ready(function() {
        $('#SoporteLicitaciones').select2();
    });
</script> -->




<!-- Modal de certificados -->
<!-- <div id="id01" class="w3-modal">
    <div class="w3-modal-content " style="width: 650px;">
        <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-display-topright" style=" color: #fff!important;
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
                        <input type="checkbox" name="cerpree[]" value="OHSAS 18001"> - OHSAS 18001
                        <input type="checkbox" name="cerpree[]" value="ISO9001"> - ISO9001
                        <input type="checkbox" name="cerpree[]" value="ISO14001"> - ISO14001
                        <input type="checkbox" name="cerpree[]" value="ISO27001"> - ISO27001
                        <input type="checkbox" name="cerpree[]" value="NTCGP1000"> - NTCGP1000<br>
                    </div>
                </div>
                <div class="col-md-12" style="margin: 10px;">
                    <label>Otro:</label>
                    <input type="text" name="cerpree[]" id="valCepre" value="Pendiente">
                </div>
                <div class="col-md-5" style="margin-left: 38%;">
                    <input class="btn btn-primary" type="button" id="probando2" type="button" style="margin: 1rem; color: #fff!important; background-color: #092e6e!important;" value="Aceptar" />
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal de productos -->
<!-- <div id="id02" class="w3-modal">
    <div class="w3-modal-content " style="width: 650px;">
        <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id02').style.display = 'none'" class="w3-button w3-display-topright" style=" color: #fff!important;
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
                        <input type="checkbox" id="checkboxx1" value="SD WAN"> - SD WAN
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


<!-- Modal de INDICADORES -->
<!-- <div id="id03" class="w3-modal">
    <div class="w3-modal-content " style="width: 650px;">
        <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id03').style.display = 'none'" class="w3-button w3-display-topright" style=" color: #fff!important;
                                  background-color: #092e6e!important;">&times;</span>
        </header>
        <div class="w3-container">
            <div class="row justify-content center">
                <div class="col-md-12 " style="margin: 2rem;">
                    <center>
                        <h2>INDICADORES FINANCIEROS</h2>
                    </center>
                </div>
                <div class="col-md-12" style="margin: 10px;">
                    <div class="form-group">
                        <input type="checkbox" name="indis[]" value="Razon de Cobertura de Interes"> -Razon de Cobertura de Interes<br>
                        <input type="checkbox" name="indis[]" value="Indice de Liquidez"> -Indice de Liquidez<br>
                        <input type="checkbox" name="indis[]" value="Rentabilidad del Activo"> -Rentabilidad del Activo<br>
                        <input type="checkbox" name="indis[]" value="Rentabilidad del Patrimonio"> -Rentabilidad del Patrimonio<br>
                        <input type="checkbox" name="indis[]" value="Capital del Trabajo"> -Capital del Trabajo<br>
                    </div>
                </div>
                <div class="col-md-12" style="margin: 10px;">
                    <label>Otro:</label>
                    <input type="text" name="indis[]" id="valIndi" value="Pendiente">
                </div>
                <div class="col-md-5" style="margin-left: 38%;">
                    <input class="btn btn-primary" type="button" id="probando22" style="margin: 1rem; color: #fff!important; background-color: #092e6e!important;" value="Aceptar" />
                </div>
            </div>
        </div>
    </div>
</div> -->




<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->