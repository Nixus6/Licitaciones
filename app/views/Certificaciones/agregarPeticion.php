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

$sector = $execute->query("SELECT * FROM sector");
$productos = $execute->query("SELECT * FROM productos");

if (isset($_GET['idPdf'])) {

    $prueba = $_GET['idPdf'];
} else {

    $prueba = "";
}



//------------------------------------------------------------------
if (isset($_POST["Gpdf"])) {



    $allowedExts = array("pdf");
    $temp = explode(".", $_FILES["pdf_file"]["name"]);
    if ($_GET['idPdf'] != "") {
        $d = $_GET['idPdf'];
    } else {
        $d = rand(1, 1000000);
    }
    $r = $d;
    $extension = end($temp);
    $upload = $r . '_';
    $upload_pdf = $_FILES["pdf_file"]["name"];
    $upload_insert = $upload . $upload_pdf;
    $d = rand(1, 300);



    move_uploaded_file($_FILES["pdf_file"]["tmp_name"], "uploads/pdf/" . $r . "_" . $_FILES["pdf_file"]["name"]);

    $sql = "INSERT INTO pdfspeticion (pdf,idpeticion) VALUES ('$upload_insert','$r')";

    if ($upload_pdf && $execute->query($sql) == true) {



?>
        <script>
            alert('SE HAN SUBIDO LOS DOCIUMENTOS CORRECTAMENTE');
            location.href = "agregarPeticion.php?idPdf=<?php echo $r ?>";
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('NO SE HA SUBIDO NINGUN DOCUMENTO');
        </script>
<?php
    }
}



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

    #border {
        border-style: inset;
        border-color: #bbb9b9;
        border-radius: 20px;
        border-width: 4px;
        border-top-width: 6px;
        border-right-width: 6px;




        -webkit-box-shadow: -8px -4px 12px -3px rgba(0, 0, 0, 0.9);
        -moz-box-shadow: -8px -4px 12px -3px rgba(0, 0, 0, 0.9);
        box-shadow: -8px -4px 12px -3px rgba(0, 0, 0, 0.9);
    }
</style>

