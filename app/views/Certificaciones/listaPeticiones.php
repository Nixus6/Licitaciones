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
$sql = $execute->query("SELECT * FROM peticion  order by fecRegistro  asc");
//$sql = $execute->query("SELECT * FROM peticion where nomUsuario = '". $_SESSION['nameUser']."' order by fecRegistro . desc");
$pendientes = $execute->query("SELECT * FROM peticion WHERE estado='Pendiente'");

$borradores = $execute->query("SELECT * FROM peticion WHERE estado='Borrador'");

$enviados = $execute->query("SELECT * FROM peticion WHERE estado='Enviado'");
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
                <div class="">
                    <div class="col-lg-12">
                        <div class="card  card-tasks">
                            <div class="card-body">
                                <center>
                                    <h4><strong>PETICIONES</strong></h4><br>
                                </center>

                                <label>Busqueda</label>

                                <select name="opcion" id="opcion" class="form-control">

                                    <option value="">seleccione</option>

                                    <option value="Pendiente">Pendiente</option>

                                    <option value="Borrador">Borrador</option>

                                    <option value="Enviado">Enviado</option>
                                    <option value="Todas">Todas</option>

                                </select><br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Proveedor</th>
                                                <th>Fecha Creacion</th>
                                                <th>Producto</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>



                                            </tr>
                                        </thead>
                                        <tbody class="table-striped" id="todas"><br>
                                            <?php
                                            foreach ($sql as $key) { ?>
                                                <tr>
                                                    <td><?php echo $key['nomUsuario']; ?></td>
                                                    <td><?php echo $key['proveedor']; ?></td>
                                                    <td><?php echo $key['fecRegistro']; ?></td>

                                                    <td><?php echo $key['productos']; ?></td>
                                                    <?php if ($key['estado'] === "Pendiente") { ?>
                                                        <td style="color:red"><?php echo $key['estado']; ?></td>
                                                    <?php } else if ($key['estado'] === "Borrador") { ?>
                                                        <td style="color:#E6E323"><?php echo $key['estado']; ?></td>
                                                    <?php } else if ($key['estado'] === "Enviado") { ?>
                                                        <td style="color:green"><?php echo $key['estado']; ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="editarPeticion.php?idPeticion=<?php echo $key['idPeticion'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar Peticion'><span class='now-ui-icons ui-2_settings-90'></span></a>
                                                        <a href="Funciones/crudPeticiones.php?idPeticion=<?php echo $key['idPeticion'] ?>&accion=Borrar" class='btn btn-danger btn-sm' id='btnEliminar' title='Eliminar Peticion'><span class='now-ui-icons shopping_basket'></span></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                        <tbody class="table-striped" id="pendientes" hidden><br>
                                            <?php
                                            foreach ($pendientes as $key2) { ?>
                                                <tr>
                                                    <td><?php echo $key2['nomUsuario']; ?></td>
                                                    <td><?php echo $key2['proveedor']; ?></td>
                                                    <td><?php echo $key2['fecRegistro']; ?></td>

                                                    <td><?php echo $key2['productos']; ?></td>
                                                    <?php if ($key2['estado'] === "Pendiente") { ?>
                                                        <td style="color:red"><?php echo $key2['estado']; ?></td>
                                                    <?php } else if ($key2['estado'] === "Borrador") { ?>
                                                        <td style="color:#E6E323"><?php echo $key2['estado']; ?></td>
                                                    <?php } else if ($key2['estado'] === "Enviado") { ?>
                                                        <td style="color:green"><?php echo $key2['estado']; ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="editarPeticion.php?idPeticion=<?php echo $key2['idPeticion'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar Peticion'><span class='now-ui-icons ui-2_settings-90'></span></a>
                                                        <a href="Funciones/crudPeticiones.php?idPeticion=<?php echo $key2['idPeticion'] ?>&accion=Borrar" class='btn btn-danger btn-sm' id='btnEliminar' title='Eliminar Peticion'><span class='now-ui-icons shopping_basket'></span></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                        <tbody class="table-striped" id="borrador" hidden><br>
                                            <?php
                                            foreach ($borradores as $key3) { ?>
                                                <tr>
                                                    <td><?php echo $key3['nomUsuario']; ?></td>
                                                    <td><?php echo $key3['proveedor']; ?></td>
                                                    <td><?php echo $key3['fecRegistro']; ?></td>

                                                    <td><?php echo $key3['productos']; ?></td>
                                                    <?php if ($key3['estado'] === "Pendiente") { ?>
                                                        <td style="color:red"><?php echo $key3['estado']; ?></td>
                                                    <?php } else if ($key3['estado'] === "Borrador") { ?>
                                                        <td style="color:#E6E323"><?php echo $key3['estado']; ?></td>
                                                    <?php } else if ($key3['estado'] === "Enviado") { ?>
                                                        <td style="color:green"><?php echo $key3['estado']; ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="editarPeticion.php?idPeticion=<?php echo $key3['idPeticion'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar Peticion'><span class='now-ui-icons ui-2_settings-90'></span></a>
                                                        <a href="Funciones/crudPeticiones.php?idPeticion=<?php echo $key3['idPeticion'] ?>&accion=Borrar" class='btn btn-danger btn-sm' id='btnEliminar' title='Eliminar Peticion'><span class='now-ui-icons shopping_basket'></span></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                        <tbody class="table-striped" id="enviados" hidden><br>
                                            <?php
                                            foreach ($enviados as $key4) { ?>
                                                <tr>
                                                    <td><?php echo $key4['nomUsuario']; ?></td>
                                                    <td><?php echo $key4['proveedor']; ?></td>
                                                    <td><?php echo $key4['fecRegistro']; ?></td>

                                                    <td><?php echo $key4['productos']; ?></td>
                                                    <?php if ($key3['estado'] === "Pendiente") { ?>
                                                        <td style="color:red"><?php echo $key4['estado']; ?></td>
                                                    <?php } else if ($key4['estado'] === "Borrador") { ?>
                                                        <td style="color:#E6E323"><?php echo $key4['estado']; ?></td>
                                                    <?php } else if ($key4['estado'] === "Enviado") { ?>
                                                        <td style="color:green"><?php echo $key4['estado']; ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="editarPeticion.php?idPeticion=<?php echo $key4['idPeticion'] ?>" class='btn btn-primary btn-sm' id='btnEditar' title='Editar Peticion'><span class='now-ui-icons ui-2_settings-90'></span></a>
                                                        <a href="Funciones/crudPeticiones.php?idPeticion=<?php echo $key4['idPeticion'] ?>&accion=Borrar" class='btn btn-danger btn-sm' id='btnEliminar' title='Eliminar Peticion'><span class='now-ui-icons shopping_basket'></span></a>
                                                    </td>
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

    <script type="text/javascript">
        $(document).ready(function() {
            var sidebar = document.querySelector('.sidebar');
            sidebar
        });

        $(document).ready(function() {

            $('#opcion').change(function(e) {

                if ($(this).val() === "Pendiente") {



                    $('#pendientes').prop('hidden', false);

                    $('#todas').prop('hidden', true);

                    $('#borrador').prop('hidden', true);

                    $('#enviados').prop('hidden', true);

                }

                if ($(this).val() === "Borrador") {



                    $('#borrador').prop('hidden', false);

                    $('#todas').prop('hidden', true);

                    $('#pendientes').prop('hidden', true);

                    $('#enviados').prop('hidden', true);

                }

                if ($(this).val() === "Enviado") {



                    $('#enviados').prop('hidden', false);

                    $('#todas').prop('hidden', true);

                    $('#pendientes').prop('hidden', true);

                    $('#borrador').prop('hidden', true);

                }
                if ($(this).val() === "Todas") {



                    $('#enviados').prop('hidden', true);

                    $('#todas').prop('hidden', false);

                    $('#pendientes').prop('hidden', true);

                    $('#borrador').prop('hidden', true);

                }



            })

        });
    </script>
</body>

</html>