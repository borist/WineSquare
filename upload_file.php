<?php
if ((($_FILES["photoUpload"]["type"] == "image/gif")
|| ($_FILES["photoUpload"]["type"] == "image/jpeg")
|| ($_FILES["photoUpload"]["type"] == "image/jpg")
|| ($_FILES["photoUpload"]["type"] == "image/pjpeg"))
&& ($_FILES["photoUpload"]["size"] < 20000))
  {
  if ($_FILES["photoUpload"]["error"] > 0) {
    echo "Return Code: " . $_FILES["photoUpload"]["error"] . "<br />";
    }
  else {
    if (file_exists("images/" . $_FILES["photoUpload"]["name"])) {
    echo $_FILES["photoUpload"]["name"] . " already exists. ";
      }
    else {
      move_uploaded_file($_FILES["photoUpload"]["tmp_name"],
			//change to use users first and last name as name for storage
      "images/" . $_FILES["photoUpload"]["name"]);
      }
    }
  }
else {
  echo "Invalid file";
  }
?>
