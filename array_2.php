
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Ausgabe mySql Tabelle</title>

<link rel="stylesheet" href="../../css/jquery.dataTables.css" type="text/css" />
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
</head>
<body>

<?PHP

include("../../include/array_to_table.php");

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

    $abfrage = "SELECT id, name, datum FROM vrl";
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


echo "Anzahl Einträge" . count($tab);

 print_r(array_keys ($tab[6]));


//             echo($row['name']."<br>");


$x=0;
foreach($tab as $row){
    $a = '<a href= "'.$row['name'].'">'.$row['name'].'</a>';
    $tab[$x]['name']=$a;
    $x++;
}

echo (array_to_table($tab, 'example'));

?>
</body>
</html>
