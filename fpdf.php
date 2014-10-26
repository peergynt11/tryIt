<?php

define('FPDF_INSTALLDIR', '/xampp/htdocs/include/fpdf');

if(!defined('FPDF_FONTPATH')) define('FPDF_FONTPATH', FPDF_INSTALLDIR.'/font/');
include(FPDF_INSTALLDIR.'/fpdf.php');

// Pr�fen ob die Klasse existiert
if(class_exists('FPDF')) {
  // Die Klasse existiert, Installation ok
  die("Die Installation war erfolgreich. Die Klasse FPDF existiert.");
} else {
  // Die Klasse existiert nicht
  die("Die Klasse FPDF existiert nicht.
       Pr�fen Sie, ob die Datei '".FPDF_INSTALLDIR."/fpdf.php' vorhanden ist.");
}

?>
