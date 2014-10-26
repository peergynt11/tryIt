<?PHP

# Doku
# \t    = Tabulatoreinrückung für spaltengerechte Anzeige in Excel
# \r\n  = Zeilenumbruch
#
#

    include ("../include/cleanData.php");

    $datum = $_POST["date"];

    $verbindung = mysql_connect("localhost","root","")
  	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

  	mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");

    $abfrage = "SELECT id, name, datum, createdate FROM vrl where datum <= '" .$datum. "'";
    $ergebnis = mysql_query($abfrage);

  // filename for download
  $filename = "test" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  while($row = mysql_fetch_assoc($ergebnis)) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;
?>