<?php

include 'connect.php';

function getMonth($month){
   if($month == "January") return 1;
   if($month == "February") return 2;
   if($month == "March") return 3;
   if($month == "April") return 4;
   if($month == "May") return 5;
   if($month == "June") return 6;
   if($month == "July") return 7;
   if($month == "August") return 8;
   if($month == "September") return 9;
   if($month == "October") return 10;
   if($month == "November") return 11;
   if($month == "December") return 12;
   else return 0;
}

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$password = md5($_POST['password']);
$sex = trim($_POST['sex']);
$date = trim($_POST['year'].'-'.getMonth($_POST['month']).'-'.$_POST['day']);

$query = "INSERT INTO `users` (`user`, `password`, `first_name`, `last_name`, `sex`, `birthday`) VALUES ('$email', '$password', '$firstname', '$lastname', '$sex', '$date')";
mysql_query($query);

echo 1;

?>