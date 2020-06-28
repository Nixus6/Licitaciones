<?php //include "../../../config.php"; 
?>

<?php
// include("app/models/clases_funciones.php");
//include("../../models/clases_funciones.php");
// $sentencia  = new conexion;
// $seguimiento = $sentencia->_conexion();
// $login = $sentencia->_consultastablasGenerales("login");


// $sentencia = $seguimiento->query("SELECT * FROM tipo_acceso where id_TA<=3");
// $sentenciaP = $seguimiento->query("SELECT * FROM tipo_acceso where id_TA<=3");
// $privCert = $seguimiento->query("SELECT * FROM rolescerti");
// $problemas = $seguimiento->query("SELECT * FROM rolescerti");

?>
<!-- Inicio Modal Registrar Usuario -->

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>Iconos/stamp.png"></i>
        <h4 class="card-title">Nuevo Usuario
        </h4>
        <button id="cerrar" data-dismiss="modal" aria-label="Close" type="button" class="close" data-backdrop="false">
          <span aria-hidden="true" class="w3-button w3-display-topright">&times;</span>
        </button>

      </div>
      <form action="" data-form="save" id="formRegistrarUsuario" class="FormularioAjax" autocomplete="off" method="POST">
        <div class="modal-body">
          <fieldset>
            <div class="Subtitulo">
              <i class="far fa-id-card" id="IconoSubtitulo"></i>
              <h2 style="margin-bottom:0px">Información Personal</h2>
            </div>
            <div class="container-fluid">
              <div class="row">

                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating is-empty">
                    <!---Nombre--->
                    <label for="clave">Nombre</label>
                    <input name="nombre" placeholder="Escriba su nombre completo" class="form-control" id="nombre" value="Natalia">
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating is-empty">
                    <!---Apellido--->
                    <label for="clave">Apellido</label>
                    <input name="apellido" placeholder="Escriba su nombre completo" class="form-control" id="apellido" value="Lara">
                  </div>

                </div>

                <div class="col-xs-12 col-md-12">
                  <div class="form-group label-floating is-empty">
                    <!---Cedula--->
                    <label for="clave">Cedula</label>
                    <input id="cedula" name="cedula" placeholder="Escriba su documento de identidad" class="form-control" value="1001024679">

                  </div>
                </div>

              </div>
            </div>
          </fieldset>
          <br>
          <fieldset>
            <div class="Subtitulo">
              <img style=" width: 20px; height: 20px;" id="IconoSubtitulo" src="<?= URL_IMG ?>iconos/old-keys.png">
              <h2 style="margin-bottom:0px">Datos de la Cuenta</h2>
            </div>
            <div class="container-fluid">
              <div class="row">

                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating is-empty">
                    <!---Usuario--->
                    <label for="clave">Usuario de red</label>
                    <input id="usuario" name="usuario" placeholder="Escriba su Usario de red" class="form-control" value="NLARAT">
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating is-empty">
                    <!---Clave de ingreso--->
                    <label for="clave">Clave de Ingreso Predeterminada</label>
                    <br>
                    <span id="mostrarclave" name="mostrarclave"></span>
                    <input id="clave" name="clave" placeholder="Ingrese su clave" class="form-control" hidden>
                  </div>
                </div>


                <div class="col-xs-12 col-md-12">
                  <div class="form-group label-floating is-empty">
                    <!---correo--->
                    <label for="clave">Correo</label>
                    <input placeholder="Ejemplo@ejemplo.com" id="email" name="email" class="form-control" value="Natalia.Lara@Tigo.Une.com">
                  </div>
                </div>

              </div>
            </div>
          </fieldset>
          <br>
          <fieldset>
            <div class="Subtitulo">
              <img style=" width: 30px; height: 30px;" id="IconoSubtitulo" src="<?= URL_IMG ?>iconos/movie.png">
              <h2 style="margin-bottom:0px">Nivel de Acceso</h2>
            </div>
            <div class="container-fluid">
              <!-- <div class="row justify-content-center" style="text-align: center">
            <div class="col-md-6">
              <label for="clave">Seleccione las Areas de Acceso</label>
              <select class="form-control" name="Acceso" id="SelePrivilegio" style="text-align-last: center;">
                <option value="0">Seleccione</option>
              </select>
            </div>
          </div> -->

              <!-- codigo de seleccion multiple -->
              <div class="row">

                <div class="col-xs-12 col-sm-6">
                  <p class="text-left">
                  </p>
                  <input type="radio" id="radio1" value="option1" name="radio1" class="radio_input">
                  <div class="badge badge-success">Multipe</div> Control total del sistema
                  <p></p>
                  <p class="text-left">
                  </p>
                  <div class="badge badge-primary">Licitaciones</div> Permiso para registro y actualización
                  <p></p>
                  <p class="text-left">
                  </p>
                  <div class="badge badge-info">Certificaciones</div> Permiso para registro
                  <p></p>
                </div>

                <div class="col-xs-12 col-sm-6">

                  <label class="radio" for="myRadioId">
                    <input type="radio" id="radio1" value="option1" name="radio1" class="radio_input">
                    <div class="radio_radio"></div>
                    <!-- <span></span> -->
                    Multiple
                  </label>
