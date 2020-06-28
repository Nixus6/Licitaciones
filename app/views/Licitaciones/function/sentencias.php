<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
if (isset($_SESSION['id_login'])){ 
}else{

	header('location: ../iniciarSesion.php');
}
include_once("../clases/clases_funciones.php");

function reportesAño($año,$sector){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT COUNT(SG.fhcierre) AS contador 
		FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['contador']; 
	}

	return $resultado;

}

function totalReportesAño($año){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();

	$total = $seguimiento->query("SELECT COUNT(SG.fhcierre) AS contador 
		FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año'");

	foreach ($total as $key) {
		$resultado = $key['contador']; 
	}

	return $resultado;

}

function valorOfertaAño($año){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SUM(vlofer) AS valor from seguimiento WHERE YEAR(fhcierre) = '$año'");

	foreach ($total as $key) {
		$resultado = $key['valor']; 
	}

	return $resultado;

}


function cantidadEStado($año,$mes,$sector,$estado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT COUNT(SG.fhcierre) AS contador 
		FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and MONTH(SG.fhcierre) = '$mes' and SG.nombre_estado = '$estado' and SG.nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['contador']; 
	}

	return $resultado;

}

function suspendido($año,$sector){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT COUNT(SG.fhcierre) AS contador 
		FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_estado = '5' and SG.nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['contador']; 
	}

	return $resultado;

}

function principalesAN($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SG.entidad, SG.fhcierre,SG.vlofer FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' order by SG.vlofer DESC limit 10");

	return $total;

}

function principalesAD2($año,$sector,$sector2,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SG.entidad as entidad, SG.fhcierre,SG.vlofer FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and (SG.nombre_concepto = '$sector' || SG.nombre_concepto = '$sector2') order by SG.vlofer DESC limit 10");

	return $total;

}

function principalesAD3($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SG.entidad, SG.fhcierre,SG.vlofer,SG.Presu FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' order by SG.Presu DESC limit 10");

	return $total;

}
function principalesAD4($año,$sector,$sector2,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SG.entidad, SG.fhcierre,SG.vlofer,SG.Presu FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and (SG.nombre_concepto = '$sector' || SG.nombre_concepto = '$sector2') order by SG.Presu DESC limit 10");

	return $total;

}

function resultados($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT COUNT(SG.fhcierre) as fechaCierre, COUNT(SG.nombre_estado) as estado FROM seguimiento SG WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector'");
	foreach ($total as $key) {
		$resultado = $key['estado']; 
	}

	return $resultado;

}

function totalValorOferta($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SUM(vlofer) AS valor from seguimiento WHERE YEAR(fhcierre) = '$año' and nombre_res = '$resultado' and nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['valor']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	$resultado = number_format($resultado);
	return $resultado;

}


function mensualidad($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SUM(mensualidad) AS valor from seguimiento WHERE YEAR(fhcierre) = '$año' and nombre_res = '$resultado' and nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['valor']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	$resultado = number_format($resultado);
	return $resultado;

}

function porciento($total,$cantidad){

	if($cantidad != 0) {
		$porciento = $cantidad*100/$total;
	}else{
		$porciento = 0;
	}

	return $porciento;

}

function porciento2($total,$cantidad){

	if($cantidad != 0) {
		$total = (double)str_replace(',','', $total);
		$cantidad = (double)str_replace(',','', $cantidad);
		$porciento = $cantidad*100/$total;
	}else{
		$porciento = 0;
	}

	return $porciento;

}


function sumas($num1,$num2,$num3,$num4,$num5,$num6){

	$suma = $num1 + $num2 + $num3 + $num4 + $num5 + $num6;

	return $suma;

}

