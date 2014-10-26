<?php

include ("../include/cleanData.php");
include("../include/array_to_table.php");

$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/* Prepared statement, stage 1: prepare */
if (!($stmt = $mysqli->prepare("INSERT INTO vrl(id, name, datum) VALUES (?, ?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */

$id = 33;
$name='Vierhuf';
$datum='2013-01-01';
$stmt->bind_param("iss", $id,$name,$datum);

/*
if (!$stmt->bind_param("is", $id,$name,$datum)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
*/

/* Prepared statement: repeated execution, only data transferred from client to server */

for ($zaehler = 1; $zaehler < 100; $zaehler++) {
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}

$stmt->close();
mysqli_close($mysqli);

?>