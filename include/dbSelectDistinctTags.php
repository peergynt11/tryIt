<?php

function selectDistinctTags(){

$zaehler = 0;

include("mySqlDB.php");

   $query="SELECT distinct tag, 'xxx' url from bookmarks";

   if ($ergebnis = $mysqli->query($query)) {
      while($row = $ergebnis->fetch_assoc()) {
            $tags[$zaehler] = $row;
            $tags[$zaehler]['url'] = "php/showBookmarks.php?tag='".$row['tag']."'";
            $zaehler ++;
      }
      $ergebnis->free();
      $mysqli->close();
   }
   return $tags;
}
?>
