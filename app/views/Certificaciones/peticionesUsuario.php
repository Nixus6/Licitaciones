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
$sql = $execute->query("SELECT * FROM peticion where nomUsuario = '" . $_SESSION['nombre'] . "' order by fecRegistro  asc");
?>
<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body>

    <div class="wrapper">



        <div class="main-panel">

            <?php include FOLDER_TEMPLATE . "menu.php"; ?>

            <?php include FOLDER_TEMPLATE . "top.php"; ?>

            <div class="content" style="margin-left: 18%">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card  card-tasks">
                            <div class="card-body">
                                <center>
                                    <h4><strong>PETICIONES</strong></h4><br>
                                </center>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Proveedor</th>
                                                <th>Fecha Creacion</th>
                                                <th>Fecha Enviado</th>
                                                <th>Producto</th>
                                                <th>Estado</th>




                                            </tr>
                                        </thead>
                                        <tbody class="table-striped"><br>
                                            <?php
                                            foreach ($sql as $key) { ?>
                                                <tr>
                                                    <td><?php echo $key['nomUsuario']; ?></td>
                                                    <td><?php echo $key['proveedor']; ?></td>
                                                    <td><?php echo $key['fecRegistro']; ?></td>
                                                    <td><?php echo $key['fecCierre']; ?></td>
                                                    <td><?php echo $key['productos']; ?></td>
                                                    <?php if ($key['estado'] === "Pendiente") { ?>
                                                        <td style="color:red"><?php echo $key['estado']; ?></td>
                                                    <?php } else if ($key['estado'] === "Borrador") { ?>
                                                        <td style="color:#E6E323"><?php echo $key['estado']; ?></td>
                                                    <?php } else if ($key['estado'] === "Enviado") { ?>
                                                        <td style="color:green"><?php echo $key['estado']; ?></td>
                                                    <?php } ?>


                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
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
    <!--Script peticionesUsuario -->
    <script type="text/javascript">
        $(document).ready(function() {
            var sidebar = document.querySelector('.sidebar');
            sidebar
        });
    </script>
</body>

</html>