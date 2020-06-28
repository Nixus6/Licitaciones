<?php

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2018 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

if (PHP_SAPI == 'cli')
	die(' ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Jhoan Castro and Sebastian Perez")
	->setLastModifiedBy("Jhoan Castro and Sebastian Perez")
	->setTitle("Office 2018 XLSX Documento de prueba")
	->setSubject("Office 2018 XLSX Documento de prueba")
	->setDescription("Documento de prueba para Office 2018 XLSX, generado usando clases de PHP.")
	->setKeywords("office 2018 openxml php")
	->setCategory("Archivo con resultado de prueba");
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:AW1');

$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A1', 'SEGUIMIENTO DE AREA DE LICITACIONES')
	->setCellValue('A2', 'Myse')
	->setCellValue('B2', 'Sector')
	->setCellValue('C2', 'Nit')
	->setCellValue('D2', 'Entidad')
	->setCellValue('E2', 'Tipo de proceso')
	->setCellValue('F2', 'Numero')
	->setCellValue('G2', 'Estado')
	->setCellValue('H2', 'Estado del proyecto')
	->setCellValue('I2', 'Fecha de cierre')
	->setCellValue('J2', 'Hora de presentacion')
	->setCellValue('K2', 'medio de presentacion')
	->setCellValue('L2', 'Presupuesto')
	->setCellValue('M2', 'Fecha de observacion')
	->setCellValue('N2', 'Hora de presentacion de observacion')
	->setCellValue('O2', 'Medio de presentacion de observacion')
	->setCellValue('P2', 'Carta de manifestacion de interes')
	->setCellValue('Q2', 'Hora de manifestacion de interes')
	->setCellValue('R2', 'Medio de manifestacion de interes')
	->setCellValue('S2', 'Region')
	->setCellValue('T2', 'Ejecutivo')
	->setCellValue('U2', 'Abogado asignado')
	->setCellValue('V2', 'Producto ')
	->setCellValue('W2', 'Objeto del contrato')
	->setCellValue('X2', 'Certificados Presentados')
	->setCellValue('Y2', 'Proponente')
	->setCellValue('Z2', 'Valor oferta')
	->setCellValue('AA2', 'Plazo de ejecucion (Meses)')
	->setCellValue('AB2', 'Resultado')
	->setCellValue('AC2', 'Causales')
	->setCellValue('AD2', 'Trazabilidad')
	->setCellValue('AE2', 'Poder')
	->setCellValue('AF2', 'Soporte a licitaciones')
	->setCellValue('AG2', 'Empresa Ganadora')
	->setCellValue('AH2', 'Fecha de legalizacion')
	->setCellValue('AI2', 'Fecha de indicador habilitantes')
	->setCellValue('AJ2', 'Hora de indicador')
	->setCellValue('AK2', 'Ofertas en seguimiento')
	->setCellValue('AL2', 'Cobertura del proyecto')
	->setCellValue('AM2', 'Mensualidad')
	->setCellValue('AN2', 'Valor de la oferta ganadora')
	->setCellValue('AO2', 'Tipo de poliza')
	->setCellValue('AP2', 'Porcentaje de la poliza')
	->setCellValue('AQ2', 'Vigencia por días')
	->setCellValue('AR2', 'Ingeneniero Preventa')
	->setCellValue('AS2', 'Myse Experiencia')
	->setCellValue('AT2', 'Pago estapilla')
	->setCellValue('AU2', 'Plataforma')
	->setCellValue('AV2', 'Usuario')
	->setCellValue('AW2', 'Contraseña')
	->setCellValue('AX2', 'Fecha de registro')
	->setCellValue('AY2', 'Observacion Calidad del Proceso')
	->setCellValue('AZ2', 'Observacion Falla del Proceso')
	->setCellValue('BA2', 'Accion Preventiva/Correctiva')
	->setCellValue('BB2', 'Imputabilidad')
	->setCellValue('BC2', 'Fecha de Entrega Oferta Area Tecnica')
	->setCellValue('BD2', 'Hora De Entrega Oferta Area Tecnica')
	->setCellValue('BE2', 'Consultor');




// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:BE2')->applyFromArray($boldArray);

//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(31);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(32);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(42);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(56);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(31);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(29);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(111);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(39);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(111);
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(37);
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(44);
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(50);

/*Extraer datos de MYSQL*/
# conectare la base de datos
$con = @mysqli_connect('localhost', 'root', 'Vdx92ig4tur*', 'licitaciones');
if (!$con) {
	die("imposible conectarse: " . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}


$sql = "SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora, SG.mensualidad, SG.coberturaProy, SG.vlofergana, SG.tipPoli,SG.porceP,SG.vigeDia,SG.ingPropu,SG.MYSExp,SG.estanpi,SG.plataforma,SG.plataformaU,SG.plataformaC, histo.fecha,SG.obCalidadProces,SG.obFallaProces,SG.accionPreCor,fecha,SG.imputabilidad,SG.fecAreaTec,SG.horAreaTec,SG.consult
FROM seguimiento SG
LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
LEFT OUTER JOIN historialregistro histo ON SG.myse=histo.id_myse group by SG.id";


$query = mysqli_query($con, $sql);
$cel = 3; //Numero de fila donde empezara a crear  el reporte
if (is_null(mysqli_fetch_array($query))) {
	echo "<script>
		alert('No hay licitaciones');
		window.location= '../../../administrador/consultarLicitaciones.php'
		</script>";
} else {
	$query = mysqli_query($con, $sql);
	$cel = 3;
	while ($row = mysqli_fetch_array($query)) {

		$myse = $row['myse'];
		$nombre_concepto = $row['nombre_concepto'];
		$nit = $row['nit'];
		$entidad = $row['entidad'];
		$nombre_tiproces = $row['nombre_tiproces'];
		$numero = $row['numero'];
		$nombre_estado = $row['nombre_estado'];
		$nombre_stadpro = $row['nombre_stadpro'];
		$fhcierre = $row['fhcierre'];
		$prese = $row['prese'];
		$hopre = $row['hopre'];
		$prespuestox = (float) str_replace(',', '', $row['Presu']);
		$Presu = number_format($prespuestox);
		$fhobs = $row['fhobs'];
		$Mobs = $row['Mobs'];
		$Mprese = $row['Mprese'];
		$rfcarma = $row['rfcarma'];
		$Hprese = $row['Hprese'];
		$mc = $row['mc'];
		$nombre_reg = $row['nombre_reg'];
		$ejecu = $row['ejecu'];
		$nombre_aboga = $row['nombre_aboga'];
		$product = $row['product'];
		$objcontra = $row['objcontra'];
		$cerpre = $row['cerpre'];
		$nombre_pro = $row['nombre_pro'];
		$vlf = (float) str_replace(',', '', $row['vlofer']);
		$vlofer = number_format($vlf);
		$plzejecu = $row['plzejecu'];
		$nombre_res = $row['nombre_res'];
		$nombre_causal = $row['nombre_causal'];
		$traza = $row['traza'];
		$nombre_poder = $row['nombre_poder'];
		$nombre_sp = $row['nombre_sp'];
		$empgana = $row['empgana'];
		$fhlegal = $row['fhlegal'];
		$indicador = $row['indicador'];
		$hora = $row['hora'];
		$nombre_seg = $row['nombre_seg'];
		$cobertura = $row['coberturaProy'];
		$mensu = (float) str_replace(',', '', $row['mensualidad']);
		$mensualidad = number_format($mensu);
		$vlofergana = $row['vlofergana'];
		$tipPoli = $row['tipPoli'];
		$porceP = $row['porceP'];
		$vigeDia = $row['vigeDia'];
		$ingPropu = $row['ingPropu'];
		$MYSExp = $row['MYSExp'];
		$estanpi = $row['estanpi'];
		$plataforma = $row['plataforma'];
		$plataformaU = $row['plataformaU'];
		$plataformaC = $row['plataformaC'];
		$fechaRegistro = $row['fecha'];
		$observacionC = $row['obCalidadProces'];
		$observacionF = $row['obFallaProces'];
		$accionPrev = $row['accionPreCor'];
		$imputabilidad = $row['imputabilidad'];
		$fecAreaTec = $row['fecAreaTec'];
		$horAreaTec = $row['horAreaTec'];
		$consultor = $row['consult'];

		$a = "A" . $cel;
		$b = "B" . $cel;
		$c = "C" . $cel;
		$d = "D" . $cel;
		$e = "E" . $cel;
		$f = "F" . $cel;
		$g = "G" . $cel;
		$h = "H" . $cel;
		$i = "I" . $cel;
		$j = "J" . $cel;
		$k = "K" . $cel;
		$l = "L" . $cel;
		$m = "M" . $cel;
		$n = "N" . $cel;
		$o = "O" . $cel;
		$p = "P" . $cel;
		$q = "Q" . $cel;
		$r = "R" . $cel;
		$s = "S" . $cel;
		$t = "T" . $cel;
		$u = "U" . $cel;
		$v = "V" . $cel;
		$w = "W" . $cel;
		$x = "X" . $cel;
		$y = "Y" . $cel;
		$z = "Z" . $cel;
		$aa = "AA" . $cel;
		$ab = "AB" . $cel;
		$ac = "AC" . $cel;
		$ad = "AD" . $cel;
		$ae = "AE" . $cel;
		$af = "AF" . $cel;
		$ag = "AG" . $cel;
		$ah = "AH" . $cel;
		$ai = "AI" . $cel;
		$aj = "AJ" . $cel;
		$ak = "AK" . $cel;
		$al = "AL" . $cel;
		$am = "AM" . $cel;
		$an = "AN" . $cel;
		$ao = "AO" . $cel;
		$ap = "AP" . $cel;
		$aq = "AQ" . $cel;
		$ar = "AR" . $cel;
		$as = "AS" . $cel;
		$at = "AT" . $cel;
		$au = "AU" . $cel;
		$av = "AV" . $cel;
		$aw = "AW" . $cel;
		$ax = "AX" . $cel;
		$ay = "AY" . $cel;
		$az = "AZ" . $cel;
		$ba = "BA" . $cel;
		$bb = "BB" . $cel;
		$bc = "BC" . $cel;
		$bd = "BD" . $cel;
		$be = "BE" . $cel;

		// Agregar datos
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($a, $myse)
			->setCellValue($b, $nombre_concepto)
			->setCellValue($c, $nit)
			->setCellValue($d, $entidad)
			->setCellValue($e, $nombre_tiproces)
			->setCellValue($f, $numero)
			->setCellValue($g, $nombre_estado)
			->setCellValue($h, $nombre_stadpro)
			->setCellValue($i, $fhcierre)
			->setCellValue($j, $prese)
			->setCellValue($k, $hopre)
			->setCellValue($l, $Presu)
			->setCellValue($m, $fhobs)
			->setCellValue($n, $Mobs)
			->setCellValue($o, $Mprese)
			->setCellValue($p, $rfcarma)
			->setCellValue($q, $Hprese)
			->setCellValue($r, $mc)
			->setCellValue($s, $nombre_reg)
			->setCellValue($t, $ejecu)
			->setCellValue($u, $nombre_aboga)
			->setCellValue($v, $product)
			->setCellValue($w, $objcontra)
			->setCellValue($x, $cerpre)
			->setCellValue($y, $nombre_pro)
			->setCellValue($z, $vlofer)
			->setCellValue($aa, $plzejecu)
			->setCellValue($ab, $nombre_res)
			->setCellValue($ac, $nombre_causal)
			->setCellValue($ad, $traza)
			->setCellValue($ae, $nombre_poder)
			->setCellValue($af, $nombre_sp)
			->setCellValue($ag, $empgana)
			->setCellValue($ah, $fhlegal)
			->setCellValue($ai, $indicador)
			->setCellValue($aj, $hora)
			->setCellValue($ak, $nombre_seg)
			->setCellValue($al, $cobertura)
			->setCellValue($am, $mensualidad)
			->setCellValue($an, $vlofergana)
			->setCellValue($ao, $tipPoli)
			->setCellValue($ap, $porceP)
			->setCellValue($aq, $vigeDia)
			->setCellValue($ar, $ingPropu)
			->setCellValue($as, $MYSExp)
			->setCellValue($at, $estanpi)
			->setCellValue($au, $plataforma)
			->setCellValue($av, $plataformaU)
			->setCellValue($aw, $plataformaU)
			->setCellValue($ax, $fechaRegistro)
			->setCellValue($ay, $observacionC)
			->setCellValue($az, $observacionF)
			->setCellValue($ba, $accionPrev)
			->setCellValue($bb, $imputabilidad)
			->setCellValue($bc, $fecAreaTec)
			->setCellValue($bd, $horAreaTec)
			->setCellValue($be, $consultor);


		$cel += 1;
	}
}

/*Fin extracion de datos MYSQL*/
$rango = "A2:$be";
$styleArray = array(
	'font' => array('name' => 'Arial', 'size' => 11),
	'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Licitaciones(Todas)');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Licitaciones completas.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
