<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {
	header('location: ../../index.php');
}
include("../clases/clases_funciones.php");
include 'plantilla2.php';
$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();
$myse = $_GET['id'];

$sentencia = $seguimiento->prepare("SELECT * FROM seguimiento WHERE id = ?;");
$sentencia->execute([$myse]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencias1 = $seguimiento->query("SELECT * FROM `requecaractecni` where myse = '$objeto->myse'");
$sentencias2 = $seguimiento->query("SELECT rj.nombreRJ as entregable, r.firmarl as firmarl, r.requisitos as requisitos, r.observaciones as observaciones FROM `requejudiricos` r LEFT JOIN requerimientosj rj ON rj.id = r.entregable where myse = '$objeto->myse'");

$sentencias3 = $seguimiento->query("SELECT rj.nombre as entregable, r.firmarl as firmarl, r.requisitos as requisitos, r.observciones as observaciones FROM `requifinancieros` r LEFT JOIN certificadosf rj ON rj.id = r.entregable where myse = '$objeto->myse'");
$sentencias4 = $seguimiento->query("SELECT * FROM `requeexpe` where myse = '$objeto->myse'");

$sentencias5 = $seguimiento->query("SELECT * FROM `formanexos` where myse = '$objeto->myse'");


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', 'B', 13);


$pdf->SetFont('Arial', 'B', 9);

$pdf->Cell(30, 10, 'Cliente  ', 1, 0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(160, 10, utf8_decode($objeto->entidad), 1, 1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 10, 'Numero', 1, 0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(160, 10,  $objeto->numero, 1, 1);



$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(20, 10, 'Myse  ', 1, 0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 10,  $objeto->myse, 1, 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 10, 'Fecha de cierre  ', 1, 0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 10, $objeto->fhcierre, 1, 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 10, 'Hora de cierre  ', 1, 0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 10,  $objeto->prese, 1, 1);
$pdf->Ln();


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Requerimientos de caracter tecnico ', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$numero = 0;
foreach ($sentencias1 as $key) {
	$numero++;
	$pdf->Cell(190, 5, '#' . $numero, 0);
	$pdf->Ln();
	$pdf->SetDrawColor(183, 220, 204);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Entregable ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8,  utf8_decode($key['entregable']), 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'FirmaRL ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8, $key['firmarl'], 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Requerimientos ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key['requisitos']), 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Observaciones ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key['observaciones']), 1);

	$pdf->SetDrawColor(0, 0, 0);

}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Requerimientos juridicos ', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$numero = 0;
foreach ($sentencias2 as $key1) {


	$numero++;
	$pdf->Cell(190, 5, '#' . $numero, 0);
	$pdf->Ln();
	$pdf->SetDrawColor(152, 174, 249);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Entregable ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8,  utf8_decode($key1['entregable']), 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'FirmaRL ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8, $key1['firmarl'], 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Requerimientos ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key1['requisitos']), 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Observaciones', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key1['observaciones']), 1);

	$pdf->SetDrawColor(0, 0, 0);
	
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(190, 10, 'Requerimientos financieros ', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$numero = 0;
foreach ($sentencias3 as $key2) {
	$numero++;
	$pdf->Cell(190, 5, '#' . $numero, 0);
	$pdf->Ln();
	$pdf->SetDrawColor(229, 149, 104);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Entregable ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8,  utf8_decode($key2['entregable']), 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'FirmaRL ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8, $key2['firmarl'], 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Requerimientos ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key2['requisitos']), 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Observaciones ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key2['observaciones']), 1);

	$pdf->SetDrawColor(0, 0, 0);

}

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Requerimientos experiencia ', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$numero = 0;
foreach ($sentencias4 as $key3) {

	$numero++;
	$pdf->Cell(190, 5, '#' . $numero, 0);
	$pdf->Ln();
	$pdf->SetDrawColor(141, 183, 243);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Entregable ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8,  utf8_decode($key3['entregable']), 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'FirmaRL ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8, $key3['firmarl'], 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Requerimientos ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key3['requisitos']), 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Observaciones ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key3['observaciones']), 1);

	$pdf->SetDrawColor(0, 0, 0);

}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Formatos y anexos ', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$numero = 0;
foreach ($sentencias5 as $key4) {

	$numero++;
	$pdf->Cell(190, 5, '#' . $numero, 0);
	$pdf->Ln();
	$pdf->SetDrawColor(223, 205, 158);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Entregable ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8,  utf8_decode($key4['entregable']), 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'FirmaRL ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(140, 8, $key4['firmarl'], 1, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Requerimientos ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key4['requisitos']), 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 8, 'Observaciones ', 1, 0,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->MultiCell(140, 8, utf8_decode($key4['observaciones']), 1);

	$pdf->SetDrawColor(0, 0, 0);

}

$pdf->Output();
