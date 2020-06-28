<?php 
session_start();
if (isset($_SESSION['id'])){ 
  include("../../models/conexionCERT.php");
}else{
  header('location: ../index.php');
}
$conexion  = new conexionCert;
$execute = $conexion->conectar();

$id = $_GET['id'];

$sentencia = $execute->prepare("SELECT c.ano as ano,c.fecha as fecha,c.nitEntidad as nitEntidad, c.entidad as entidad, c.contratoCliente as contratoCliente, c.contratoEmpresa as contratoEmpresa, c.fechaInicio as fechaInicio, c.fechaFinal as fechaFinal, c.duracion as duracion, c.producto as producto, c.lugarEjecucion as lugarEjecucion, c.valorSmlv as valorSmlv, c.ejecutivo as ejecutivo, c.objeto as objeto, c.fechaEnvio as fechaEnvio, c.entregaEjecutivo as entregaEjecutivo, c.operador as operador,c.expedicionCertificacion as expedicionCertificacion,c.tipoEmpresa as tipoEmpresa, c.sector as id_sector ,s.sector as sector, c.numeroRegistroRut as numeroRegistroRut, c.certificado as certificado, c.valorIvaInc as valorIvaInc, c.estado as estado, c.alcance as alcance, c.fechaSuscripcion as fechaSuscripcion FROM certificados c
  Join sector s on c.sector = s.id_sector
  WHERE c.id_certificados = ?;");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($objeto->operador == "UNE EPM TELECOMUNICACIONES S.A.") {
  $entidad = "900.092.385";
}elseif ($objeto->operador == "COLOMBIA MÓVIL S.A. E.S.P.") {
  $entidad = "830.114.921";
}elseif ($objeto->operador == "EDATEL S.A.") {
  $entidad = "890.905.065";
}

$tipo = 'word';
$extension = '.doc';
$name=$objeto->entidad;

header("Content-type: application/vnd.ms-$tipo");
header("Content-Disposition: attachment; filename=$name"."$extension");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><b>CERTIFICADO DE EXPERIENCIA Y PRESTACION DE SERVICIOS</b></title>
</head>
<body>
  <h3 style="font-family: Arial, Helvetica, sans-serif;"><b>CERTIFICADO DE EXPERIENCIA Y PRESTACION DE SERVICIOS </b></h3>
  <table>
    <tr>
      <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Cliente </th>
      <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid;  border-top: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->entidad?></td>
    </tr>
    <tr>
      <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px;text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> NIT </th>
      <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->nitEntidad ?></td>
    </tr>
    <tr>
      <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Lugar de ejecución </th>
      <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->lugarEjecucion ?></td>
    </tr>
    <tr>
      <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;">Contratistas</th>
      <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->operador;?>
    </td>
  </tr>
  <tr>
    <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Nit </th>
    <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $entidad;?>
  </td>
</tr>
<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Contrato interno N° </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->contratoEmpresa;?>
</td>
</tr>
<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Objeto </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->objeto;?>
</td>
</tr>
</table> 

<table>
  <tr>
    <th colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding: 1px;border-top: #000000 1px solid; border-bottom: #000000 1.5px solid;margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000; background-color: #D6D6D6;"><b><center>ALCANCE</center>  </b></th>
  </tr>
  <tr>
    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding: 1px;border-bottom: #000000 1.5px solid;margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid;"><?php echo $objeto->alcance;?></td>
  </tr>
  <tr>
    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding: 1px;border-bottom: #000000 1.5px solid;margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid;"> </td>
  </tr>
  <tr>
    <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Fecha de suscripción </th>
    <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->fechaSuscripcion ?>
  </td>
</tr>

<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Fecha de inicio </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->fechaInicio ?>
</td>
</tr>

<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;">  Fecha de Finalización  </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->fechaFinal ?>
</td>
</tr>
<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Plazo de ejecucion </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;">
  </td>
</tr>
<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"> Valor Total Ejecutado </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo number_format($objeto->valorIvaInc) ?>
</td>
</tr>
<tr>
  <th width="60" height="30" style="font-family: Arial, Helvetica, sans-serif; margin-left: 2px; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-left: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;">  Valor de SMMVL (A la fecha de terminación del contrato):  </th>
  <td width="500" height="30" style="font-family: Arial, Helvetica, sans-serif; padding: 1px; text-align:left; border-bottom: #000000 1.5px solid; border-right: #000000 1.5px solid; color: #00000;"><?php echo $objeto->valorSmlv ?>
</td>
</tr>
</table> 
<br>
<div  style="font-family: Arial, Helvetica, sans-serif;">
  <label> Firma de quien expide la certificación </label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Nombre: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Cargo: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Teléfono: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Dirección: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Ciudad: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Página Web: </b></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Fecha de Expedición: </b><?php echo $objeto->expedicionCertificacion ?></label>
</div>
<br>
<div>
  <label><b style="font-family: Arial, Helvetica, sans-serif;"> Calificacion del certificado: </b></label>
</div>
</body>
</html>