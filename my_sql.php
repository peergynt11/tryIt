
<?php

$id   = $_POST['id'];
$name = $_POST['name'];


echo "Soeben angelegt: <br><br>";
echo "Ohne Filter: <br>";
echo "$id<br>";
echo "$name<br><br>";

echo "HtmlEntities <br>";
echo htmlentities ($id);echo"<br>";
echo htmlentities ($name);echo"<br><br>";

echo "Html SpecialChars<br>";
echo htmlspecialchars ($id,ENT_QUOTES,'UTF-8');echo"<br>";
echo htmlspecialchars ($name,ENT_QUOTES,'UTF-8');echo"<br><br>";

$verbindung = mysql_connect("localhost","root","admin")
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db("world")
or die ("Die Datenbank existiert nicht.");

$eintrag = "INSERT INTO test_php
(id, name)
VALUES
('$id', '$name')";
$eintragen = mysql_query($eintrag);


echo "<br>Wert in DB eingetragen<br><br>";


$abfrage = "SELECT name FROM test_php";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
   {
   echo "$row->name <br>";
   }

mysql_close($verbindung);


?>