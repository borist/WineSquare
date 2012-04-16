<?php

$link = mysql_connect("localhost", "root", "9008305321");
mysql_select_db("winesquare", $link )
or die ("This database does not exist!");

session_start();

if(!isset($_SESSION['user'])){
   header('Location: login.html');
}

$user = $_SESSION['user'][0];

?>