<!-- 
                  <label class="radio" for="myRadioId">
                    <input type="radio" id="radio1" value="option1" name="radio1" class="radio_input">
                    <div class="radio_radio"></div>
                    Licitaciones
                  </label>

                  <label class="radio" for="myRadioId">
                    <input type="radio" id="radio1" value="option1" name="radio1" class="radio_input">
                    <div class="radio_radio"></div>
                    Certificaciones
                  </label> -->

                </div>

              </div>
            </div>
          </fieldset>

          <div id="PrivilegiosSect" style="display: none;">

            <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Privilegios</h2>
            <div class="row justify-content-center" id="c" style="text-align: center">
              <div class="col-md-6">
                <label for="clave" id="txtC">Seleccione Privilegio Para Certificaciones</label>
                <select class="form-control" name="PrivilegioC" id="PC" style="text-align-last: center;">
                  <option value="0">Seleccione</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center" id="l" style="text-align: center">
              <div class="col-md-6">
              <!-- espacio si es soporte o no de Licitaciones -->
                <label for="clave" id="txtL">Seleccione Privilegio Para Licitaciones</label>
                <select id="PL" name="Tprivilegio_perfil" class="form-control" style="text-align-last: center;" required>
                  <option value="0">Seleccione</option>
                </select>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="btnRegistrar" id="btnRegistrar" onclick="registrarUsuario();">Registrar</button>
        </div>

        <div class="RespuestaAjax"></div>
      </form>
    </div>

  </div>
</div>

<!-- Fin Modal Registrar usuario -->







<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card bootstrap-table">

          <div class="card-body ">

            <a href="<?php echo SERVERURL; ?>principal/"><i style="color:black;font-size: 20px;float: right;" class="fas fa-home"></i></a>

            <center>
              <h2 style="margin-top: 20px">Usuarios Registrados</h2>
            </center><br>



            <div class="table">
              <div class="row justify-content">
                <!-- <div class="col-md-3">
                  <input class="form-control" type="text" id="search" placeholder="Buscar" />
                </div> -->
                <div class="col-md-3">
                  <button id="NuevoUsuario" data-toggle="modal" data-target="#miModal" class="btn btn-outline-primary">Nuevo Usuario</button>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table id="datatablesU" class="table table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                  <thead class="" style="text-align: center;" id="letrastablas">
                    <tr>
                      <!-- <th>
                        <h5 class="letrastablas">Documento</h5>
                      </th> -->
                      <th>
                        <h5 class="letrastablas">Usuario</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Nombre del usuario</h5>
                      </th>

                      <th>
                        <h5 class="letrastablas">Correo</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Privilegio</h5>
                        <h5 class="letrastablas">Licitaciones</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Privilegio</h5>
                        <h5 class="letrastablas">Certificaciones</h5>
                      </th>
                      <!-- <th>
                        <h5 class="letrastablas">Acceso</h5>
                      </th> -->
                      <th>
                        <h5 class="letrastablas">Estado</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Modificar</h5>
                        <h5 class="letrastablas">Privilegios</h5>
                      </th>
                    </tr>
                  </thead>
                  <tfoot style="text-align: center;" id="letrastablas">
                    <tr>
                      <!-- <th>
                        <h5 class="letrastablas">Documento</h5>
                      </th> -->
                      <th>
                        <h5 class="letrastablas">Usuario</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Nombre del usuario</h5>
                      </th>

                      <th>
                        <h5 class="letrastablas">Correo</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Privilegio</h5>
                        <h5 class="letrastablas">Licitaciones</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Privilegio</h5>
                        <h5 class="letrastablas">Certificaciones</h5>
                      </th>
                      <!-- <th>
                        <h5 class="letrastablas">Acceso</h5>
                      </th> -->
                      <th>
                        <h5 class="letrastablas">Estado</h5>
                      </th>
                      <th>
                        <h5 class="letrastablas">Modificar</h5>
                        <h5 class="letrastablas">Privilegios</h5>
                      </th>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>



          </div>
        </div>


      </div>
    </div>
  </div>

