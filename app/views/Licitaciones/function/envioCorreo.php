<?php
session_start();
include("../../clases/clases_funciones.php");

 $sentencia  = new conexion;
 
 $seguimiento = $sentencia->_conexion();
 $usuario = $_POST['usuario'];

$consulta = $seguimiento->query("SELECT * FROM login where usuario = '$usuario'");
	foreach ($consulta as $key) {
				$login			= $key['usuario'];
				$nombre			= $key['nombre'];
				$hashclave		= $key['clave_1'];
				$rol			= $key['Tprivilegio'];
				$correo = $key['correo'];
				$recuperar = $key['Recuperar'];
}
if (isset($nombre)) {
$actualizar = $seguimiento->query("UPDATE login set recuperar = '1' where usuario = '$usuario'");
header('location: ../../../recuperarContrasena.php?enviado');
}else{
print '<script languaje="JavaScript">alert("Usuario incorrecto, intentelo nuevamente"); </script>';
echo "<script language='javascript'>window.location='../../../recuperarContrasena.php'</script>"; 
}

