<?php
require '../assets/librerias/pdf/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../assets/imagenes/Tigo.jpg', 10, 5, 25 );	
		$this->SetFont('Arial','B',12);
		$this->Cell(30);
		$this->SetTextColor(42,87,136);
		$this->Cell(120,10, 'Requisitos Habilitantes y Entregables',0,0,'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I', 8);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
	}
	function vcell($c_width,$c_height,$x_axis,$text){ 
		$w_w=$c_height/3; 
		$w_w_1=$w_w+2; 
		$w_w1=$w_w+$w_w+$w_w+4; 
		$len=strlen($text);
		if($len>7){ 
			$w_text=str_split($text,19); 
			$this->SetX($x_axis); 
			$this->Cell($c_width,$w_w_1,$w_text[0],'','',''); 
			$this->SetX($x_axis); 
			$this->Cell($c_width,$w_w1,$w_text[1],'','',''); 
			$this->SetX($x_axis); 
			$this->Cell($c_width,$c_height,'','LTRB',0,'L',0); 
		}else{ 
			$this->SetX($x_axis); 
			$this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);

		}  
	}	


}
?>