<div class="modal fade in show" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>Iconos/stamp.png"></i>
                <h4 class="card-title"><span style="color: green">Bienvenido</span> al Sistema de Grupo Licitaciones Nuevo Usuario
                    <br>
                    <small class="category">Para continuar usando el sistema debe conocer y modificar la siguiente información acerca de su perfíl</small>
                </h4>

            </div>
            <div class="modal-body">

                <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;">Información</h2>
                <form method="post" action="Licitaciones/function/cambiandoContrasena.php" onsubmit="return validarContrasena();" autocomplete="off">

                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Perfil</label>
                            <br>
                            <div class="principal">
                                <img id="ImgPrin" id="divImg" class="imgArea" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Usuario de Red</label>
                            <br>
                            <span id="letraP"><?php echo $_SESSION['usuario']; ?></span>
                            <br>
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Nombre Completo</label>
                            <br>
                            <span id="letraP"><?php echo $_SESSION['nombre']; ?></span>
                            <br>
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Documento</label>
                            <br>
                            <span id="letraP"><?php echo $_SESSION['cedula']; ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Privilegio Licitaciones</label>
                            <br>
                            <span id="letraP"><?php echo $_SESSION['rollicita']; ?></span>
                            <br>
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Privilegio Certificaiones</label>
                            <br>
                            <?php
                            foreach ($query as $keyCert) {
                            ?>
                                <span id="letraP"><?php echo $keyCert['nombreRol']; ?></span>
                            <?php } ?>
                            <br>
                            <label class="bmd-label-floating" style="font-size: 0.8571em;margin-bottom: 5px;color: #9A9A9A;">Acceso</label>
                            <br>
                            <?php
                            foreach ($queryAcceso as $key) {
                            ?>
                                <span id="letraP"><?php echo $key['Acceso']; ?></span>
                            <?php } ?>

                        </div>
                    </div>
                    <hr>
                    <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;">Modificar</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Clave Peredeterminada</label>
                                <br>
                                <span id="letraP"><?php echo $_SESSION['cedula']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Nueva Contraseña</label>
                                <input id="contraseñaNueva" name="cambio" placeholder="Escriba su documento de identidad" class="form-control" type="password">
                                <br>
                                <label class="bmd-label-floating">Confirmar Contraseña</label>
                                <input id="confirmarContraseña" name="cambio2" placeholder="Escriba su documento de identidad" class="form-control" type="password">
                                <br>
                                <center>
                                    <span class="alert-danger" id="alerta"></span>
                                </center>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="iniciar" id="btnRegistrar">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validarContrasena() {
        var p1 = document.getElementById("contraseñaNueva").value;
        var p2 = document.getElementById("confirmarContraseña").value;
        if (p1 != p2) {
            $('#alerta').html("Las contraseñas deben coincidir");
            return false;
        } else {}
        var espacios = false;
        var cont = 0;

        while (!espacios && (cont < p1.length)) {
            if (p1.charAt(cont) == " ")
                espacios = true;
            cont++;
        }

        if (espacios) {
            $('#alerta').html("La contraseña no puede contener espacios en blanco");
            return false;
        }
        if (p1.length == 0 || p2.length == 0) {
            $('#alerta').html("Los campos de la contraseña no pueden quedar vacios");
            if (p2.length == 0) {
                $('#confirmarContraseña').focus();
            }
            if (p1.length == 0) {
                $('#contraseñaNueva').focus();
            }
            return false;
        }
        if (p1.length < 9) {
            $('#alerta').html("La contraseña debe ser minimo de 9 digitos");
            return false;
        }


    }
</script>

<div id="overflow" class="modal-backdrop fade show" style="display: none;"></div>

<script type="text/javascript">
  //  $(document).ready(function() {
    //    $('#miModal').removeClass('modal fade in show').addClass('modal fade').css('display', 'none');
    //    $('#overflow').removeClass('modal-backdrop fade show').addClass('modal-backdrop fade').css('display', 'none');
    //    $('#miModal').modal("hide");

    //});
    //function ocultar() {
    //  $('#miModal').removeClass('modal fade in show').addClass('modal fade').css('display','none');
    ///   $('#overflow').removeClass('modal-backdrop fade show').addClass('modal-backdrop fade').css('display','none');
    //  $('#miModal').modal("hide");

    //  }
    // $(window).on("load", ocultar);
</script>