<?php

function checkNotnull($name, $val)
{
    $text = "Bitte ausf�llen: ";
    $msg = "";
    $val = trim($val);
    if($val=="")
    {
         $msg = $text .$name;
    }

    return ($msg);
}
?>