<?php
session_start();
if (isset($_SESSION['id'])) {
} else {
	header('location: ../../index.php');
}
include("../../../models/clases_funciones.php");
include 'plantilla.php';
$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();
$myse = $_GET['id'];
$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.consult,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
	PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,SG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora,SG.mensualidad,SG.coberturaProy, SG.vlofergana, SG.tipPoli,SG.porceP,SG.vigeDia,SG.ingPropu,SG.MYSExp,SG.estanpi,SG.plataforma,SG.plataformaU,SG.plataformaC
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
	LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where SG.myse = '$myse'");


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetDrawColor(42, 87, 136);




$pdf->SetFont('Arial', '', 10);

foreach ($filtro as $row) {
	$pdf->SetFont('Arial', '', 10);


	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'Myse   ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(40, 8,  $row['myse'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'Sector', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(40, 8,  $row['nombre_concepto'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'Nit ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(50, 8,  $row['nit'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(30, 8, 'Entidad', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(160, 8,  $row['entidad'], 1, 1, 'T');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(30, 8, 'Tipo de proceso ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(65, 8, $row['nombre_tiproces'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'Numero ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(75, 8, $row['numero'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(25, 8, 'Estado', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(70, 8, $row['nombre_estado'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(35, 8, 'Estado del proyecto', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(60, 8, $row['nombre_stadpro'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(35, 8, 'Fecha de cierre', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(60, 8,  $row['fhcierre'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Hora de presentacion', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(55, 8,  $row['hopre'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(45, 8, 'Medio de presentacion    ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(50, 8,  $row['prese'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);

	$pdf->Cell(35, 8, 'Presupuesto ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(60, 8,  number_format($row['Presu']), 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Fecha de observacion', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(55, 8,   $row['fhobs'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(60, 8, 'Hora de presentacion observacion', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(35, 8,  $row['Mobs'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);

	$pdf->Cell(70, 8, 'Medio de presentacion observacion', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->MultiCell(120, 8,  $row['Mprese'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->cell(60, 8, 'Carta de manifestacion    ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->cell(130, 8,  $row['rfcarma'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(60, 8, 'Hora de manifestacion de interes    ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(35, 8,  $row['Hprese'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(60, 8, 'Medio de manifestacion de interes', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(35, 8, $row['mc'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'Region:    ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(50, 8,  $row['nombre_reg'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(30, 8, 'Consultor', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(90, 8, $row['consult'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Ejecutivo', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['ejecu'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Abogado asignado', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['nombre_aboga'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Producto     ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['product'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->cell(40, 8, 'Objeto del contrato    ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Multicell(150, 8,  $row['objcontra'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(45, 8, 'Certificados Presentados', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(145, 8,  $row['cerpre'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(45, 8, 'Proponente', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(145, 8, $row['nombre_pro'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(30, 8, 'Valor oferta', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(25, 8,  number_format($row['vlofer']), 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 8, 'Plazo de ejecucion (Meses)', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(10, 8,  $row['plzejecu'], 1, 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(35, 8, 'Resultado', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(40, 8, $row['nombre_res'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Causales', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['nombre_causal'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->cell(40, 8, 'Trazabilidad ', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Multicell(150, 8, $row['traza'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Poder', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['nombre_poder'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Soporte licitaciones', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['nombre_sp'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Empresa ganadora', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['empgana'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Fecha de legalizacion', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['fhlegal'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(60, 8, 'Fecha indiicador / habilitantes', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(130, 8, $row['indicador'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Hora indicador', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['hora'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 8, 'Ofertas en seguimieento', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(140, 8, $row['nombre_seg'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Cobertura del proyecto', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['coberturaProy'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Mensualidad', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	//Menualidad Campo Error en Algunos Casos
	$pdf->Cell(150, 8, number_format($row['mensualidad']), 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Valor oferta ganadora', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['vlofergana'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Tipo poliza', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['tipPoli'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Porcentaje poliza', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['porceP'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Vigencia por dias', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['vigeDia'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Ingeniero preventa', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['ingPropu'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'MYSE experiencia', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8, $row['MYSExp'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Pago estampilla', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['estanpi'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Plataforma', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['plataforma'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(40, 8, 'Usuario Plataforma', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(150, 8,  $row['plataformaU'], 1, 1, 'L');
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 8, 'Contraseña plataforma', 1, 0, 'C');
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(140, 8,   $row['plataformaC'], 1, 1, 'L');
}
$pdf->Output();
