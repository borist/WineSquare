<?php

include 'connect.php';

$user = trim($_POST['email']);
$pass = md5(trim($_POST['password']));

$query = "SELECT * FROM `users` WHERE `user` = '$user' AND `password` = '$pass'";
$query = mysql_query($query);
while($result = mysql_fetch_array($query)){
   echo $result['first_name'].' '.$result['last_name']." logged in!";
}

if(mysql_num_rows($query) == 0){
   echo "The user does not exist.";
}

?>