<?php
session_start();

if(isset($_SESSION['id_login'])){
}else{
    header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

$sentencia = new conexion;
$seguimiento = $sentencia->_conexion();

$id_ejecutivo = $_POST['id_ejecutivo'];
$nombre = $_POST['nombre'];
$consultor = $_POST['consultor'];
$id_sector = $_POST['id_sector'];
$id_regional = $_POST['id_regional'];


try{

    $sentencia = $seguimiento->prepare("UPDATE ejecutivos SET nombre = ?, consultor = ?,
     id_sector = ?, id_regional= ? WHERE id_ejecutivo = ? ");
     
    $resultado = $sentencia->execute([$nombre,$consultor,$id_sector,$id_regional,$id_ejecutivo]);

    header("location: ../../administrador/ejecutivos.php");


}catch(Exception $e){
echo "Paso un error".$e;
}
