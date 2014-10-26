<?php

echo "Setze cookie";
setcookie("username","Bernd Vierhuf",time()+(3600*24));
echo "Cookie gesetzt";

$cookie = $_COOKIE["username"];
echo "Der Inhalt des Cookies: $cookie";


?>