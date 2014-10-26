<?php
define('FPDF_FONTPATH','font/');
require('/xampp/htdocs/include/fpdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    // $this->Image('images.jpg',40,30,25,0);
    //Arial fett 15
    $this->SetFont('Arial','B',40);
    //nach rechts gehen
    $this->Cell(30);
    //Titel
    $this->Cell(10,10,	'Titel',1,0,'C');
    //Zeilenumbruch
    $this->Ln(20);
}


//Load data
function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}

//Simple table
function BasicTable($header,$data)
{
    //Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    //Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,5,$col,1);
        $this->Ln();
    }
}

}

$pdf=new PDF();
//Column titles
$header=array('Country','Capital','Area (sq km)','Pop. (thousands)');
//Data loading
$data=$pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',6);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>