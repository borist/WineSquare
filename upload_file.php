<?php

include 'connect.php';

$photoName = $_FILES['photoUpload']['name'];
$photoType = $_FILES['photoUpload']['type'];
$photoSize = $_FILES['photoUpload']['size'];
$photoErrs = $_FILES['photoUpload']['error'];
$photoTemp = $_FILES['photoUpload']['tmp_name'];

$user = $_SESSION['user'][0]['user'];
$photo = 'images/'.$user.'.jpg';

//print_r($_FILES['photoUpload']);
//echo $photo;

if ((($photoType == "image/jpeg") || ($photoType == "image/jpg") || 
      ($photoType == "image/pjpeg")) && ($photoSize < 100000)){
  if ($photoErrs == 0) {
    if (file_exists($photo)) {
      echo $photo." already exists. ";
    }
    else {
      move_uploaded_file($photoTemp, $photo);
    }
  }
}
else {
  echo "Invalid file";
}

?>
