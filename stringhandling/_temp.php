<?php
$string = "GT Technology.Trade Secret~Engineer,Gas Turbine.Service~Participant,Gas Turbine.Service~Engineer,Engineering.Gas Turbines~IPT Lead,Engineering.Gas Turbines~Master Advisory Engineer";

$tok = strtok($string, '~,');
$zaehler = 1;


while ($tok !== false) {

    if ($zaehler % 2 == 0){
      echo "$tok<br />";
    }
    $zaehler++;
    $tok = strtok('~,');
}


$a="_";
$string1="view_test_my_own";

$pos=strpos($string1, $a);

$b=substr($string1, $pos);
$a=substr($string1, 0, $pos);


echo($a."_scr".$b);

if ($pos === false){
 echo "nicht gefunden";
}else{
  echo "jaaa";
}



?>