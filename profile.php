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
   SELECT *
   FROM `drank`, `wines`
   WHERE `drank`.`user` = '$user[user]'
   AND `wines`.`id` = `drank`.`wid`
   ORDER BY `drank`.`time` DESC";
$wines = mysql_query($wines);
$winesProfileInfo = array();
while($result = mysql_fetch_assoc($wines)){
   $winesProfileInfo[] = $result;
}

$uniqueWines = "
   SELECT *
   FROM `drank`, `wines`
   WHERE `drank`.`user` = '$user[user]'
   AND `wines`.`id` = `drank`.`wid`
   GROUP BY `wines`.`id`
   ORDER BY `drank`.`time`";
$uniqueWines = mysql_query($uniqueWines);
$winesTasted = mysql_num_rows($uniqueWines);

$lastlocation = "
	SELECT `drank`.`location`
	FROM `drank`
	WHERE `drank`.`user` = '$user[user]'
	ORDER BY `drank`.`time` DESC
	LIMIT 0, 1";
$lastlocation = mysql_query($lastlocation);
$latestlocation = array();
while($result = mysql_fetch_assoc($lastlocation)){
	$latestlocation[] = $result;
}


$myBadges = "
	SELECT DISTINCT * 
	FROM `hasbadge`
	WHERE `hasbadge`.`uid` = '$user[user]'
	";

$myBadges = mysql_query($myBadges);
$myBadgesCount = mysql_num_rows($myBadges);
$badges = array();
while($badge = mysql_fetch_assoc($myBadges)){
	$badges[$badge['title']] = $badge;
}

/*
 * Recommend wines to the user based on wines that other users have drank that
 * have locations or years in common with your drinking history 
 */
$recommendResults = "
	SELECT DISTINCT w.`id`, w.`pic`
	FROM `drank` AS d, `wines` AS w
	WHERE d.`wid`=w.`id` AND (
		(w.`country` IN 
				(SELECT DISTINCT `country`
					FROM `drank` AS d2, `wines` AS w2
					WHERE d2.`wid`=w2.`id` AND
					d2.`user`='$user[user]'))
			)"
;

$recommendResults = mysql_query($recommendResults);
$recommendations = array();
while($recom = mysql_fetch_assoc($recommendResults)){
	$recommendations[] = $recom;
}

//pretty($recommendations);
//pretty($winesProfileInfo);
//pretty($user);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WineSquare</title>
    <meta name="description" content="WineSquare Profile">
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

  <?php include 'topbar.php'; ?>

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
						<?php echo "<strong>Last drank at: </strong>".' '.$latestlocation[0]['location'];  ?>
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
								<p><b><?php echo $myBadgesCount; ?></b></p>
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
							<pre><p> <strong><span style="font-size: 26px;">History </span></strong> <a href="./checkinmap.php?uid=<?php echo $user['user'];?>">Visualize my history!</p><br></pre>
            <?php foreach($winesProfileInfo as $wineInfo): ?>
				<div class="row">
					<div class="two phone-one columns">
						<img src="<?php echo $wineInfo['pic']; ?>">
					</div>
					<div class="ten phone-three columns">
						<h6>
							<a href="./wine.php?wid=<?php echo $wineInfo['id']; ?>"><?php echo $wineInfo['name']; ?></a>
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
						<a href="./badges.php?uid=<?php echo $user['user']; ?>">See All</a>
						<h5><span>Badges</span></h5>
						<ul class="block-grid four-up">
							<?php foreach($badges as $b): ?>
								<li><div class="badge columns center_all">
									<a href="./badge.php?bid=<?php echo $b['title']?>&uid=<?php echo $user['user']?>"><img src=<?php
									
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
									
									?> /></a>
									</div>
								</li>
							<?php endforeach; ?>
							
							<?php
							$count = count($badges);
							
							while ($count < 10): ?>
							<li><div class="badge columns center_all">
								<a><img src="./images/default.png"/></a></div>
							</li>	
							<?php	
								$count = $count + 1;
							endwhile; ?>
						</ul>	
					</div>
				<!-- Recommendations	 -->
				<div id="userRecs">
					<h5><span>Recommendations</span></h5>
					<ul class="block-grid five-up">
					<?php $num = 1;
						foreach($recommendations as $r) : 
						if (!(url_exists($r['pic']))) {
							continue;
						}
						?>
						
						<li><div style="max-height:100px; min-height:100px" class="badge columns center_all">
							<a href="./wine.php?wid=<?php echo $r['id']?>"><img src=<?php
							echo $r['pic'];
							?>></img></a>
						</div>
					</li>
					
					<?php $num = $num + 1;
					if($num > 12) {
							break;
					}
					endforeach; ?>
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