<?php
session_start();
// if (isset($_SESSION['id_login'])) { } else {
// 	header('location: ../iniciarSesion.php');
// }

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

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:AR1');

$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A1', 'LICITACIONES EN CURSO')
	->setCellValue('A2', 'Soporte de licitacion')
	->setCellValue('B2', 'Entidad')
	->setCellValue('C2', 'Myse')
	->setCellValue('D2', 'Tipo de proceso')
	->setCellValue('E2', 'Estado del proyecto')
	->setCellValue('F2', 'Estado')
	->setCellValue('G2', 'Fecha de observacion')
	->setCellValue('H2', 'Alerta(Fecha de observacion)')
	->setCellValue('I2', 'Fecha de cierre')
	->setCellValue('J2', 'Alerta(Fecha de cierre)')
	->setCellValue('K2', 'Objeto del contrato')
	->setCellValue('L2', 'Consultor')
	->setCellValue('M2', 'Ejecutivo')
	->setCellValue('N2', 'Abogado asignado')
	->setCellValue('O2', 'Sector')
	->setCellValue('P2', 'Poder')
	->setCellValue('Q2', 'Mensualidad')
	->setCellValue('R2', 'Ingeneniero Preventa')
	->setCellValue('S2', 'Fecha de creación')
	->setCellValue('T2', 'Observacion Calidad del Proceso')
	->setCellValue('U2', 'Observacion Falla del Proceso')
	->setCellValue('V2', 'Accion Preventiva/Correctiva');


// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:V2')->applyFromArray($boldArray);

//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
function cellColor($cells, $color)
{
	global $objPHPExcel;
	$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill('')
		->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array('rgb' => $color)
		));
}
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(32);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(42);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(50);


