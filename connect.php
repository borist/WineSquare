<?php

$host = "winesquare.db.7677571.hostedresource.com";
$username = "winesquare";
$password = "W1n3Square";
$link = mysql_connect($host, $username, $password);
mysql_select_db("winesquare", $link )
or die ("This database does not exist!");

session_start();

if(!isset($_SESSION['user'])){
   header('Location: login.html');
}

if(!isset($_GET['pid'])){
   $user = $_SESSION['user'][0];
}
else {
   $queryUser = "
      SELECT *
      FROM `users`
      WHERE `user` = '$_GET[pid]'";
   $userData = mysql_query($queryUser);
   while($result = mysql_fetch_assoc($userData)){
      $user[] = $result;
   }
   $user = $user[0];
}

?>
