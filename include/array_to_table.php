<?php

function array_to_table($a, $IdAttr){

     $t="<table id=\"$IdAttr\">";
     $t.='<thead>' . "\n";
     $t.='<tr>' . "\n". '<th>';
     $t.=implode('</th>' . "\n" . '<th>', array_keys($a[0])).'</th>' . "\n" . '</tr>'. "\n";
     $t.='</thead>' . "\n";
     $t.='<tbody>' . "\n";
     foreach($a as $row){
             $t.='<tr>' . "\n". '<td>';
             $t.= implode('</td>' . "\n" . '<td>', $row).'</td>' . "\n" . '</tr>'. "\n";
     }
     $t.='</tbody>' . "\n";
    return $t.='</table>';
 }