<?php

include 'connect.php';
include 'lib.php';

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
	<style type="text/css">
		small {display: none;}
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
	  <form name="update" action="" method="post" id="update" class="nice" enctype="multipart/form-data">

			<div class="row">
				<div class="twelve columns">
					<br /><br />
					<h2><?php echo $user['first_name'].' '.$user['last_name']; ?></h2>
					<p>Please change any information you would like to be updated.</p>
				<hr />
				</div> <!-- twelve cols -->
			</div> <!-- row -->

			<div class="row">
				<div class="six columns">
					<div id="alert" class="alert-box error" style="display:none; margin-bottom:6.5%;">
						alert!
						<a href="" class="close">&times;</a>
					</div>

						<div class="form-field" id="fname_wrapper">
							<label for="firstname">First Name*</label>
							<input type="text" class="small input-text" id="firstname" name="firstname" value="<?php echo $user['first_name']; ?>" />
							<small id="fname_small">Please enter a name</small>
						</div>
						<div class='form-field' id="lname_wrapper">
							<label for="lastname">Last Name*</label>
							<input type="text" class="small input-text" id="lastname" name="lastname" value="<?php echo $user['last_name']; ?>" />
							<small id="lname_small">Please enter a name</small>						
						</div>
						<div class='form-field' id="email_wrapper">
							<label for="email">Email Address*</label>
							<input type="text" class="input-text" id="email" name="email" value="<?php echo $user['user']; ?>" disabled />
							<small id="email_small">Please enter a valid email address</small>						
						</div>
						<div class='form-field' id="pword1_wrapper">
							<label for="password1">New Password*</label>
							<input type="password" class="input-text" id="password1" name="password" />
							<small id="pword1_small">Your passwords do not match</small>						
						</div>
						<div class='form-field' id="pword2_wrapper">
							<label>Confirm Password*</label>	
							<input type="password" class="input-text" id="password2"/>
							<small id="pword2_small">Your passwords do not match</small>						
						</div>

	               <input name="code" value="update_account" style="display:none" />

						<label for="maleradio">Gender*</label>
						<input checked type="radio" name="sex" value="male" 	id="maleradio"/> Male<br/>
						<input type="radio" name="sex" value="female" /> Female

				</div> <!-- columns -->
			</div> <!-- row -->
			<br/>
			<div class="row">
					<p id="bdayDropdown" style="margin-bottom:1%">Birthday*</p>
					<div class="columns" style="margin-left:0px;">
					<select id="monthDropdown" name="month">
						<option SELECTED>Month</option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>
					</div>	
					<div class="one columns" style="margin-left:1%">
					<select id="dayDropdown" name="day">
						<option SELECTED value="day0">Day</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					</div>
					<div class="one columns" style="margin-left:2.5%">
					<select id="yearDropdown" name="year">
						<option SELECTED value="year0">Year</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							<option value="1929">1929</option>
							<option value="1928">1928</option>
							<option value="1927">1927</option>
							<option value="1926">1926</option>
							<option value="1925">1925</option>
							<option value="1924">1924</option>
							<option value="1923">1923</option>
							<option value="1922">1922</option>
							<option value="1921">1921</option>
							<option value="1920">1920</option>
							<option value="1919">1919</option>
							<option value="1918">1918</option>
							<option value="1917">1917</option>
							<option value="1916">1916</option>
							<option value="1915">1915</option>
							<option value="1914">1914</option>
							<option value="1913">1913</option>
							<option value="1912">1912</option>
							<option value="1911">1911</option>
							<option value="1910">1910</option>
							<option value="1909">1909</option>
							<option value="1908">1908</option>
							<option value="1907">1907</option>
							<option value="1906">1906</option>
							<option value="1905">1905</option>
							<option value="1904">1904</option>
							<option value="1903">1903</option>
							<option value="1902">1902</option>
							<option value="1901">1901</option>
							<option value="1900">1900</option>
					</select> 
					</div>
					<div></div>
			</div> <!-- row -->
         <!-- container -->
         </form>
         <form name="image_upload" action="upload_file.php" method="post" id="image_upload" enctype="multipart/form-data">
            <div class="row">
               <div class="six columns">
                  <label for="photoUpload">Photo</label>
                  <div></div>
                  
                  <input id="photoUpload" type="file" name="photoUpload"/>


               </div> <!-- columns -->
            </div> <!-- row -->
         </form>

			<div class="row">
					<p><a id="updateProf" class='nice radius blue button' style="margin-right:20px;">Update Profile &raquo;</a>
					<a id="deleteProf" class='nice radius red button'>Delete Profile &raquo;</a></p>
			</div> <!-- row -->

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
   
   <?php
      while($row = mysql_fetch_assoc($badgeCheck)){
         $count = $row;
      }
      echo $count;
   ?>
   
   <script>
   	$("#logout").click(function() {
      	logout();
   	});
		$("#deleteProf").click(function() {
			deleteProfile("<?php echo $user['user']; ?>");
		});
      $("#updateProf").click(function() {
         updateProfile();
      });
   </script>

  </body>
</html>
