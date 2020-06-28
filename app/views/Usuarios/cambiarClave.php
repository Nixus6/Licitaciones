<?php //include "../../../config.php"; 
?>
<?php
// session_start();
// if (isset($_SESSION['id'])) {
// } else {
//   header('location: ../index.php');
// }
// include("../../models/clases_funciones.php");
include("app/models/clases_funciones.php");
$id = $_SESSION['id'];
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
$sentencia = $seguimiento->query("SELECT * FROM login WHERE id = $id");
foreach ($sentencia as $key) {
  $nombre_perfil = $key['Tprivilegio'];
  $estado = $key['estado'];
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-8" id="VentanaMiPerfil">
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <a href="<?php echo SERVERURL; ?>MiPerfil/"><img style="cursor: pointer;width: 20px;height:20px;float: right;" src="<?= URL_IMG ?>iconos/return.png"></a>
            <div id="fondoicono" class="card-icon">
              <i><img style=" width: 30px; height: 30px;" src="<?= URL_IMG ?>iconos/configuser.png"></i>
            </div>
            <h4 class="card-title">Mi Perfil -
              <small class="category">Cambio de Contraseña</small>
            </h4>
            <div class="principal">
              <img id="ImgPrin" id="divImg" class="imgArea" src="<?= URL_IMG ?>iconos/png/boy.png" alt="Logo del Area">
            </div>
          </div>
          <div class="card-body">

            <form method="post" action="../Licitaciones/function/cambiarClave.php" onsubmit="return validarContrasena();" autocomplete="off">
              <input type="number" name="id_usuario" value="<?php echo $id ?>" hidden>
              <div class="row justify-content center">
                <div class="col-md-5">
                  <div class="form-group">
                    <h8 class="card-title"> Recomendaciones:</h8>
                    <br>
                    <label class="alert-info" style="color:black;"><b>1. </b>La nueva contraseña debe coincidir con la confirmación de la contraseña</label>
                    <label class="alert-info" style="color:black;"><b>2. </b>La nueva contraseña no debe contener espacios en blanco</label>
                    <label class="alert-info" style="color:black;"><b>3. </b>La nueva contraseña debe ser minimo de 9 digitos</label>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="first-name" for="nombre" style="color:black;">Nueva Contraseña: </label>
                    <input type="password" name="cambio" id="contraseñaNueva" class="form-control" style="text-align:center">
                  </div>
                  <div class="form-group">
                    <label for="second-name" for="nombre" style="color:black;">Confirmar Contraseña: </label>
                    <input type="password" name="cambio2" id="confirmarContraseña" class="form-control" style="text-align:center">
                  </div>
                </div>
              </div>
              <br>
              <input id="actualizarusuario" type="submit" class="btn btn-rose pull-right" value="Guardar contraseña">
              <br>
              <center>
                <span class="alert-danger" id="alerta"></span>
              </center>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>

</div>