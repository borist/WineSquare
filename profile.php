<?php

include 'connect.php';
include 'lib.php';

$checkins = "
   SELECT *
   FROM `drank`
   WHERE `user` = '$user[user]'";
$checkins = mysql_query($checkins);
$checkins = mysql_num_rows($checkins);

$wines = "
   SELECT DISTINCT *
   FROM `drank`, `wines`
   WHERE `drank`.`user` = '$user[user]'
   AND `wines`.`id` = `drank`.`wid`
   ORDER BY `drank`.`time` DESC";
$wines = mysql_query($wines);
$winesTasted = mysql_num_rows($wines);
$winesProfileInfo = array();
while($result = mysql_fetch_assoc($wines)){
   $winesProfileInfo[] = $result;
}

//pretty($winesProfileInfo);
//pretty($user);

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
	<link rel="stylesheet" href="./styles/reveal.css">
	<link rel="stylesheet" href="./styles/mobile.css">
	<link rel="stylesheet" href="./styles/topbar.css">
	<link rel="stylesheet" href="./styles/profile.css">
	<link rel="stylesheet" href="./styles/misc.css">

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
	<div class="row">
		<div class="seven columns">
			<div class="row mobile">
				<div class="three phone-one columns">
					<img src="<?php echo $user['photo']; ?>">
				</div>
				<div class="nine phone-three columns">
					<h3>
						<?php echo $user['first_name'].' '.$user['last_name']; ?>
					</h3>
					<p>
						<?php echo "From: ".$user['location']; ?>
					</p>
					<!-- Profile Stats -->
					<div id="stats">
					<div class="row wrapper">
						<div class="four columns">
							<div class="one check_ins">
								<p><b><?php echo $checkins; ?></b></p>
							</div>
							<div class="description">
								<p>Total Check-ins</p>
							</div>
						</div>
						<div class="four columns">
							<div class="one total_wines">
								<p><b><?php echo $winesTasted; ?></b></p>
							</div>
							<div class="description">
								<p>Wines Tasted</p>
							</div>
						</div>
						<div class="four columns">
							<div class="one num_badges">
								<p><b>0</b></p>
							</div>
							<div class="description">
								<p>Badges Collected</p>
							</div>
						</div>
						<div class="one columns">
							<!-- empty column -->
					</div>	
					</div>
				</div>
				</div>
			</div>
			
			<!-- History of check-ins -->
			<div id="history">
							<h3> History </h3><br>
            <?php foreach($winesProfileInfo as $wineInfo): ?>
				<div class="row">
					<div class="two phone-one columns">
						<img src="<?php echo $wineInfo['pic']; ?>">
					</div>
					<div class="ten phone-three columns">
						<h6>
							<a href="#"><?php echo $wineInfo['name']; ?></a>
						</h6>
						<p><?php echo $wineInfo['descr']; ?></p>
					</div>
				</div>
            <?php endforeach; ?>
			</div>
		</div>
		
		<!-- Sidebar -->
			<div class="four columns offset-by-one">
				<!-- Badges -->
					<div id="userBadgesPrev">
						<a href="badges.html">See All</a>
						<h5><span>Badges</span></h5>
						<ul class="block-grid four-up">
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
							<li><img src="http://placehold.it/100x100" /></li>
						</ul>	
					</div>
				<!-- Mayorships	 -->
					<div id="userMayorship">
						<h5>Mayorship</h5>
						<div class="row">
							<div class="four columns">
								<img src="http://placehold.it/400x300" />
							</div>
							<div class="eight columns">
								<p>Congratulations! You've drank the most <a href="#">Merlot</a> wine. Enjoy your time as mayor!</p>
							</div>
						</div>
					</div>
				<!-- Friends	 -->
				<div id="userRecs">
					<a href="#">See All</a>
					<h5><span>Recommendations</span></h5>
					<ul class="block-grid five-up">
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
						<li><img src="http://placehold.it/100x100" /></li>
					</ul>	
				</div>	
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
