<?php //include "../../../config.php"; 
?>
<?php
// session_start();
// if (isset($_SESSION['id'])) {
// } else {
//     header('location: ../index.php');
// }
// include("../../models/clases_funciones.php");
// include("app/models/clases_funciones.php");
// $sentencia  = new conexion;
// $seguimiento = $sentencia->_conexion();

// $id = $_SESSION['id'];
// $query = $seguimiento->query("SELECT rolescerti.nombreRol FROM rolescerti INNER JOIN login on rolescerti.id_rol = login.PrivilegioCert WHERE login.id = $id;");
// $queryAcceso = $seguimiento->query("SELECT tipo_acceso.Acceso FROM tipo_acceso INNER JOIN login on tipo_acceso.Id_TA = login.Acceso WHERE login.id = $id;");
// $querytodo = $seguimiento->query("SELECT * FROM login WHERE id = $id");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8" id="VentanaMiPerfil">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <a href="<?php echo SERVERURL; ?>principal/"><i style="color:black;font-size: 20px;float: right;" class="fas fa-home"></i></a>
                        <div id="fondoicono" class="card-icon">
                            <i><img style=" width: 30px; height: 30px;" src="<?= URL_IMG ?>iconos/configuser.png"></i>
                        </div>
                        <h4 class="card-title">Mi Perfil -
                            <small class="category">Información de mi Perfil</small>
                        </h4>
                        <div class="principal">
                            <img id="ImgPrin" id="divImg" class="imgArea" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area">
                        </div>
                    </div>
                    <div class="card-body">

                        <form>
                            <?php
                            // foreach ($querytodo as $keyT) {
                            ?>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Documento</label>
                                            <br>
                                            <span id="letraP"><?php echo $_SESSION['cedula'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Usuario de Red</label>
                                            <br>
                                            <span id="letraP"><?php echo $_SESSION['usuario']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="align-items: center;" class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Nombre Completo</label>
                                            <br>
                                            <span id="letraP"><?php echo $_SESSION['Nombre_SL']; ?><?php $_SESSION['Apellido_SL']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Correo</label>
                                            <br>
                                            <span id="letraP"><?php //echo $keyT['correo']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="align-items: center;" class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Privilegio Licitaciones </label>
                                            <br>
                                            <span id="letraP"><?php echo $_SESSION['PLicitaciones'] ?></span>
                                        </div>
                                    </div>
                                <?php //} ?>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Privilegio Certificaciones</label>
                                        <br>
                                        <span id="letraP"><?php echo $_SESSION['PCertificaciones'] ?></span>
                                    </div>
                                </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div style="align-items: center;" class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Acceso</label>
                                            <br>
                                            <span id="letraP"><?php echo $_SESSION['TAcceso'] ?></span>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a id="actualizarusuario" href="<?php echo SERVERURL; ?>ActualizarPerfil/" type="submit" class="btn btn-rose pull-right ">Modificar Perfil</a>
                        <a id="cambiarClave" href="<?php echo SERVERURL; ?>cambiarClave/" type="submit" class="btn btn-rose pull-right ">Cambiar Contraseña</a>
                        <!-- <div class="clearfix"></div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>