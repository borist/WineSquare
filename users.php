<?php

include 'connect.php';

/**
 * Function code
 */
 
$code = trim($_POST['code']);


/**
 * Function declarations
 */

/**
 * The login function reads the posted information
 * and checks if the user exists in the database. If
 * so, then the user is logged in and a new user
 * session is created.
 */
function login(){
   $user = trim($_POST['email']);
   $pass = md5(trim($_POST['password']));
   
   $query = "SELECT * FROM `users` WHERE `user` = '$user' AND `password` = '$pass'";
   $query = mysql_query($query);
   $user = array();
   while($result = mysql_fetch_assoc($query)){
      $user[] = $result;
   }
   
   // on zero number of rows we have no match for a user
   // from the database  
   if(mysql_num_rows($query) > 0){
      // The user is logged in and we will save
      // his/her information for the session
      session_start();
      $_SESSION['user'] = $user;
      print_r($user);
   }
   else {
      echo 0;
      die();
   }
}



/**
 * Destroys the user session.
 */
function logout(){
   if(isset($_SESSION['user'])){
      unset($_SESSION['user']);
   }
   session_destroy();
   echo 1;
}







/**
 * Controlling codes
 */
 
if($code == "login")
   login();
if($code == "logout")
   logout();


?>