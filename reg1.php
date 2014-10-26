<?php
$zeichenkette = "12D";
$suchmuster = '/[^0-9]+/';
$i=preg_match($suchmuster, $zeichenkette);
echo ($i);
?>