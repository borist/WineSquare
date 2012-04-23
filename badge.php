<?php

include 'connect.php';
include 'lib.php';

if(isset($_GET['bid'])){
	$b_title = $_GET['bid'];
}

$badgeInfo = "
	SELECT *
	FROM `badge`
	WHERE `badge`.`title` = '$b_title'
	";
	
$badgeInfo = mysql_query($badgeInfo);
$badge = array();
while($info = mysql_fetch_assoc($badgeInfo)){
	$badge[] = $info;
}


$hasBadge = "
	SELECT *
	FROM `hasbadge`
	WHERE `hasbadge`.`uid` = '$user[user]'
	";
	
$hasBadge = mysql_query($hasBadge);
$has = array();
while($info = mysql_fetch_assoc($hasBadge)){
	$has[] = $info;
}

//pretty($badge);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WineSquare</title>
    <meta name="description" content="<?php echo $user['first_name']; ?>'s badge">
    <meta name="keywords" content="WineSquare"/>

	<title> Badge </title>

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
		a.header {font-weight:bold}
		a.header:link {color: #000; font-weight: bold;}
		a.header:active {color: #000; font-weight: bold;}
		a.header:visited {color: #000; font-weight: bold;}
		a.header:hover {color: #535353; font-weight: bolder; text-decoration:underline}

		h3 {text-align:center}
		img {height:70%; width:70%; margin-left:40px; margin-top:40px}
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
				<div class="two columns">
				</div>
				<div class="eight columns">
					<div class="panel center_all">
						<a href="./badges.php" class="header"> See All Badges </a> 
						<hr />
						
						<ul class="block-grid two-up">
							<li>
								<img src=<?php echo $badge[0]['photo']; ?> />
							</li>
							<li class="center_all">
								<h3> <?php echo $badge[0]['title'];?> </h4>
								</br>
								<h6> <?php echo $badge[0]['subtitle']?><h6>
								</br>
								<h6><i> <?php echo $badge[0]['descrip']?></i></p>
								</br>
								
								<p> Earned by <a href="#"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></a> on <?php echo $has[0]['time']?></p> <!-- NEEDS THE REAL FUNCTIONALITY -->
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
		
	</div>	
	</body>
</html>
