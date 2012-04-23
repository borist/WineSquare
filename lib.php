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

//can be used to check if a url is dead or not
function url_exists($url) {
    $hdrs = @get_headers($url);
    return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
}

?>