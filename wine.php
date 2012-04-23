<?php

include 'connect.php';
include 'lib.php';

if(isset($_GET['wid'])){
   $wid = $_GET['wid'];
   
   $wineQuery = "
      SELECT *
      FROM `wines`
      WHERE `id` = '$wid'";
   $pickWine = mysql_query($wineQuery);
   $wine = array();
   while($res = mysql_fetch_assoc($pickWine)){
      $wine[] = $res;
   }
   
   $wine = $wine[0];
   //pretty($wine);
}
else{
	header("Location: index.php");
}

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
      .rackphoto span{
         width:160px;
         height:160px;
         position:absolute;
         border: 1px solid #eee;
         top:225px;
         left:90px;
         margin:auto;
         display:block;
         background:url("<?php echo $wine['pic']; ?>") no-repeat;
         background-size: 100%;
      }
	</style>

	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&key=AIzaSyCPpM7DgRoPmBpFMaTpR3X0YOEeMpUX3RU&sensor=false"></script>

	<!-- Google web fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
  </head>
  <body onload="window.scrollTo(000,160);" onunload="GUnload()">
  
  <?php include 'topbar.php'; ?>
	
	<div class="rackphoto">				
	<a>
		<img src="./images/red_wines.jpg" />
		<div class="wine_bar">
			<span></span>
			<em><h3><?php echo $wine['name']; ?></h4></em>	
		</div>
	</a>
	</div>
	</br></br>
	<div class="row">
	<ul class="block-grid two-up">
			<li style="margin-left:20px">
			<h5>
				<strong>Location: </strong> <var id="wine_location"><?php echo $wine['country']; ?></var></br></br>
				<strong>Vintage: </strong><?php echo $wine['vintage']; ?></br></br>
				<strong>Wine Producer: </strong><?php echo $wine['producer']; ?></br><br/>
				<strong>Percent Alcohol: </strong> <?php echo $wine['alcohol'];?> % <br/><br/>
				</h5>
				
				<h6><strong>Description: </strong> <?php echo $wine['descr']; ?></h6>
			
			
			
			</li>
			<li>
				<div id="map_canvas" style="width: 450px; height: 320px; border: 1px solid #777; overflow: hidden;"></div> 
            <script type="text/javascript"> 

            var userLocation = document.getElementById("wine_location").innerHTML;

            if (GBrowserIsCompatible()) {
             var geocoder = new GClientGeocoder();
             geocoder.getLocations(userLocation, function (locations) {         
                if (locations.Placemark) {
                   var north = locations.Placemark[0].ExtendedData.LatLonBox.north;
                   var south = locations.Placemark[0].ExtendedData.LatLonBox.south;
                   var east  = locations.Placemark[0].ExtendedData.LatLonBox.east;
                   var west  = locations.Placemark[0].ExtendedData.LatLonBox.west;

                   var bounds = new GLatLngBounds(new GLatLng(south, west), 
                                                  new GLatLng(north, east));

                   var map = new GMap2(document.getElementById("map_canvas"));

                   map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
                   map.addOverlay(new GMarker(bounds.getCenter()));
                }
             });
            }
            </script> 
			</li>
			</ul>
			</div>
												
			</div> <!-- row -->
			</div>
			</div>
			</div>
				
				<div class="two columns">
				</div>
				
				
		</div> <!-- row -->
	</div> <!-- container -->
		
	<!-- Footer -->
	<div class="row">
		<div id="footer">
			<p>&copy; We're Awesome</p>
		</div>
	</div>
   
	</body>
</html>