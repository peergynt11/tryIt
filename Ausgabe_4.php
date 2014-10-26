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

include ("../include/cleanData.php");
include("../include/array_to_table.php");

    $datum = $_POST["date"];

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

    $abfrage = "SELECT id, name, datum FROM vrl where datum <= '" .$datum. "'";
    $ergebnis = mysql_query($abfrage);

    if (!$ergebnis) {
       echo "Konnte Abfrage ($sql) nicht erfolgreich ausführen von DB: " . mysql_error();
       exit;
    }

    if (mysql_num_rows($ergebnis) == 0) {
       echo "Keine Zeilen gefunden, nichts auszugeben, also Ende";
       exit;
    }

$tab=array();
$zaehler = 0;

while($row = mysql_fetch_assoc($ergebnis)) {
      $tab[$zaehler] = $row;
      $zaehler ++;
  }

mysql_close($verbindung);
echo (array_to_table($tab, 'example'));
}
?>

</body>
</html>