<?php
//Feld 'name' überprüfen

function checkName($val)
{
    $msg = "";
    $val = trim($val);
    if($val=="")
    {
         $msg = "Bitte ausfüllen!";
    }
    elseif (strlen($val) < 5)
    {
       $msg = "Mindestens 5 Zeichen!";
    }
    elseif (strlen($val) > 20)
    {
       $msg = "höchstens 20 Zeichen!";
    }

    return $msg;
}
?>