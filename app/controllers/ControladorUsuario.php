<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
  header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");
$pdo = new conexion;
if(isset($_POST['iniciar'])){
			
			$nombre			=   $_POST['nombre'];
			$usuario		=   strtoupper($_POST['usuario']);
			$clave			=   $_POST['clave'];
			$cedula			=   $_POST['cedula'];
			$correo			=	$_POST['correo'];
			$passHash		= 	password_hash($clave, PASSWORD_BCRYPT);
			$datosG			=	array(

								$usuario,
								$nombre,
								$passHash,
								$cedula,
								$correo,
                                'Usuario',
								'0',
								0
							);
			
			$execute		=	$pdo->insertarRegistros('login',$datosG);
			$execute  = $pdo->insertar('sptli', $nombre,'1');
			header("Location: ../../administrador/usuarios.php");


		}
	
	?>