</div>

<!-- modal modificar Privilegios -->
<!-- <div class="modal fade" id="modalprivilegios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img id="photo" style="cursor: pointer; height: 30px" src="<?= URL_IMG ?>iconos/gdpr.png" alt="Logo del Area">
        <h4 class="card-title">Modificar Privilegios
        </h4>
        <button id="cerrar" data-dismiss="modal" aria-label="Close" type="button" class="close" data-backdrop="false">
          <span aria-hidden="true" class="w3-button w3-display-topright">&times;</span>
        </button>

      </div>

      <div class="modal-body">
        <form>

          <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: center;">Privilegio/s Actual/es</h2>
          <div class="row justify-content-center" style="text-align: center">

            <div class="col-md-2">


              <label for="clave">Accesso</label>
              <br>
              <span style="text-transform: capitalize;color: black;font-size: medium;" id="Acceso" name="Acceso"></span>

              <br>

            </div>
            <div class="col-md-2">

              <label for="clave">Licitaciones</label>
              <br>
              <span style="text-transform: capitalize;color: black;font-size: medium;" id="PrivilegioL" name="PrivilegioL"></span>

              <br>

            </div>
            <div class="col-md-2">

              <label for="clave">Certificaciones</label>
              <br>
              <span style="text-transform: capitalize;color: black;font-size: medium;" id="PrivilegioC" name="PrivilegioC"></span>

              <br>

            </div>

          </div>
          <hr>
          <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: center;">Modificar Acceso</h2>
          <div class="row justify-content-center" style="text-align: center">

            <div class="col-md-6">
              <label for="clave">Seleccione El Area de Acceso</label>
              <select class="form-control" name="TAccesoP" id="TAccesoP" style="text-align-last: center;">
                <option value="0">Seleccione</option>
                <?php
                //foreach ($sentenciaP as $keyA) {
                ?>
                  <option value=""><?php // echo $keyA['Acceso']; 
                                    ?></option>
                <?php //} 
                ?>
              </select>
            </div>

          </div>


          <hr>
          <h2 style="font-size: 1.714em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: center;">Modificar Privilegios</h2>
          <div class="row justify-content-center" id="c" style="text-align: center">
            <div class="col-md-6">
              <label for="clave" id="txtC">Seleccione Privilegio Para Certificaciones</label>
              <select class="form-control" name="PrivilegioCP" id="PrivilegioCP" style="text-align-last: center;">
                <option value="0">Seleccione</option>
                <?php
                //foreach ($problemas as $keyCert) {
                ?>
                  <option value=""><?php //echo $keyCert['nombreRol']; 
                                    ?></option>
                <?php // } 
                ?>
              </select>
            </div>
          </div>
          <div class="row justify-content-center" id="l" style="text-align: center">
            <div class="col-md-6">
              <label for="clave" id="txtL">Seleccione Privilegio Para Licitaciones</label>
              <select id="PrivilegioLP" name="PrivilegioLP" class="form-control" style="text-align-last: center;" required>
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
                <option value="Asignar">Asignar</option>
                <option value="UsuarioCCE">Usuario CCE</option>
                <option value="ConsultorVP">ConsultorVP</option>
                <option value="Corporativo">Corporativo</option>
                <option value="Govermment">Govermment</option>
                <option value="Pymes">Pymes</option>
                <option value="Whosale">Whosale</option>
              </select>
            </div>
          </div>



          <input type="hidden" id="id">
        </form>
      </div>
      <div class="modal-footer">
        <button style="background-color: rgba(0, 123, 255,0.8);" type="submit" class="btn btn-rose pull-right" name="btnActualizarP" id="btnActualizarP" onclick="actualizar_privilegios();">Registrar</button>
      </div>

    </div>

  </div>
</div> -->