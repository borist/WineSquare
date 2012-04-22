<?php

include 'connect.php';
include 'lib.php';

$myActivity = "
   SELECT DISTINCT *
   FROM `drank`, `wines`
   WHERE `drank`.`user` = '$user[user]'
   AND `wines`.`id` = `drank`.`wid`
   ORDER BY `time` DESC";
$myActivity = mysql_query($myActivity);
$recent = array();
while($activity = mysql_fetch_assoc($myActivity)){
   $recent[] = $activity;
}

$allActivity = "
   SELECT *
   FROM `drank`, `wines`, `users`
   WHERE `drank`.`wid` = `wines`.`id`
   AND `drank`.`user` = `users`.`user`
   ORDER BY `time` DESC
   LIMIT 20";
$allActivity = mysql_query($allActivity);
echo mysql_error();
$all = array();
while($activity = mysql_fetch_assoc($allActivity)){
   $all[] = $activity;
}

//pretty($all);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WineSquare</title>
    <meta name="description" content="Nathan Fraenkel's WineSquare Profile">
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

	<style type="text/css">
		a.subheader:link {color: #6f6f6f;}
		a.subheader:active {color: #6f6f6f;}
		a.subheader:visited {color: #6f6f6f;}
		a.subheader:hover {color: #6f6f6f; text-decoration:underline;}
	</style>

	<!-- Google web fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
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
	      		<a href="#" id="logout">Logout</a>	
	      	</strong>
	      </div>
		</div>
	</div>

<div id="container">
	<!-- top row -->
	<div class="row">
		<!-- top of homepage (picture and links) -->
		<div class="seven columns">
			<div class="row mobile">
				<div class="three phone-one columns">
					<img src="<?php echo $user['photo']; ?>">
				</div>
				<div id="top-stats" class="nine phone-three columns">
					<h3>
						Welcome back, <?php echo $user['first_name']; ?>!
					</h3>
					<a href="./profile.php" class="subheader"><p>View your profile</p></a>
					<a href="./profile.php" class="subheader"><p>Edit profile</p></a>
					<a href="./profile.php" class="subheader"><p>View your badges</p></a>
					<a href="./profile.php" class="subheader"><p>View your wine recommendations</p></a>
				</div>
			</div>
		</div>	

		<!-- Check-in -->
		<div id="check-in-wrapper" class="three columns offset-by-one">
					<p><a class="nice radius blue button" id="check-in" href="checkin.php">
								Check in! &raquo;
						</a></p>
		</div>
	</div>
	
	<!-- bottom row -->
	<div class="row">
			<!-- Recent Activity -->
			<div id="activity" class="seven column">
							<h3>Recent Activity</h3><br>
                     
            <?php foreach($all as $activity): ?>
				<div class="row">
					<div class="three phone-one columns">
						<img src="<?php echo $activity['photo']; ?>">
					</div>
					<div class="nine phone-three columns">
						<h6>
							<a href="#"><?php echo $activity['first_name'].' '.$activity['last_name']; ?></a>
						</h6>
						<p>
							<?php echo $activity['first_name'];?> drank a glass of <a href="#"><?php echo $activity['name']; ?></a> at <?php echo easyDate($activity['time']); ?>. 
						</p>
					</div>
				</div>
            <?php endforeach; ?>	
			</div>
	
				<!-- User Activity -->
				<div id="userActivity" class="four columns offset-by-one">
					<h5>Your Recent Check-ins:</h5>
					
               <?php foreach($recent as $activity): ?>
					<div class="row">
						<div class="two columns">
							<img src="<?php echo $activity['pic']; ?>" />
						</div>
						<div class="ten columns">
							<h7><a href=""><?php echo $activity['name']; ?></a></h7>
							<p>You drank a glass of <?php echo $activity['name']; ?> at <?php echo easyDate($activity['time']); ?> in <?php echo $activity['location']; ?>.</p>
						</div>
					</div>
               <?php endforeach; ?>
					
				</div>

	</div>
	<!-- Footer -->
	<div class="row">
		<div id="footer">
			<p>&copy; We're Awesome</p>
		</div>
	</div>
</div>

	<!-- JavaScript files placed at the bottom to avoid slow loading times --> 
	<script src="./javascripts/jquery.min.js"></script>
	<script src="./javascripts/app.js"></script>
   <script src="./javascripts/forms.js"></script>
   
   <script>
   $("#logout").click(function() {
      logout();
   });
   </script>
   
  </body>
</html>