/*Extraer datos de MYSQL*/
# conectare la base de datos
$con = @mysqli_connect('localhost', 'root', '', 'licitaciones');
if (!$con) {
	die("imposible conectarse: " . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}
$sql = "SELECT * FROM seguimiento  order by myse";
$nombre = $_SESSION['nombre'];
$hoy =  date("Y-m-d");
$siguiente =  date("Y-m-d", strtotime("+1 day"));
if ($_SESSION['rol'] === 'Administrador') {

	$sql  = "SELECT SG.id,TL.nombre_sp,SG.entidad,SG.myse,TP.nombre_tiproces,sp.nombre_stadpro,ES.nombre_estado,SG.fhcierre,SG.objcontra,ST.nombre_concepto,SG.nit, SG.fhobs, AB.nombre_aboga, SEG.nombre_seg,SG.consult, SG.ejecu, PD.nombre_poder,SG.mensualidad,SG.ingPropu, histo.fecha,SG.obCalidadProces,SG.accionPreCor,SG.obFallaProces,fecha
	FROM seguimiento SG
	LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
	LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
	LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
	LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
	LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
    LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
    LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
	LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
	LEFT OUTER JOIN historialregistro histo ON SG.myse=histo.id_myse where (ES.id ='2' || ES.id ='5') group by SG.id
	";
} elseif ($_SESSION['rol'] === 'Asignar') {
	$sql  = "SELECT SG.id,TL.nombre_sp,SG.entidad,SG.myse,TP.nombre_tiproces,sp.nombre_stadpro,ES.nombre_estado,SG.fhcierre,SG.objcontra,ST.nombre_concepto,SG.nit,SG.fhobs, AB.nombre_aboga, SEG.nombre_seg,SG.consult, SG.ejecu, PD.nombre_poder,SG.mensualidad,SG.ingPropu, histo.fecha as fecha
	FROM seguimiento SG
	LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
	LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
	LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
	LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
	LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
    LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
    LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
	LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
	LEFT OUTER JOIN historialregistro histo ON SG.myse=histo.id_myse where (ES.id ='2' || ES.id ='5') group by SG.id
	";
} elseif ($_SESSION['rol'] === 'Usuario') {
	$sql = "SELECT SG.id,TL.nombre_sp,SG.entidad,SG.myse,TP.nombre_tiproces,sp.nombre_stadpro,ES.nombre_estado,SG.fhcierre,SG.objcontra,ST.nombre_concepto,SG.nit,SG.fhobs, AB.nombre_aboga, SEG.nombre_seg,SG.consult, SG.ejecu, PD.nombre_poder,SG.mensualidad,SG.ingPropu, histo.fecha as fecha
	FROM seguimiento SG
	LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
	LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
	LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
	LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
	LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
    LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
    LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
	LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
	LEFT OUTER JOIN historialregistro histo ON SG.myse=histo.id_myse where (ES.id ='2' || ES.id ='5')  and TL.nombre_sp = '$nombre' group by SG.id
	";
} elseif ($_SESSION['rol'] === 'UsuarioCCE') {
	$sql = "SELECT SG.id,TL.nombre_sp,SG.entidad,SG.myse,TP.nombre_tiproces,sp.nombre_stadpro,ES.nombre_estado,SG.fhcierre,SG.objcontra,ST.nombre_concepto,SG.nit,SG.fhobs, AB.nombre_aboga, SEG.nombre_seg,SG.consult, SG.ejecu, PD.nombre_poder,SG.mensualidad,SG.ingPropu, histo.fecha as fecha
	FROM seguimiento SG
	LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
	LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
	LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
	LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
	LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
    LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
    LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
	LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
	LEFT OUTER JOIN historialregistro histo ON SG.myse=histo.id_myse where (ES.id ='2' || ES.id ='5')   and TL.nombre_sp = '$nombre' group by SG.id
	";
}

$query = mysqli_query($con, $sql);
$cel = 3; //Numero de fila donde empezara a crear  el reporte
if (is_null(mysqli_fetch_array($query))) {
	echo "<script>
                alert('No hay licitaciones en curso');
                window.location= '../../../administrador/menuAdministrador.php'
    </script>";
} else {
	$query = mysqli_query($con, $sql);
	$cel = 3;
	while ($row = mysqli_fetch_array($query)) {

		$soporte = $row['nombre_sp'];
		$entidad = $row['entidad'];
		$myse = $row['myse'];
		$tipoProceso = $row['nombre_tiproces'];
		$estadoProyecto = $row['nombre_stadpro'];
		$estado = $row['nombre_estado'];
		$fechaObservacion = $row['fhobs'];
		$fhcierre = $row['fhcierre'];
		$objeto = $row['objcontra'];
		$color = '';
		$color2 = '';
		if ($fechaObservacion  === $hoy) {
			cellColor('H', 'FF0032');
		} elseif ($fechaObservacion === $siguiente) {
			cellColor('H', 'FAF700');
		} elseif ($fechaObservacion < $hoy) {
			cellColor('H', '9EA59D');
		} else {
			cellColor('H', '35D31C');
		}

		if ($fhcierre <= $hoy) {
			cellColor('J', 'FF0032');
		} elseif ($fhcierre === $siguiente) {
			cellColor('J', 'FAF700');
		} else {
			cellColor('J', '35D31C');
		}
		$nombre_poder = $row['nombre_poder'];
		$ejecu = $row['ejecu'];
		$consult = $row["consult"];
		$nombre_aboga = $row['nombre_aboga'];
		$mensu = (float) str_replace(',', '', $row['mensualidad']);
		$mensualidad = number_format($mensu);
		$ingPropu = $row['ingPropu'];
		$nombre_concepto = $row['nombre_concepto'];
		$fechaCreacion = $row['fecha'];
		$observacion = $row['obCalidadProces'];
		$observacionF = $row['obFallaProces'];
		$accion = $row['accionPreCor'];
		
		



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



		// Agregar datos
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($a, $soporte)
			->setCellValue($b, $entidad)
			->setCellValue($c, $myse)
			->setCellValue($d, $tipoProceso)
			->setCellValue($e, $estadoProyecto)
			->setCellValue($f, $estado)
			->setCellValue($g, $fechaObservacion)
			->setCellValue($h, $color)
			->setCellValue($i, $fhcierre)
			->setCellValue($j, $color2)
			->setCellValue($k, $objeto)
			->setCellValue($l, $consult)
			->setCellValue($m, $ejecu)
			->setCellValue($n, $nombre_aboga)
			->setCellValue($o, $nombre_concepto)
			->setCellValue($p, $nombre_poder)
			->setCellValue($q, $mensualidad)
			->setCellValue($r, $ingPropu)
			->setCellValue($s, $fechaCreacion)
			->setCellValue($t, $observacion)
			->setCellValue($u, $observacionF)
			->setCellValue($v, $accion);



		$cel += 1;
	}
}
cellColor('H', 'FFFFFF');
cellColor('J', 'FFFFFF');

/*Fin extracion de datos MYSQL*/
$rango = "A2:$v";
$styleArray = array(
	'font' => array('name' => 'Arial', 'size' => 11),
	'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Licitaciones en curso');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Licitaciones en curso.xls"');
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
