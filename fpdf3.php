<?php
define('FPDF_FONTPATH','font/');
require('/xampp/htdocs/include/fpdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{

// Schriftart festlegen
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hallo Welt!');

$this->Cell(0, 10, 'Titel mit ln=2', 0, 2);

$this->Cell(0, 10, 'Titel mit ln=1', 0, 1);

$this->Cell(0, 10, 'Titel mit ln=0', 0);

$this->Cell(0, 10, 'post', 0, 1);


}


}

$pdf=new PDF();
$pdf->AddPage();
$pdf->Output();
?>