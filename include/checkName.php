<?php
//Feld 'name' �berpr�fen

function checkName($val)
{
    $msg = "";
    $val = trim($val);
    if($val=="")
    {
         $msg = "Bitte ausf�llen!";
    }
    elseif (strlen($val) < 5)
    {
       $msg = "Mindestens 5 Zeichen!";
    }
    elseif (strlen($val) > 20)
    {
       $msg = "h�chstens 20 Zeichen!";
    }

    return $msg;
}
?>