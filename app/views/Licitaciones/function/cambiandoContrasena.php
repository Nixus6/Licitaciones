<?php
session_start();
include("../../../models/clases_funciones.php");

 $sentencia  = new conexion;
 
 $seguimiento = $sentencia->_conexion();
$contrasena = $_POST['cambio'];
$id_login= $_SESSION['id'];
$passHash		= 	password_hash($contrasena, PASSWORD_BCRYPT);
$consulta = $seguimiento->query("UPDATE login set clave_1 = '$passHash' ,  nvClave = '0' where id = $id_login");
echo "<script language='javascript'>window.location='../../principal.php'</script>"; 