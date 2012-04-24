<?php

include 'connect.php';
include 'lib.php';

if(isset($_GET['uid'])){
	$currUser = $_GET['uid'];
}

else {
	header("Location: index.php");
}

$locationsQuery = "
		SELECT `location`
		FROM `drank`
		WHERE `user`='$currUser'
		";

$locationsresults = mysql_query($locationsQuery);
$locations = "";
while($location = mysql_fetch_assoc($locationsresults)){
	$locations .= $location['location'];
	$locations .= ";";
}

$first_name = "
		SELECT `first_name`
		FROM `users`
		WHERE `user`='$currUser'";
$first_name = mysql_query($first_name);
$single = mysql_fetch_assoc($first_name);
$username = $single['first_name'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WineSquare</title>
    <meta name="description" content="">
    <meta name="keywords" content="WineSquare"/>

	<title><?php echo $wine['name']; ?></title>

	<!-- Stylesheet --> 
	<link rel="stylesheet" href="./styles/globals.css">
	<link rel="stylesheet" href="./styles/typography.css">
	<link rel="stylesheet" href="./styles/grid.css">
	<link rel="stylesheet" href="./styles/ui.css">
	<link rel="stylesheet" href="./styles/forms.css">
	<link rel="stylesheet" href="./styles/orbit.css">
	<link rel="stylesheet" href="./styles/reveal.css">
	<link rel="stylesheet" href="./styles/mobile.css">
	<link rel="stylesheet" href="./styles/topbar.css">
	<link rel="stylesheet" href="./styles/profile.css">
	<link rel="stylesheet" href="./styles/misc.css">
	
	<style type="text/css">
		#map_canvas {
			width: 90%; 
			height: 500px; 
			margin-left: auto;
			margin-right: auto;			
			border: 1px solid #777; 
			overflow: hidden;
		}
		.container{
		
		}
	</style>
	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&key=AIzaSyCPpM7DgRoPmBpFMaTpR3X0YOEeMpUX3RU&sensor=false"></script>
	</head>
	
	<body>
   
   <?php include 'topbar.php'; ?>

	<div class="container">
		<br/><br/><br/><br/>
		<div id="map_canvas"></div> 
		<?php
			echo '<script language="javascript">test();</script>';
		
		?>
		<!-- Footer -->
		<div class="row">
			<div id="footer">
				<p>&copy; We're Awesome</p>
			</div>
		</div>
	</div>
	<script src="./javascripts/location.js"></script>

   <script>
	$(document).ready(function() {
		var loc = "<?php echo $locations; ?>";
		var user = "<?php echo $username; ?>";
		plotLocations(loc, user);
	})
   </script>
	
</body>
</html>