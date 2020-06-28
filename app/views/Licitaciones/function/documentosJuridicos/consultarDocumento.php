<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../../iniciarSesion.php');
}
include("../../../clases/clases_funciones.php");



$cnn = new PDO('mysql:=localhost;dbname=licitaciones','root', 'Vdx92ig4tur*');
$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myse = $_POST['myse'];

$sql="SELECT r.id,r.firmarl, r.observaciones,r.myse, r.requisitos,re.nombreRJ,re.id as iddocu
	FROM requejudiricos r 
	LEFT OUTER JOIN requerimientosj re ON r.entregable=re.id where r.myse = '$myse'";



$sentencia = $cnn->prepare($sql);
$sentencia->execute();
$array = $sentencia->fetchAll();
header('Content-Type:application/json');
echo json_encode($array);
        
