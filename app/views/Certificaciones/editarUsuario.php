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

$id = $_GET['id'];
$rol = $execute->query("SELECT * FROM roles");


$sentencia = $execute->prepare("SELECT u.id_usuario,u.nickname,u.correo,u.contrasena,r.nombreRol as rol, r.id_rol, u.nameUser FROM usuarios u LEFT OUTER JOIN roles r ON u.id_rol = r.id_rol where id_usuario = ?");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="es">

<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body class="">
  <div class="wrapper ">

    <?php include FOLDER_TEMPLATE . "menu.php"; ?>

    <div class="main-panel">

      <?php include FOLDER_TEMPLATE . "top.php"; ?>

      <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card  card-tasks">
              <div class="card-body ">
                <center>
                  <h4>Actualizar usuario</h4>
                </center>
                <form method="post" action="Funciones/crudUsuarios.php" autocomplete="off">
                  <input type="hidden" name="id" value="<?php echo $objeto->id_usuario ?>" hidden>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input name="nameUser" type="text" class="form-control form-control-success" value="<?php echo $objeto->nameUser ?>" required />
                      </div>
                      <div class="form-group">
                        <label class="control-label"> Nombre de red </label>
                        <input name="nickname" type="text" class="form-control form-control-success" value="<?php echo $objeto->nickname ?>" required />
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-group">
                        <label class="control-label"> Correo </label>
                        <input name="correo" type="text" class="form-control form-control-success" value="<?php echo $objeto->correo ?>" required />
                      </div>

                      <div class="form-group">
                        <label class="control-label"> Rol </label>
                        <select name="id_rol" id="id_rol" class="form-control">
                          <option value="<?php echo $objeto->id_rol ?>"><?php echo $objeto->rol ?></option>
                          <?php foreach ($rol as $key) { ?>
                            <option value="<?php echo $key['id_rol'] ?>"><?php echo $key['nombreRol'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <center><button type="submit" name="accion" value="Actualizar" class="btn btn-primary">Actualizar</button></center>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php include FOLDER_TEMPLATE . "footer.php"; ?>

      </div>
    </div>


  </div>
  </div>

  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

  </script>
</body>

</html>