function totalOferta($año,$sector){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SUM(vlofer) AS valor from seguimiento WHERE (YEAR(fhcierre) = '$año') and (nombre_res = '1' || nombre_res = '5'|| nombre_res = '4' || nombre_res = '2' || nombre_res = '7' || nombre_res = '3') and (nombre_concepto = '$sector')");

	foreach ($total as $key) {
		$resultado = $key['valor']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	$resultado = number_format($resultado);
	return $resultado;

}
function totalMensualidad($año,$sector){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT SUM(mensualidad) AS valor from seguimiento WHERE YEAR(fhcierre) = '$año' and (nombre_res = '1' || nombre_res = '5'||nombre_res = '4' || nombre_res = '2' || nombre_res = '7' || nombre_res = '3') and nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['valor']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	$resultado = number_format($resultado);
	return $resultado;

}
function cantidad($año,$sector,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT count(SG.nombre_res) as cantidad
		FROM seguimiento SG 
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector'");

	foreach ($total as $key) {
		$resultado = $key['cantidad']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	return $resultado;

}
function proponentes($año,$sector,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT TL.nombre_pro as proponente,count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad
		FROM seguimiento SG 
		LEFT OUTER JOIN propo TL ON SG.nombre_pro=TL.id
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' group by SG.nombre_pro");

	return $total;

}


function cantidadPL($año,$sector,$sector2,$resultadop){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT count(SG.nombre_res) as cantidad
		FROM seguimiento SG 
		LEFT OUTER JOIN propo TL ON SG.nombre_pro=TL.id
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultadop' and (SG.nombre_concepto = '$sector' || SG.nombre_concepto = '$sector2')");

	foreach ($total as $key) {
		$resultado = $key['cantidad']; 
	}

	if (is_null($resultado)) {
		$resultado = "0";
	}
	return $resultado;

}

function proponentesPL($año,$sector,$sector2,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT TL.nombre_pro as proponente,count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad
		FROM seguimiento SG 
		LEFT OUTER JOIN propo TL ON SG.nombre_pro=TL.id
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and (SG.nombre_concepto = '$sector' || SG.nombre_concepto = '$sector2') group by SG.nombre_pro");

	return $total;

}


function empgana($año,$sector,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT EG.empgana as proponente,count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad, C.nombre_causal as causal
		FROM seguimiento SG 
		LEFT OUTER JOIN causal C ON SG.nombre_causal=C.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' group by  SG.empgana");

	return $total;

}

function empganaPL($año,$sector,$sector2,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT EG.empgana as proponente,count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad, C.nombre_causal as causal
		FROM seguimiento SG 
		LEFT OUTER JOIN causal C ON SG.nombre_causal=C.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and (SG.nombre_concepto = '$sector' || SG.nombre_concepto = '$sector2') group by  SG.empgana");

	return $total;

}


function penAdju($año,$sector,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad, SG.entidad as entidad
		FROM seguimiento SG 
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' group by  SG.entidad DESC order by SG.Presu");

	return $total;

}



function noParti($año,$sector,$cantidadtotal,$resultado){
	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$total = $seguimiento->query("SELECT count(SG.nombre_res) as cantidad,count(SG.nombre_res)*100/$cantidadtotal as porcentaje,SUM(SG.mensualidad) as mensualidad, SG.entidad as entidad
		FROM seguimiento SG 
		WHERE YEAR(SG.fhcierre) = '$año' and SG.nombre_res = '$resultado' and SG.nombre_concepto = '$sector' group by  SG.entidad DESC order by SG.Presu limit 10");

	return $total;

}

function habilitantes($mes,$año){

	$pdo = new conexion;
	$seguimiento = $pdo->_conexion();
	$fecha_diferencia = 0;
	$horas = 0;

	$sql = $seguimiento->query("SELECT fhcierre,prese,indicador,hora FROM seguimiento WHERE MONTH(fhcierre) = '$mes' and YEAR(fhcierre) = '$año'");
	$sql2 = $seguimiento->query("SELECT COUNT('fhcierre') as total FROM seguimiento WHERE MONTH(fhcierre) = '$mes' and YEAR(fhcierre) = '$año'");

	foreach ($sql as $key) {
		$cierre =  $key['fhcierre'].' '.$key['prese'];
		$habilitantes =  $key['indicador'].' '.$key['hora'];

		$fecha1 = strtotime($cierre);
		$fecha2 = strtotime($habilitantes);
		$fecha_diferencia += $fecha1 - $fecha2;
		if($fecha_diferencia != 0) {
			$horas = ($fecha_diferencia/60/60);
		}else{
			$horas = 0;
		}

	}
	foreach ($sql2 as $key2) {
		$total = $key2['total'];
	}
	if($horas != 0) {
		$promedio = $horas/$total;
	}else{
		$promedio = 0;
	}

	return $promedio;


}

