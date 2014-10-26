<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
</style>
<link rel="stylesheet" type="text/css" href="../include/kalender/tcal.css" />
<script type="text/javascript" src="../include/kalender/tcal.js"></script>
</head>
<body>
<?php

####### FORMULAR ODER POST AUSGEBEN ######

if(!isset($_POST["sub"]))
{
?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<!-- add class="tcal" to your input field -->
		<div><input type="text" name="date" class="tcal" value="" /></div>
      <br /><br />
  <input type="Submit" name="sub" value="Abschicken">
</form>
<?php
}
else
{
    $datum = $_POST["date"];

    $jahr = substr($datum, 0, 4);
    $monat = substr($datum, 5, 2);
    $tag = substr($datum, 8, 2);
   # echo 'Der Tag: ' . $tag. '. Der Monat: ' .$monat. '. Das Jahr: ' .$jahr. '';

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

    $datei = fopen("daten.txt","w");
    $abfrage = "SELECT id, name, datum FROM vrl where datum <= '" .$datum. "'";
       echo "" .$abfrage. "<br><br> ";
    $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
     {
       echo "$row->name&nbsp;&nbsp;$row->datum<br>";
       $zeile="".trim($row->name). "," .trim($row->datum)."\n";
	   echo fwrite($datei, $zeile,100);
     }

mysql_close($verbindung);
fclose($datei);

}
?>

</body>
</html>