<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {
    header('location: ../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");



$cnn = new PDO('mysql:=localhost;dbname=licitaciones', 'root', 'Vdx92ig4tur*');
$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$filtro = $_POST['filtro'];

$sql = "SELECT * FROM ejecutivossp WHERE nombre LIKE '%$filtro%' ORDER BY nombre LIMIT 0,6";

$sentencia = $cnn->prepare($sql);
$sentencia->execute();
$array = $sentencia->fetchAll();


foreach ($array as $key) { ?>
    
    <li onClick="selectCountry2('<?php echo $key["nombre"]; ?>');"><?php echo $key["nombre"]; ?></li>

<?php } ?>