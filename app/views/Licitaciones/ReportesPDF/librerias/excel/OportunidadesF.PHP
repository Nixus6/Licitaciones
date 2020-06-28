<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
	header('location: ../iniciarSesion.php');
}
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

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:P1');

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Oportunidades (Otros)')
->setCellValue('A2', 'Fecha')
->setCellValue('B2', 'Entidad')
->setCellValue('C2', 'Número de contrato')
->setCellValue('D2', 'Objeto')
->setCellValue('E2', 'Presupuesto')
->setCellValue('F2', 'Ubicación')
->setCellValue('G2', 'Fecha de publicación')
->setCellValue('H2', 'Fecha Cierre')
->setCellValue('I2', 'Sector')
->setCellValue('J2', 'Consultor')
->setCellValue('K2', 'Ejecutivo')
->setCellValue('L2', 'Gerente')
->setCellValue('M2', 'Estado')
->setCellValue('N2', 'MYSE')
->setCellValue('O2', 'LINK')
->setCellValue('P2', 'Observaciones');

// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:P2')->applyFromArray($boldArray);		

//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(80);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(60);	
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(32);	
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);	
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);	
	

/*Extraer datos de MYSQL*/
	# conectare la base de datos
$con=@mysqli_connect('localhost', 'root', 'Vdx92ig4tur*', 'licitaciones');
if(!$con){
	die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

$dato = $_GET['dato'];
$tabla =$_GET['opciones'];

if ($_SESSION['rol'] === 'Administrador' || $_SESSION['rol']==='ConsultorVP') {
 $sql="SELECT OP.id,OP.fCreacion,OP.nomEntidad,OP.numContrato,OP.Objeto,OP.Presu,OP.ubicacion,OP.fPublicacion,OP.fcierre,ST.nombre_concepto,OP.Consultor,OP.ejecutivo,OP.gerente,OP.estado,OP.MYSE,OP.link,OP.obser
	FROM oportunidades OP
    LEFT OUTER JOIN sect ST ON OP.nombre_concepto=ST.id where $tabla LIKE '%$dato%' and (estado = 'Pendiente' || estado = 'En gestión comercial')";
}elseif ($_SESSION['rol'] === 'Govermment') {
 $sql="SELECT OP.id,OP.fCreacion,OP.nomEntidad,OP.numContrato,OP.Objeto,OP.Presu,OP.ubicacion,OP.fPublicacion,OP.fcierre,ST.nombre_concepto,OP.Consultor,OP.ejecutivo,OP.gerente,OP.estado,OP.MYSE,OP.link,OP.obser
	FROM oportunidades OP
  LEFT OUTER JOIN ST ST ON OP.nombre_concepto=ST.id where (ST.id = '3') and (estado = 'Pendiente' || estado = 'En gestión comercial') and ($tabla LIKE '%$dato%')";
}elseif ($_SESSION['rol'] === 'Corporativo') {
  $sql="SELECT OP.id,OP.fCreacion,OP.nomEntidad,OP.numContrato,OP.Objeto,OP.Presu,OP.ubicacion,OP.fPublicacion,OP.fcierre,ST.nombre_concepto,OP.Consultor,OP.ejecutivo,OP.gerente,OP.estado,OP.MYSE,OP.link,OP.obser
	FROM oportunidades OP
    LEFT OUTER JOIN ST ST ON OP.nombre_concepto=ST.id where (ST.id = '2' || ST.id = '1') and (estado = 'Pendiente' || estado = 'En gestión comercial') and ($tabla LIKE '%$dato%')";
}elseif ($_SESSION['rol'] ==='Pymes') {
  $sql="SELECT OP.id,OP.fCreacion,OP.nomEntidad,OP.numContrato,OP.Objeto,OP.Presu,OP.ubicacion,OP.fPublicacion,OP.fcierre,ST.nombre_concepto,OP.Consultor,OP.ejecutivo,OP.gerente,OP.estado,OP.MYSE,OP.link,OP.obser
	FROM oportunidades OP
    LEFT OUTER JOIN ST ST ON OP.nombre_concepto=ST.id where (ST.id = '5') and (estado = 'Pendiente' || estado = 'En gestión comercial') and ($tabla LIKE '%$dato%')";
}elseif ($_SESSION['rol'] ==='Whosale') {
  $sql="SELECT OP.id,OP.fCreacion,OP.nomEntidad,OP.numContrato,OP.Objeto,OP.Presu,OP.ubicacion,OP.fPublicacion,OP.fcierre,ST.nombre_concepto,OP.Consultor,OP.ejecutivo,OP.gerente,OP.estado,OP.MYSE,OP.link,OP.obser
	FROM oportunidades OP
    LEFT OUTER JOIN ST ST ON OP.nombre_concepto=ST.id where (ST.id = '4') and (estado = 'Pendiente' || estado = 'En gestión comercial') .
    and ($tabla LIKE '%$dato%')";
}

$query=mysqli_query($con,$sql);
	$cel=3;//Numero de fila donde empezara a crear  el reporte
	if (is_null(mysqli_fetch_array($query))){
	 echo "<script>
                alert('No hay Oportunidades');
                window.location= '../../../administrador/consultaOportunidad.php'
    </script>";
}else{
	$query=mysqli_query($con,$sql);
	$cel=3;
	while ($row=mysqli_fetch_array($query)){

		$fcrea=$row['fCreacion'];
		$nameE =$row['nomEntidad'];
		$numberC =$row['numContrato'];
		$obje =$row['Objeto'];
		$pres =$row['Presu'];
		$locat =$row['ubicacion'];
		$fpblic =$row['fPublicacion'];
		$fcier =$row['fcierre'];
		$sect =$row['nombre_concepto'];
		$consult =$row['Consultor'];
		$eje =$row['ejecutivo'];
		$geren =$row['gerente'];
		$esta =$row['estado'];
		$myse =$row['MYSE'];
		$link =$row['link'];
		$obse =$row['obser'];

		$a="A".$cel;
		$b="B".$cel;
		$c="C".$cel;
		$d="D".$cel;
		$e="E".$cel;
		$f="F".$cel;
		$g="G".$cel;
		$h="H".$cel;
		$i="I".$cel;
		$j="J".$cel;
		$k="K".$cel;
		$l="L".$cel;
		$m="M".$cel;
		$n="N".$cel;
		$o="O".$cel;
		$p="P".$cel;

			// Agregar datos
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue($a, $fcrea)
		->setCellValue($b, $nameE)
		->setCellValue($c, $numberC)
		->setCellValue($d, $obje)
		->setCellValue($e, $pres)
		->setCellValue($f, $locat)
		->setCellValue($g, $fpblic)
		->setCellValue($h, $fcier)  
		->setCellValue($i, $sect)
		->setCellValue($j, $consult)
		->setCellValue($k, $eje)
		->setCellValue($l, $geren)
		->setCellValue($m, $esta)
		->setCellValue($n, $myse)
		->setCellValue($o, $link)
		->setCellValue($p, $obse);

		$cel+=1;
	}
}

	/*Fin extracion de datos MYSQL*/
	$rango="A2:$p";
	$styleArray = array('font' => array( 'name' => 'Arial','size' => 11),
		'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
	);
	$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
	$objPHPExcel->getActiveSheet()->setTitle('Oportunidades');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
	$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Oportunidades.xls"');
	header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
	header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
