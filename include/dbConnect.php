<?php

    $verbindung = mysql_connect("localhost","root","")
	or die ("keine Verbindung m�glich. Benutzername oder Passwort sind falsch");

    mysql_select_db("test")
	or die ("Die Datenbank existiert nicht.");
?>