<?php
include "../../../../config.php";
include FOLDER_TEMPLATE . "head.php";
session_start();
include("../../../models/clases_funciones.php");

$sentencia  = new conexion;

$seguimiento = $sentencia->_conexion();
$contrasena = $_POST['cambio'];
$id_login = $_POST['id_usuario'];
$passHash        =     password_hash($contrasena, PASSWORD_BCRYPT);
$consulta = $seguimiento->query("UPDATE login set clave_1 = '$passHash' where id = $id_login");
print "<script languaje='JavaScript'>alertify.success('Se Actualizo Su Contraseña'); </script>";
echo "<script language='javascript'>window.location='../../Usuarios/MiPerfil.php'</script>";
include FOLDER_TEMPLATE . "scripts.php";
