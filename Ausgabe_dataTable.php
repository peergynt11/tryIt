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
    $datum = $_POST["date"];

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

    $abfrage = "SELECT id, name, datum FROM vrl where datum <= '" .$datum. "'";
    $ergebnis = mysql_query($abfrage);

  $flag = false;
  while($row = mysql_fetch_assoc($ergebnis)) {
    if(!$flag) {

       $t='<table>' . "\n";
       $t.='<thead>' . "\n";
       $t.='<tr>' . "\n". '<th>';
       $t.=implode('</th>' . "\n" . '<th>', array_keys($row)).'</th>' . "\n" . '</tr>';
#       implode(',', array_keys($row));
#    echo(htmlspecialchars($t));
    echo($t);
    }
    $flag = true;
  }
}
exit;

mysql_close($verbindung);


?>

</body>
</html>