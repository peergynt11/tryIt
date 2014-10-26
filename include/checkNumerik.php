<?php

function checkNumerik($name,$val)
{
    $msg = "";
    $val = trim($val);
    $text = "Bitte numerischen Wert erfassen für ";

    if($val=="")
    {
         $msg = $text .$name;
    }

    if(preg_match('/[^0-9]+/',$val))
    {
         $msg = $text .$name;
    }

    return $msg;
}
?>

<!-- if (preg_match('/\D/', $_POST[kontonummer])) { $fehler['kontonummer'] = '<span class=rot>keine gültige Kontonummer</span>'; } -->

