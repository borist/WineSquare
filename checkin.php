<?php

include 'connect.php';
include 'lib.php';

$allWinesQuery = "
   SELECT `name`
   FROM `wines`";
$allWines = mysql_query($allWinesQuery);
$winesArray = array();
while($all = mysql_fetch_array($allWines)){
   array_push($winesArray, '"'.addslashes($all['name']).'"');
}

$wines = implode(", ", $winesArray);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Check-In!</title>
    <meta name="description" content="">
    <meta charset="UTF-8">
    <meta name="keywords" content="WineSquare"/>



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
	<link rel="stylesheet" href="./styles/map.css">
   <link rel="stylesheet" href="./styles/jquery.ui.autocomplete.css">
	
	<style type="text/css">
		h4 {text-align:center}
		label {text-align:center; font-size:20px; }	
	</style>
	
	<script type="text/javascript"
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO667Z5BxNMNrggUtjLSKsG9CDgHAc3e8&sensor=true"></script>
	
  </head>
  <body>
	
	<div id="topbar">
	
	<br />
	<br />
	<br />
	<br />
	<br />
	<div class="container">

		<div class="row">
			<div class="two columns"> </div>
			
			<div class="eight columns">
				<div class="panel">
					<h4 id="checkin_head"> Check-In to WineSquare! </h4>
					
					<br />
					<form name="checkin" action="checkin.php" method="post" id="checkin" class="nice">
					<label for="winefinder" > You were drinking: </label> <br />
					<input type="text" class="expand input-text" placeholder="Start typing the name of a wine..." id="wine_drank"/><br /><br />
					
					<label for="location"> At: </label>
					<span id="location_disp"></span>
					
					<br />
					<label for="timestamp"> On: </label>
					<span id="timestamp"></span><br /><br /><br />
					<strong class="centered">
					<a href="#" class="nice large radius blue button" id="submit_checkin">Drink! &raquo;</a>
					</strong>
					</form>
					<br /><br /><br />
					
					
				</div> <!-- panel -->
			</div>
			
			<div class="two columns">
			</div>
			
		</div> <!-- row -->
	</div> <!-- container -->
	<script src="./javascripts/location.js"></script>
	<script src="./javascripts/forms.js"></script>
	<script src="./javascripts/jquery.min.js"></script>
   
   <!-- jQuery UI Core -->
   <script src="./javascripts/jquery.ui.core.js"></script>
   <script src="./javascripts/jquery.ui.widget.js"></script>
   <script src="./javascripts/jquery.ui.position.js"></script>
   <script src="./javascripts/jquery.ui.autocomplete.js"></script>
   <!-- end jQuery UI Core -->
	
	<script>
		$(document).ready(function(){
			getLocation();
			getCurrentTime();         
		});
      
      $(function() {
         var wines = [ <?php echo $wines; ?> ];
         
         $("#wine_drank").autocomplete({
            source: wines
         });
      });
		
		$("#submit_checkin").click(function() {
			checkin();
		});
		
		$(document).keypress(function(e) {
			if (e.which == 13) {
				checkin();
			}
		});
	</script>

	</body>

</html>