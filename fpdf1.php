<?php

require('/xampp/htdocs/include/fpdf/fpdf.php');
include ("cleanData.php");

$timestamp = time();
$datum = date("d.m.Y",$timestamp);
$uhrzeit = date("H:i",$timestamp);
$dat = $datum." - ".$uhrzeit." Uhr";

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hallo Welt ');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(7,5,$dat,0);
$pdf->Ln(10);

$verbindung = mysql_connect("localhost","root","")
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db("test")
or die ("Die Datenbank existiert nicht.");

$abfrage = "SELECT id, name, datum, createdate FROM vrl";
$ergebnis = mysql_query($abfrage);
$pdf->SetFont('Arial','B',7);

  while($row = mysql_fetch_assoc($ergebnis)) {
    array_walk($row, 'cleanData');
    $pdf->Cell(7,5,$row["id"],1);
    $tmp=$row["id"] * 2;
    $pdf->Cell(7,5,$tmp,1);
    $pdf->Cell(20,5,$row["name"],1);
    $pdf->Cell(20,5,$row["datum"],1);
    $pdf->Cell(20,5,$row["createdate"],1);
    $pdf->Ln(5);
  }

$pdf->Output();

?>