<body class="">
    <div class="wrapper ">

        <div class="main-panel">

            <?php include FOLDER_TEMPLATE . "menu.php"; ?>

            <?php include FOLDER_TEMPLATE . "top.php"; ?>

            <!-- Modal de los certificados -->
            <div class="modal fade" id="archivos" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">

                            <?php
                            if (isset($_GET['idPdf'])) {
                                $consulta = $execute->query(" SELECT * FROM pdfspeticion WHERE idpeticion = $prueba");
                                //$total = mysqli_num_rows(mysqli_query($execute, "SELECT * FROM pdfspeticion WHERE idpeticion = $prueba"));
                            ?>
                                <center>
                                    <h4 class="font-weight-bold">Archivos subidos</h4>
                                    <br>
                                    <?php foreach ($consulta as $key) { ?>

                                        <a href="uploads/pdf/<?php echo $key['pdf'] ?>" target="_blank"><?php if ($key['pdf'] !== "") {
                                                                                                            echo  $key['pdf'];
                                                                                                        } ?></a><br>

                                    <?php } ?>
                                </center>

                            <?php


                            } else {
                            ?>
                                <script>
                                    function alerta() {
                                        let h4 = document.getElementById("prueba");
                                        h4.innerHTML = "<center><p class='alert alert-danger'>No se han subido archivos</p></center>";

                                    }
                                </script>
                                <center>
                                    <h4 class="font-weight-bold">Archivos subidos</h4>
                                </center>
                                <p id="prueba"></p>
                            <?php
                            }
                            ?>




                        </div>
                    </div>
                </div>

            </div>


            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card  card-tasks">
                            <div class="card-body">
                                <?php date_default_timezone_set("America/Bogota");
                                $year =  date('Y-m-d (H:i:a)');
                                ?>


                                <center>
                                    <h4><strong>Agregar Peticion</strong></h4><br>
                                </center>
                                <div id="border">
                                    <br>
                                    <div class="form-row" style="margin-left: 2%">
                                        <div class="col-md-6">

                                            <form action="" method="post" onsubmit="return cargarArchivo();" role="form" enctype="multipart/form-data" autocomplete="off">

                                                <label for="file">Anexo</label>
                                                <br>

                                                <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
                                                <input type="button" class="btn btn-info" id="archivosSubidos" onclick="alerta()" style="margin-right: 40px" data-toggle="modal" data-target="#archivos" value="Archivos subidos"><br>
                                                <br>
                                                <button id="send" type="submit" name="Gpdf" class="btn btn-success">GUARDAR <i class="fa fa-save" style="font-size:20px;"></i></button>

                                            </form>
                                        </div>


                                    </div>
                                </div>
                                <br>
                                <div id="border">
                                    <div style="margin-left: 2%">
                                        <br>
                                        <form action="Funciones/crudPeticiones.php" method="post" autocomplete="off">

                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="fCreacion"> Fecha Creacion</label>
                                                    <input type="text" name="fecRegistro" style=" font-size:100%;" class="form-control" id="fecRegistro" tabindex="1" readonly="true" value="<?php echo $year ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="nomUsuario"> Nombre del Usuario </label>
                                                    <input type="text" name="nomUsuario" style="background:#b2dffb; color:black; font-size:100%;" class="form-control" id="nomUsuario" tabindex="1" readonly="true" value="<?php echo $_SESSION['nombre'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <!-- Proveedor -->
                                                    <label>Proveedor</label>
                                                    <select name="proveedor" id="proveedor" class="form-control" required>
                                                        <option value="">Seleccionar</option>
                                                        <option value="UNE EPM TELECOMUNICACIONES S.A.">UNE EPM TELECOMUNICACIONES S.A.</option>
                                                        <option value="COLOMBIA MÓVIL S.A. E.S.P.">COLOMBIA MÓVIL S.A. E.S.P.</option>
                                                        <option value="EDATEL S.A.">EDATEL S.A.</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <!-- Proveedor -->
                                                    <label>Producto/s</label>
                                                    <select name="productos" id="producto" class="form-control" required>
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($productos as $key) { ?>
                                                            <option value="<?php echo $key['nombreProducto'] ?>"><?php echo $key['nombreProducto'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <input name="idPdf" value="<?php echo $prueba ?>" hidden>
                                                    <label for="observacion">Observaciones</label>
                                                    <textarea name="observacion" id="observacion" rows="4" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="estado">Estado</label>
                                                    <input type="text" name="estado" id="estado" value="Pendiente" readonly class="form-control">

                                                </div>
                                            </div>

                                            <input type="text" name="fecCierre" value=" --- " hidden="true">
                                            <input type="text" name="fecPendiente" value=" --- " hidden="true">

                                            <br><br>
                                            <center>
                                                <div>
                                                    <input type="submit" name="accion" value="Cancelar" class="btn btn-danger">
                                                    <input type="submit" name="accion" value="Guardar" class="btn btn-primary">

                                                </div>
                                            </center>




                                        </form>


                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <?php include FOLDER_TEMPLATE . "footer.php"; ?>

            </div>
        </div>


    </div>



    <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

    <script>
        function cargarArchivo() {

            var file = $("#file-upload")[0].files[0];
            if (file) {
                var fileName = file.name;
                var fileSize = file.size;
                var fileType = file.type;
                if (fileType === 'application/pdf' || fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || fileType === 'image/gif' || fileType === 'image/jpeg' || fileType === 'image/png' || fileType === 'image/bmp' || fileType === 'image/jpeg') {
                    alert("Se ha cargado un archivo: " + fileName);
                } else {
                    alertify.error('El formato del archivo no esta permitido');
                    alertify.error('Tipo de archivo: ' + fileType);
                    alertify.log("Los formatos admitidos son: PDF, archivos de Word");
                    return false;
                }
            } else {

            }

        }
    </script>
    <!--   Core JS Files   -->


</body>


</html>