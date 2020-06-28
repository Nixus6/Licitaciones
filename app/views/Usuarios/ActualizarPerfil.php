<?php
$id = $_SESSION['id'];

include("app/models/clases_funciones.php");
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$querytodo = $seguimiento->query("SELECT * FROM login WHERE id = $id");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8" id="VentanaMiPerfil">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <a href="<?php echo SERVERURL; ?>MiPerfil/" id="atras"><img style="cursor: pointer;width: 20px;height:20px;float: right;" src="<?= URL_IMG ?>iconos/return.png"></a>
                        <div id="fondoicono" class="card-icon">
                            <i><img style=" width: 30px; height: 30px;" src="<?= URL_IMG ?>iconos/configuser.png"></i>
                        </div>
                        <h4 class="card-title">Mi Perfil -
                            <small class="category">Información de mi Perfil</small>
                        </h4>


                        <div class="picture-container">
                            <div class="picture">
                                <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area">
                                <input type="file" id="file" class="valid" aria-invalid="false">
                            </div>
                            <h6 class="description">Seleccione Fotografia</h6>
                        </div>




                    </div>
                    <div class="card-body">
                        <form name="formularioAU" id="formularioAU" method="POST" action="<?php echo SERVERURL; ?>MiPerfil/">
                            <?php
                            foreach ($querytodo as $keyT) {
                            ?>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Documento</label>
                                            <br>
                                            <input style="text-align: center" id="cedula" name="cedula" value="<?php echo $keyT['cedula']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Usuario Registro</label>
                                            <br>
                                            <input style="text-align: center" id="usuario" name="usuario" value="<?php echo $keyT['usuario']; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="align-items: center;" class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Nombre Completo</label>
                                            <br>
                                            <input style="text-align: center" id="nombre" name="nombre" value="<?php echo $keyT['nombre']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Correo</label>
                                            <br>
                                            <input style="text-align: center" id="correo" name="correo" value="<?php echo $keyT['correo']; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr>
                            <button id="actualizarusuario" type="submit" class="btn btn-rose pull-right" onclick="actualizar_datos();">Guardar</button>
                            <div class="clearfix"></div>
                            <input type="text" name="idUser" id="idUser" value="<?php echo $_SESSION['id']; ?>" hidden>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>