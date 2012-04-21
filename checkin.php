<?php

include 'connect.php';

session_start();

function checkin(){
	$user = trim($_POST['user']);
	$wine = trim($_POST['wine_drank']);
	$time = trim($_POST['timestamp']);
	$address = = trim($_POST['location']);
	
	$query = "INSERT INTO `drank` (`user`, `wid`, `time`, `location`) VALUE ('$user', '$wine', '$time', '$address')";
	mysql_query($query);
	
	echo 1;
}

?>