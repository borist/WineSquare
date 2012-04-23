<?php

include 'connect.php';
include 'lib.php';

$currUser = $user['user'];

$locationsQuery = "
		SELECT `location`
		FROM `drank`
		WHERE `user`='$currUser'
		";

$locationsresults = mysql_query($locationsQuery);
$locations = array();
$index=0;
while($location = mysql_fetch_assoc($locationsresults)){
	$locations[] = $location['location'];
	$index++;
}
$encoded=json_encode($locations);
echo $encoded;
pretty($locations);
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
	<div id="topbar">
	    <div class="row">
	      <div class="four columns">
	        <h1><a href="./">WineSquare</a></h1>
	      </div>
	      <div class="eight columns hide-on-phones">
	      	<strong class="right">
					<input class="search_bar" placeholder="Search..." type="search"/>
	      		<a href="profile.php">Profile</a>
	      		<a href="#">Logout</a>	
	      	</strong>
	      </div>
		</div>
	</div>

	<div class="container">
		<br/><br/><br/><br/>
		<div id="map_canvas"></div> 
		<?php
			echo '<script language="javascript">test();</script>';
		
		?>
	</div>
	<script type="text/javascript" src="./javascripts/jquery.min.js"></script>
   <script src="./javascripts/forms.js"></script>
	<script src="./javascripts/location.js"></script>

   <script>

	$(document).ready(function() {
	
		var loc = "<?php echo $locations; ?>";
		alert(loc);
		
		plotLocation("Miami, Florida");
	})

   $("#logout").click(function() {
      logout();
   });
   </script>
	
</body>
</html>