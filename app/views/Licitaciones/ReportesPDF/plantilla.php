<?php
require 'librerias/pdf/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../../../../assets/img/Tigocopy.jpg', 10, 5, 25);
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(30);
		$this->SetTextColor(42, 87, 136);
		$this->Cell(120, 10, 'Reporte De Licitaciones', 0, 0, 'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}
