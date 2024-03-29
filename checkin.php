<?php

include 'connect.php';
include 'lib.php';


/**
 * This piece of code saves a checkin into
 * the drank table of the database.
 * On success a message is sent to the javascript
 * to display on the page. On a failure, the user
 * is notified to check their input.
 */
if(isset($_POST['wine_drank'])){
   $checkinQuery = "
      INSERT INTO `drank`
      VALUES ('$user[user]', '$_POST[wine_id]', NOW(), '$_POST[location]')";
   $result = mysql_query($checkinQuery);
/**
*Query to check the badges on check in
*/

$badgeNumberQuery = "
	SELECT *
	FROM `drank`
	WHERE `drank`.`user` = '$user[user]'
	";
$res = mysql_query($badgeNumberQuery);
$RegCount = mysql_num_rows($res);

	$me = $user['user'];

	if($RegCount == 1){
		$title = "The n00b";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it!
		
		';
	}
	 if($RegCount == 3){
		$title = "The Newbie";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	 if($RegCount == 10){
			$title = "The Winestar";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	 if($RegCount == 25){
			$title = "The Winelover";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	 if($RegCount == 35){
			$title = "The Patriot";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	 if($RegCount == 50){
			$title = "The Vet";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	 if($RegCount == 100){
			$title = "The Champ";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	}

	$badgeExploreQuery = "
		SELECT DISTINCT `wid`
		FROM `drank`
		WHERE `user` = '$user[user]'
		";
	$badgeExplore = mysql_query($badgeExploreQuery);
	$ExploreCount = mysql_num_rows($badgeExplore);
// while($row = mysql_fetch_assoc($badgeExplore)){
// 	$ExploreCount = $row;
// }	
		
	if($ExploreCount == 7){
			$title = "The Explorer";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
	
	}
	if($ExploreCount == 30){
			$title = "The Pioneer";
	   $BadgeQuery = "
	      INSERT INTO `hasbadge`
	      VALUES ('$me', '$title', NOW())";
	   $finished = mysql_query($BadgeQuery);
		echo 'Congratulations! You just earned a new badge! Go to your profile page page to see it! 
		
		';
		
	
	}
	// $badgeSheenQuery = "
	// 		SELECT COUNT(*)
	// 		FROM `drank`
	// 		WHERE `drank`.`time` >= currdate() - INTERVAL 1 Month";
	// 	$badgeSheen = mysql_query($badgeSheenQuery);
	// 
	// 	while($row = mysql_fetch_assoc($badgeSheen)){
	// 		$SheenCount = $row;
	// 	}	
	// 		echo $SheenCount;
	// 
	// 		if($SheenCount == 101){
	// 				$title = `The Sheen`;
	// 		   $BadgeQuery = "
	// 		      INSERT INTO `hasbadge`
	// 		      VALUES (`$uid`, `$title`, NOW())";
	// 		   $finished = mysql_query($BadgeQuery);
	// 		}
	
//pretty($finished);

   if($result){
      echo "You successfully checked in with a glass of $_POST[wine_drank] at $_POST[location]! Cheers!";
   }
   else {
      echo "Un unexpected error occurred. Make sure you have provided correct input";
   }
   die();
}

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
	
	<style type="text/css">
		h3 {text-align:center; font-size: 36px; color:#0000CC}
		h4 {text-align:center}
		label {text-align:center; font-size:20px; }	
	</style>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO667Z5BxNMNrggUtjLSKsG9CDgHAc3e8&sensor=true"></script>
	
  </head>
  <body>
	
   <?php include 'topbar.php'; ?>
   
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
					<h3 id="checkin_head"> Check-In to WineSquare! </h3>
               
               <h4 id="checkin_message"></h4>
					
					<br />
					<form name="checkin" action="checkin.php" method="post" id="checkin" class="nice">
					<label for="winefinder" > You were drinking: </label> <br />
					<input name="wine_drank" type="text" class="expand input-text" placeholder="Start typing the name of a wine..." id="wine_drank"/><br /><br />
               <!-- the next field holds silently the wine_id -->
               <center><input type="text" name="wine_id" id="wine_id" style="display:none; text-align:center" /></center>
					
					<label for="location"> At: </label>
					<span id="location_disp"></span>
               <!-- input placeholder for location -->
               <center><input type="text" name="location" id="location" style="display:none; text-align:center" /></center>
					
					<br />
					<label for="timestamp"> On: </label>
					<span id="timestamp"></span><br /><br /><br />
					<strong class="centered">
					<center><a href="#" class="nice large radius blue button" id="submit_checkin">Drink! &raquo;</a></center>
					</strong>
					</form>
					<br /><br /><br />
					
					
				</div> <!-- panel -->
			</div>
			
			<div class="two columns">
			</div>
			
		</div> <!-- row -->
	</div> <!-- container -->
	
	<script>
   	$("#logout").click(function() {
      	logout();
   	});
	
		$(document).ready(function(){
			getLocation();
			getCurrentTime();         
		});
      
      /** 
       * The autocomplete inserts the name in the search box
       * and on a selected entry inserts the wine id in the
       * #wine_id tag. This is so because wine_id is our wine
       * key in the database, so the only way to store a checkin
       * is to provide the wine id. Also, wines are uniquely
       * identified by that id, so it must be present along with
       * the wine name.
       */
      $(function() {
         var wines = [ 
            <?php echo $wines; ?>
         ];
         
         $("#wine_drank").autocomplete({
            source: wines,
            checkin: true,
            focus: function(event, ui) {
               $("#wine_drank").val(ui.item.label);
               return false;
            },
            select: function(event, ui) {
               $("#wine_drank").val(ui.item.label);
               $("#wine_id").val(ui.item.wid);
               
               return false;
            }
         })
         .data("autocomplete")._renderItem = function(ul, item) {
            return $( "<li></li>" )
               .data( "item.autocomplete", item )
               .append( "<a>" + item.label + "</a>" )
               .appendTo( ul );
         };
      });
		
      /**
       * When you pick a wine from the autocomplete
       * the submit button becomes the focused object.
       * Therefore, if a user presses enter right after
       * they pick a wine, this function gets called
       * immediately.
       *
       * This funciton serializes the form and submits
       * it to this same file through ajax. After that
       * a reponse is fed back through the ajax callback
       * to notify the user that their checkin has been
       * saved. This is probably not the most optimal but
       * is pretty good.
       */
		$("#submit_checkin").click(function() {
         $("#location").val($("#location_disp").text());
			checkin();
		});
		
	</script>

	</body>

</html>