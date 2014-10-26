
<?php

$id   = $_POST['id'];
$name = $_POST['name'];


echo "Soeben angelegt: <br><br>";
echo "Ohne Filter: <br>";
echo "$id<br>";
echo "$name<br><br>";

echo "HtmlEntities <br>";
echo htmlentities ($id);echo"<br>";
echo htmlentities ($name);echo"<br><br>";

echo "Html SpecialChars<br>";
echo htmlspecialchars ($id,ENT_QUOTES,'UTF-8');echo"<br>";
echo htmlspecialchars ($name,ENT_QUOTES,'UTF-8');echo"<br><br>";

?>