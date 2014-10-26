<?php

echo $_POST["auswahl"];

?>

<html>
<body>

<!--<form action="my_sql.php" method="post">  -->
<!--<form action="mailto:bernd.vierhuf@siemens.com" method="post">  -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">

<select name="auswahl">
<option value="vierhuf-net">vierhuf-net</option>
<option value="skyrim">skyrim</option>
<option value="Urlaub">Urlaub</option>
</select>

<p><input name="abschicken" type="submit" /></p>
</form>

</body>
</html>


