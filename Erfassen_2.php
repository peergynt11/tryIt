<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>XAMPP TryIt</title>
<link href="../css/tryIt.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php

$checkFields  = true;
$error["id"]="";
$error["name"]="";

echo "Document_Root:" . $_SERVER["DOCUMENT_ROOT"]."<br><br>";
echo "REQUEST_URI:" .$_SERVER["REQUEST_URI"]."<br><br>";
echo "HTTP_REFERER:" .$_SERVER["HTTP_REFERER"]."<br><br>";
echo "PHP_SELF:" .$_SERVER["PHP_SELF"]."<br><br>";
echo "SERVER_SOFTWARE:".$_SERVER["SERVER_SOFTWARE"]."<br><br>";

####### PHP FUNKTIONEN ######javascript:(function() {alert(window.content.document.location.href)};

// Funktion zum Drucken von Fehlermeldungen
function msg($msg)
{
    echo "<span style=\"color:#FF0000;\"><b>$msg</b></span>";
}

include ("../include/checkName.php");
include ("../include/checkPlz.php");
include ("../include/includeHtml.php");

if (isset($_POST["sub"]))
{
    $error["id"] = checkPlz($_POST["id"]);
    if ($error["id"] != "")
    {
      $checkFields = false;
    }
    $error["name"] = checkName($_POST["name"]);
    if ($error["name"] != "")
    {
      $checkFields = false;
    }
}


####### FORMULAR ODER POST AUSGEBEN ######
if(!$checkFields  || !isset($_POST["sub"]))
{

?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <b>Id:</b>
  <?php	 if($error["id"] != ""){echo msg($error["id"]);} ?>
  <br />
<input type="Text" name="id" value="<?php if (isset($_POST["sub"])) {echo $_POST["id"];} ?>" />
      <br /><br />

<b>Name:</b>
<?php if($error["name"] != ""){echo msg($error["name"]);} ?><br/>
<input type="Text" name="name" value="<?php if (isset($_POST["sub"])) {echo $_POST["name"];} ?>" /><br /><br />
<input type="Submit" name="sub" value="Abschicken">

</form>
<?php
}
else
{
    $id = $_POST["id"];
    echo "<b>Die ID:</b><br />".htmlspecialchars($_POST["id"]);

    $name = $_POST["name"];
    echo "<br><b>Dein Name:</b><br />".htmlspecialchars($_POST["name"]);
}
?>

</body>
</html>