<?php

function pretty($var){
   echo "<pre>";
   print_r($var);
   echo "</pre>";
}

function easyDate($date){
   $phpdate = strtotime($date);
   $newdate = date('g:i a \o\n F jS, Y', $phpdate);
   return $newdate;
}

?>