<?php

function checkNotnull($name, $val)
{
    $text = "Bitte ausfüllen: ";
    $msg = "";
    $val = trim($val);
    if($val=="")
    {
         $msg = $text .$name;
    }

    return ($msg);
}
?>