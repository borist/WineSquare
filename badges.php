<?php

include 'connect.php';
include 'lib.php';


if(isset($_GET['uid'])){
	$curr = $_GET['uid'];
}
else{
	$curr = $user['user'];
}

$myBadges = "
	SELECT DISTINCT * 
	FROM `hasbadge`
	WHERE `hasbadge`.`uid` = '$curr'
	";

$myBadges = mysql_query($myBadges);
$badges = array();
while($badge = mysql_fetch_assoc($myBadges)){
	$badges[$badge['title']] = $badge;
}

$userInfo = "
	SELECT *
	FROM `users`
	WHERE `users`.`user` = '$curr'
	";
	
$userInfo = mysql_query($userInfo);
$currUser = array();
while($info = mysql_fetch_assoc($userInfo)){
	$currUser[] = $info;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WineSquare</title>
    <meta name="description" content="<?php echo $currUser[0]['first_name']; ?>'s Badges">
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
				<h4><span><a href="example_prof.html" class="header"><?php echo $currUser[0]['first_name']; ?>'s Badges</a></span></h3>
					<p style="margin-top:15px;">These are all the badges that <?php echo $currUser[0]['first_name']; ?> has unlocked by drinking wine! 
						Click on a badge to learn more about it, including how to earn one for yourself!</p>
					<div id="userBadges" style="margin-top:25px; margin-left:auto; margin-right:auto;">
						<ul class="block-grid badges">
							
							
							<?php foreach($badges as $b): ?>
								<li><div class="badge columns center_all">
									<img src=<?php
									
									$badgeInfo = "
										SELECT *
										FROM `badge`
										WHERE `badge`.`title` = '$b[title]'
										";

									$badgeInfo = mysql_query($badgeInfo);
									$badgey = array();
									while($info = mysql_fetch_assoc($badgeInfo)){
										$badgey[] = $info;
									}
									
									echo $badgey[0]['photo'];
									
									?> />
									<p><a href="./badge.php?bid=<?php echo $b['title']?>&uid=<?php echo $currUser[0]['user']?>" class="description"><?php echo $b['title']?></a></p></div>
								</li>
							<?php endforeach; ?>
							
							<?php
							$count = count($badges);
							
							while ($count < 10): ?>
							<li><div class="badge columns center_all">
								<img src="./images/default.png"/>
								<p>Drink More!</p></div>
							</li>	
							<?php	
								$count = $count + 1;
							endwhile; ?>
				           
							
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