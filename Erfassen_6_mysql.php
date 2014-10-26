<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
</style>
<link rel="stylesheet" type="text/css" href="kalender/tcal.css" />
<script type="text/javascript" src="kalender/tcal.js"></script>
</head>
<body>
<?php

####### FORMULAR ODER POST AUSGEBEN ######

if(!isset($_POST["sub"]))
{
?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<!-- add class="tcal" to your input field -->
 <p>Die ID:   <input type="text" name="id" /></p>
 <p>Ihr Name: <input type="text" name="name" /></p>
 <p>Das Datum:<input type="text" name="date" class="tcal" value="" /></p>
 <br /><br />
  <input type="Submit" name="sub" value="Abschicken">
</form>
<?php
}
else
{
    $datum = $_POST["date"];
    $id   = $_POST['id'];
	$name = $_POST['name'];

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

$eintrag = "INSERT INTO vrl
(id,name,datum,createdate)
VALUES
('$id', '$name', '$datum', sysdate() )";
$eintragen = mysql_query($eintrag);

echo "<br>Wert in DB eingetragen<br><br>";
mysql_close($verbindung);
echo"<script>javascript:history.go(-2);</script>";
}
?>

<!-- javascript:history.go(-2); -->
<!-- echo "<script>javascript:history.go(-2);</script>" -->
<!-- <script>javascript:history.back();</script> -->



</body>
</html>