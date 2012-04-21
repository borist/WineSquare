<?php

include 'connect.php';

session_start();

function checkin(){
	$user = trim($_POST['user']);
	$wine = trim($_POST['winename']);
	$time = trim($_POST['time']);
	$address = = trim($_POST['address']);
	
	$query = "INSERT INTO `drank` (`user`, `wid`, `time`, `location`) VALUE ('$user', '$wine', '$time', '$address')";
	mysql_query($query);
	
	echo 1;
}

?>