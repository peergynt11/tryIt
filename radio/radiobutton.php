
<?php

$radio = $_POST['radio'];
if(isset($_POST['check']))
{
 $check="gesetzt";
}

gibAus($radio,$check);


function gibAus($para1,$para2)
{
  echo "Wert des Buttons: $para1<br>";
  echo "Wert der Checkbox: $para2<br>";
}


?>