<?php


$server=$_SERVER['SERVER_NAME'];

if ($server == 'tryit.local'){
  $host       = "localhost";
  $dbUser     = "root";
  $dbPassword = "root#1";
  $db         = "vierhuf.de";
}else {
  $host       = "db479251165.db.1and1.com";
  $dbUser     = "dbo479251165";
  $dbPassword = "_bernd#1";
  $db         = "db479251165";
}
$mysqli = new mysqli($host, $dbUser, $dbPassword, $db);
if ($mysqli->connect_errno) {
     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>