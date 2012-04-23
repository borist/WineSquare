  	
<?php

   /**
    * All wines are inserted into a dynamic array that is
    * then served to the autocomplete to populate in the
    * drop-down menu.
    */
   $allWinesQuery = "
      SELECT `name`, `id`
      FROM `wines`";
   $allWines = mysql_query($allWinesQuery);
   $winesArray = array();
   while($row = mysql_fetch_array($allWines)){
      $wineEntry = "{ 
         label: \"".addslashes($row['name']). "\",
         wid: \"".$row['id']."\"
      }";
      array_push($winesArray, $wineEntry);
   }

   $wines = implode(", ", $winesArray);

?>
   <link rel="stylesheet" href="./styles/jquery.ui.autocomplete.css">
   <script src="./javascripts/location.js"></script>
	<script src="./javascripts/forms.js"></script>
	<script src="./javascripts/jquery.min.js"></script>
   
   <!-- jQuery UI Core -->
   <script src="./javascripts/jquery.ui.core.js"></script>
   <script src="./javascripts/jquery.ui.widget.js"></script>
   <script src="./javascripts/jquery.ui.position.js"></script>
   <script src="./javascripts/jquery.ui.autocomplete.js"></script>
   <!-- end jQuery UI Core -->
   
   <script>
   $("#logout").click(function() {
      logout();
   });
   </script>
  
  <div id="topbar">
	    <div class="row">
	      <div class="four columns">
	        <h1><a href="./">WineSquare</a></h1>
	      </div>
	      <div class="eight columns hide-on-phones">
	      	<strong class="right">
               <form id="search_form" style="float:left; margin-top:-3px;">
					<input class="search_bar" placeholder="Search..." type="search" id="search" />
               <input type="text" name="swid" id="swid" style="display:none; text-align:center" />
               <input type="submit" style="display:none;" />
               </form>
	      		<a href="profile.php">Profile</a>
	      		<a href="#" id="logout">Logout</a>	
	      	</strong>
	      </div>
		</div>
	</div>
   
   <script>
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
         
         $("#search").autocomplete({
            source: wines,
            focus: function(event, ui) {
               $("#search").val(ui.item.label);
               return false;
            },
            select: function(event, ui) {
               $("#search").val(ui.item.label);
               $("#swid").val(ui.item.wid);
               
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
      
   $("#search_form").submit(function(event){
      // prevent the form from submitting itself
      event.preventDefault();
      $wid = "wine.php?wid=" + $("#swid").val();
      window.location.replace($wid);
   });
      
   $("#logout").click(function() {
      logout();
   });
      
   </script>