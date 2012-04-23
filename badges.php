<?php

include 'connect.php';
include 'lib.php';

$myBadges = "
	SELECT DISTINCT * 
	FROM `hasbadge`
	WHERE `hasbadge`.`uid` = '$user[user]'
	";

$myBadges = mysql_query($myBadges);
$badges = array();
while($badge = mysql_fetch_assoc($myBadges)){
	$badges[] = $badge;
}

pretty($badges);


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
		a.header:link {color: #000; font-weight: bold;}
		a.header:active {color: #000; font-weight: bold;}
		a.header:visited {color: #000; font-weight: bold;}
		a.header:hover {color: #535353; font-weight: bolder;}
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
	      		<a href="./profile.php">Profile</a>
	      		<a href="#">Logout</a>	
	      	</strong>
	      </div>
		</div>
	</div>
	
	<div id="container">
		<div class="row">
			<div class="panel center_all nine">
				<h4><span><a href="example_prof.html" class="header">Nathan's Badges</a></span></h3>
					<p style="margin-top:15px;">These are all the badges that Nathan has unlocked by drinking wine! 
						Click on a badge to learn more about it, including how to earn one for yourself!</p>
					<div id="userBadges" style="margin-top:25px; margin-left:auto; margin-right:auto;">
						<ul class="block-grid badges">
							
							<?php foreach($badges as $b): ?>
							
							<li><div class="badge columns center_all">
								<img src="./images/noob_pin.png" /></a>
								<p><a href="./" class="description">
								<?php if ($b['title'] == "The n00b"){
									echo $b['title'];}
									else {echo "?????";}

								?></a></p></div>
							<?php endforeach; ?>
							</li>
							
							<li><div class="badge columns center_all">
								<a href="./badges/the_newbie.html"><img src="./images/newbie.png" /></a>
								<p><a href="./badges/the_newbie.html" class="description">The Newbie </a></p></div>
							</li>
								
							<li><div class="badge columns center_all">
								<a href="./badges/the_winestar.html"><img src="./images/rainbow_star.jpeg" /></a>
								<p><a href="#" class="description">The Wine Star</a></p></div>
							</li>
							
							<li><div class="badge columns center_all">
								<a href="./badges/the_winelover.html"><img src="./images/wine_love.png" /></a>
								<p><a href="#" class="description">The Wine Lover </a></p></div>
							</li>
								
							<li><div class="badge columns center_all">
								<a href="./badges/the_patriot.html"><img src="./images/the_patriot.png" /></a>
								<p><a href="./badges/the_patriot.html" class="description">The Patriot</a></p></div>
							</li>
								
							<li><div class="badge columns center_all">
								<a href="./badges/the_vet.html"><img src="./images/keep_calm.jpg" /></a>
								<p><a href="./badges/the_vet.html" class="description">The Vet</a></p></div>
							</li>

							<li><div class="badge columns center_all">
								<a href="./badges/the_champ.html"><img src="./images/champ.png" /></a>
								<p><a href="./badges/the_champ.html" class="description">The Champ</a></p></div>
							</li>								

							<li><div class="badge columns center_all">
								<a href="./badges/the_sheen.html"><img src="./images/the_sheen.jpg" /></a>
								<p><a href="./badges/the_sheen.html" class="description">The Sheen</a></p></div>
							</li>
															
							<li><div class="badge columns center_all">
								<a href="./badges/the_explorer.html"><img src="./images/explorer.jpeg" /></a>
								<p><a href="#" class="description">The Wine Explorer</a></p></div>
							</li>
							
							<li><div class="badge columns center_all">
								<a href="./badges/enthusiast_white.html"><img src="./images/champ_white.png" /></a>
								<p><a href="./badges/enthusiast_white.html" class="description">The White Enthusiast</a></p></div>
							</li>
							
							<li><div class="badge columns center_all">
								<a href="./badges/enthusiast_red.html"><img src="./images/champ_red.png" /></a>
								<p><a href="./badges/enthusiast_red.html" class="description">The Red Enthusiast </a></p></div>
							</li>
							
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
	</body>
</html>