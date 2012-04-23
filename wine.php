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
	<link rel="stylesheet" href="./styles/wine_more.css">
	
	<style type="text/css">
		h5 {text-align:center}
		table {border:2px solid black; text-align:left}
		th {font-weight:bold}
		tr{border: 1px solid grey; text-align:left}
	</style>

	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&key=AIzaSyCPpM7DgRoPmBpFMaTpR3X0YOEeMpUX3RU&sensor=false"></script>

	<!-- Google web fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
  </head>
  <body onload="window.scrollTo(000,160);" onunload="GUnload()">
	
	<div id="topbar">
	    <div class="row">
	      <div class="four columns">
	        <h1><a href="index.php">WineSquare</a></h1>
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
	
	<div class="rackphoto">				
	<a href="#">
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
			<h4>
				<strong>Location:</strong> <var id="wine_location"><?php echo $wine['country']; ?></var></br></br>
				<strong>Vineyard:</strong> Chateau Latour </br></br>
				<strong>Vintage:</strong><?php echo $wine['vintage']; ?></br></br>
				<strong>Color:</strong> Red Wine </br></br>			
			</h4>
			<div id="titleText">More..</div><a id="myHeader" href="javascript:toggle2('more','toggle');" >
			<img id="toggle" src="./images/plus.png"></a>
			</br>
			<img id="arrow1" width="10%"src="./images/down_arrow.png" style="visibility:hidden">
			
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
			<p style="border-bottom: 1px dotted #000000; width: 1200px;">
					<div id="more" style="display: none;" class="row">
						<ul class="block-grid two-up">
							<li style="margin-left:20px">
								<h6>
									<strong>Wine Producer:</strong><?php echo $wine['producer']; ?><br/><br/>
									<strong>Wine Sub-Region:</strong> Medoc <br/><br/>
									<strong>Appelation:</strong> Pauillac <br/><br/>
									<strong>Wine Type:</strong> Still Wine <br/><br/>
									<strong>Fruit Source:</strong> Producer owned <br/><br/>
								</h6>
								</li>
								<li>
								<p>
								<table border="1">
									<tr>
										<th>Grape Variety</th>
										<th>Percentage</th>
									</tr>
									<tr>
										<td>Cabernet Franc</td>
										<td>4</td>
									</tr>
									<tr>
										<td>Merlot</td>
										<td>25</td>
									</tr>
									<tr>
										<td>Cabernet Sauvignon</td>
										<td>75</td>
									</tr>
									<tr>
										<td>Petit Verlot</td>
										<td>1</td>
									</tr>
								</table>
								</p><br/>
								
							</li>
						</ul>
						
						
					</div> <!-- row -->
			</div>
									<br/>		
								</li>
							</ul>
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
	
	<script language="javascript" src="./javascripts/more.js"></script>
	<script type="text/javascript" src="./javascripts/jquery.min.js"></script>
	</body>
</html>