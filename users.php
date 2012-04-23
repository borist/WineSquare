<?php

include 'connect.php';

session_start();

/**
 * Function code
 */
 
$code = trim($_POST['code']);


/**
 * Function declarations
 */


/**
 * Creates an account for the given user 
 * if it does not exist. 
 */
function create_account(){
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
   
   $query = "SELECT * FROM `users` WHERE `user` = '$email'";
   $selectUser = mysql_query($query);
   while($result = mysql_fetch_assoc($selectUser)){
      $user[] = $result;
   }
   $_SESSION['user'] = $user;

   echo 1;
   die();
}


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
      echo 1;
   }
   else {
      echo 0;
   }
   die();
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
   die();
}


/**
 * Deletes a user from the database 
 * and all records associated with it
 */
function delete_account($uid){
   $deleteUserQuery = "
      DELETE
      FROM `users`
      WHERE `user` = '$uid'";
   $deleteDrankQuery = "
      DELETE
      FROM `drank`
      WHERE `user` = '$uid'";
   $deleteHasBadgeQuery = "
      DELETE
      FROM `hasbadge`
      WHERE `uid` = '$uid'";
   mysql_query($deleteUserQuery);
   mysql_query($deleteDrankQuery);
   mysql_query($deleteHasBadgeQuery);
   
   logout();
   
   echo 1;
   die();
}





/**
 * Controlling codes
 */

if($code == "login")
   login();
if($code == "logout")
   logout();
if($code == "create_account")
   create_account();
if($code == "delete_account")
   delete_account($_POST['prof']);


?>