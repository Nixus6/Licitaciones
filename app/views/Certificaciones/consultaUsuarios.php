<?php include "../../../config.php"; ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
  include("../../models/conexionCERT.php");
  if ($_SESSION['rolcerti'] == '2' || $_SESSION['rolcerti'] == '3') {
    header('location: menuPrincipal.php');
  }
} else {
  header('location: ../index.php');
}
$conexion  = new conexionCert;
$execute = $conexion->conectar();

$sql = $execute->query("SELECT u.id_usuario,u.nickname,u.correo,u.contrasena,r.nombreRol as id_rol,u.nameUser FROM usuarios u LEFT OUTER JOIN roles r ON u.id_rol = r.id_rol");

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
              <div class="card-body">
                <center>
                  <h4>Usuarios</h4>
                </center>
                <a href="agregarUsuario.php" class="btn btn-primary"><i class="now-ui-icons ui-1_simple-add"></i> Agregar usuario</a>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre de red</th>
                        <th>correo</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-striped"><br>
                      <?php
                      foreach ($sql as $key) { ?>
                        <tr>
                          <td><?php echo $key['nickname']; ?></td>
                          <td><?php echo $key['correo']; ?></td>
                          <td><?php echo $key['nameUser']; ?></td>
                          <td><?php echo $key['id_rol']; ?></td>
                          <td><a href="editarUsuario.php?id=<?php echo $key['id_usuario'] ?>" class='btn btn-primary btn-sm'><span class='now-ui-icons ui-2_settings-90'></span></a></td>
                        </tr>
                      <?php } ?>
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
  </div>

  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

</body>

</html>