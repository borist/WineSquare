<?php
if ($_FILES["photoUpload"]["error"] > 0) {
	echo "Error uploading file: " . $_FILES["photoUpload"]["error"] . "<br/>";
}
else {
	echo "Upload: " . $_FILES["photoUpload"]["name"] . "<br/>";
	echo "Type: " . $_FILES["photoUpload"]["type"] . "<br/>";
	echo "Size: " . $_FILES["photoUpload"]["size"] . "<br/>";
	echo "Stored in: " . $_FILES["photoUpload"]["tmp_name"] . "<br/>";
}
?>