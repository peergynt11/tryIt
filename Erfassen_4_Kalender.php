<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
</style>
<link rel="stylesheet" type="text/css" href="../include/kalender/tcal.css" />
<script type="text/javascript" src="../include/kalender/tcal.js"></script>
</head>
<body>
<?php

####### FORMULAR ODER POST AUSGEBEN ######

if(!isset($_POST["sub"]))
{
?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<!-- add class="tcal" to your input field -->
		<div><input type="text" name="date" class="tcal" value="" /></div>
      <br /><br />
  <input type="Submit" name="sub" value="Abschicken">
</form>
<?php
}
else
{
    $datum = $_POST["date"];

    $jahr = substr($datum, 0, 4);
    $monat = substr($datum, 5, 2);
    $tag = substr($datum, 8, 2);
    echo 'Der Tag: ' . $tag. '. Der Monat: ' .$monat. '. Das Jahr: ' .$jahr. '';

    if(checkdate($monat,$tag,$jahr))
       echo '<br>Das Datum ist korrekt.<br>';
    else
       echo '<br>Das Datum ist falsch.<br>';


    echo "<br><b>Das Datum:</b><br />".htmlspecialchars($_POST["date"]);
}
?>

</body>
</html>