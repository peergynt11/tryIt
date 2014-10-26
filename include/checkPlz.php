<?php

function checkPlz($val)
{
    $msg = "";
    $val = trim($val);

    if(preg_match('/[^0-9]+/',$val) || strlen($val) <> 5)
    {
       $msg = "Bitte gültige PLZ erfassen";
    }

    return $msg;
}
?>

<!-- if (preg_match('/\D/', $_POST[kontonummer])) { $fehler['kontonummer'] = '<span class=rot>keine gültige Kontonummer</span>'; } -->

