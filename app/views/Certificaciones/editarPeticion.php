<?php include "../../../config.php"; ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
    include("../../models/conexionCERT.php");
} else {
    header('location: ../index.php');
}

$conexion  = new conexionCert;
$execute = $conexion->conectar();
$idPeticion = $_GET['idPeticion'];
$sector = $execute->query("SELECT * FROM sector");
$productos = $execute->query("SELECT * FROM productos");


$sentencia = $execute->prepare("SELECT * FROM peticion  where idPeticion=?");
$sentencia->execute([$idPeticion]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>
<style type="text/css">
    .subir {
        padding: 10px 100px;
        background: #1d3c61;
        color: #fff;
        border: 2px solid #fff;
    }

    .subir:hover {
        color: #fff;
        background: red;
    }

    #suggesstion-box {
        float: left;
        list-style: none;
        margin-top: -7px;
        padding: 0;
        width: 320px;
        position: auto;
    }

    #suggesstion-box li {
        padding: 2px;
        background: #f0f0f0;
        border-bottom: #bbb9b9 1px solid;
    }

    #suggesstion-box li:hover {
        background: #405c8c;
        cursor: pointer;
    }

    #suggesstion-box2 {
        float: left;
        list-style: none;
        margin-top: -7px;
        padding: 0;
        width: 320px;
        position: auto;
    }

    #suggesstion-box2 li {
        padding: 2px;
        background: #f0f0f0;
        border-bottom: #bbb9b9 1px solid;
    }

    #suggesstion-box2 li:hover {
        background: #405c8c;
        cursor: pointer;
    }
</style>


<body class="">
    <div class="wrapper ">

        <?php include FOLDER_TEMPLATE . "menu.php"; ?>

        <!-- Modal de los certificados -->
        <div class="modal fade" id="archivos" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">

                        <?php
                        $idpdf = $objeto->idPdf;

                        $consulta = $execute->query(" SELECT * FROM pdfspeticion WHERE idpeticion=$idpdf");

                        ?>
                        <center>
                            <h4 class="font-weight-bold">Archivos subidos</h4>
                            <?php foreach ($consulta as $key) { ?>

                                <a href="uploads/pdf/<?php echo $key['pdf'] ?>" target="_blank"><?php if ($key['pdf'] !== "") {
                                                                                                    echo  $key['pdf'];
                                                                                                } ?></a><br>

                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-panel">

            <?php include FOLDER_TEMPLATE . "top.php"; ?>

            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card  card-tasks">
                            <div class="card-body">

                                <center>
                                    <h2><strong>Editar Peticion</strong></h2><br>
                                </center>


                                <form action="Funciones/crudPeticiones.php" method="post" utocomplete="off" id="actualizarPeticion">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="fCreacion"> Fecha Creacion</label>
                                            <input type="text" name="fecRegistro" style=" font-size:100%;" class="form-control" id="fecRegistro" tabindex="1" readonly="true" value="<?php echo $objeto->fecRegistro ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nomUsuario"> Nombre del Usuario </label>
                                            <input type="text" name="nomUsuario" style="background:#b2dffb; color:black; font-size:100%;" class="form-control" id="nomUsuario" tabindex="1" readonly="true" value="<?php echo $objeto->nomUsuario ?>">

                                        </div>

                                    </div>
                                    <input type="text" name="idPeticion" hidden value="<?php echo $objeto->idPeticion ?>">

                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <!-- Proveedor -->
                                            <label>Proveedor</label>
                                            <select name="proveedor" id="proveedor" class="form-control" readonly="true">
                                                <option value="<?php echo $objeto->proveedor ?>"><?php echo $objeto->proveedor ?></option>
                                                <option value="UNE EPM TELECOMUNICACIONES S.A.">UNE EPM TELECOMUNICACIONES S.A.</option>
                                                <option value="COLOMBIA MÓVIL S.A. E.S.P.">COLOMBIA MÓVIL S.A. E.S.P.</option>
                                                <option value="EDATEL S.A.">EDATEL S.A.</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <!-- Proveedor -->
                                            <label>Producto/s</label>
                                            <select name="productos" id="producto" class="form-control" readonly="true">
                                                <option value="<?php echo $objeto->productos ?>"><?php echo $objeto->productos ?></option>
                                                <?php foreach ($productos as $key) { ?>
                                                    <option value="<?php echo $key['nombreProducto'] ?>"><?php echo $key['nombreProducto'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="observacion">Observaciones</label>
                                            <textarea name="observacion" id="observacion" readonly="true" value="<?php echo $objeto->observacion ?>" rows="4" class="form-control"><?php echo $objeto->observacion ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="file">Anexo</label>
                                            <br>

                                            <input type="file" hidden name="pdf_file" id="pdf_file" accept="application/pdf" />
                                            <input type="button" class="btn btn-info" id="archivosSubidos" onclick="alerta()" style="margin-right: 40px" data-toggle="modal" data-target="#archivos" value="Archivos subidos"><br>
                                            <input type="text" name="idPdf" value="<?php echo $objeto->idPdf ?>" hidden>
                                            <br>


                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="estado">Estado</label>
                                            <select name="estado" id="estado" class="form-control">
                                                <option value="<?php echo $objeto->estado ?>"><?php echo $objeto->estado ?></option>
                                                <option value="Borrador">Borrador</option>
                                                <option value="Enviado">Enviado</option>

                                            </select>
                                        </div>
                                    </div>

                                    <?php date_default_timezone_set("America/Bogota");
                                    $year =  date('Y-m-d (H:i:a)');
                                    ?>

                                    <input type="text" name="fecCierre" id="fecCierre" value="<?php echo $objeto->fecCierre ?>" hidden="true">
                                    <input type="text" name="fecPendiente" id="fecPendiente" value="<?php echo $objeto->fecPendiente ?>" hidden="true">

                                    <br><br>
                                    <center>
                                        <input type="submit" name="accion" value="Cancelar" class="btn btn-danger">
                                        <input type="submit" name="accion" value="Actualizar" class="btn btn-primary">
                                    </center>




                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include FOLDER_TEMPLATE . "footer.php"; ?>
            </div>
        </div>



    </div>
    <script>
        $('#actualizarPeticion').submit(function() {
            var estado = $('#estado').val();
            var fcierre = $('#fecCierre').val();
            if (estado === 'Borrador') {
                $('#fecPendiente').html('<input type="text" name="fecPendiente" id="fecPendiente" value="<?php echo $year ?>" hidden="true">');
            }
            if (estado === 'Enviado') {
                $('#fecCierre').html('<input type="text" name="fecCierre" id="fecCierre" value="<?php echo $year ?>" hidden="true">');

            }

        })
    </script>

    <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

</body>

</html>