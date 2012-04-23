/**
 ********************************
 * Winesquare Javascript Library
 *
 * Forms.js
 *
 * The control library for all functions associated
 * with the forms on the Winesquare website.
 *
 ********************************
 * Copyright � Winesquare Team 2012:
 * Nathan Fraenkel (nfraenkel18@gmail.com)
 * Jason Lucibello (jason.lucibello@gmail.com)
 * Boris Treskunov (sharkbor@gmail.com)
 * Stefan Zhelyazkov (stz@seas.upenn.edu)
 ********************************
 */
 


function validateAccount(){
   var valid = 1;
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
   $email = emailPattern.test($("#email").val());
   $password = $("#password1").val() == $("#password2").val();
   $password = $password && $("#password1").val() != "";
   $fname = $("#firstname").val() == "";
   $lname = $("#lastname").val() == "";
   $month = $("#monthDropdown").val() == "Month";
   $day = $("#dayDropdown").val() == "Day";
   $year = $("#yearDropdown").val() == "Year";

   if ($fname){
      $("#fname_small").css("display", "block");
      $("#fname_wrapper").addClass("error");
      valid = 0;
   }
   if ($lname){
      $("#lname_small").css("display", "block");
      $("#lname_wrapper").addClass("error");
      valid = 0;				
   }
   if (!$email){
      $("#email_small").css("display", "block");
      $("#email_wrapper").addClass("error");
      valid = 0;				
   }
   if (!$password){
      $("#pword1_small").css("display", "block");
      $("#pword2_small").css("display", "block");				
      $("#pword1_wrapper").addClass("error");				
      $("#pword2_wrapper").addClass("error");				
      valid = 0;				
   }
   if ($month || $day || $year){
      $("#bdayDropdown").css("color", "#C00000");
      valid = 0;
   }

   return valid;
} 
	
function clearAlerts(){
   $("#alert").css("display", "none");
   $("#fname_wrapper").removeClass("error");
   $("#lname_wrapper").removeClass("error");				
   $("#email_wrapper").removeClass("error");
   $("#pword1_wrapper").removeClass("error");			
   $("#pword2_wrapper").removeClass("error");
   $("#fname_small").css("display", "none");
   $("#lname_small").css("display", "none");
   $("#email_small").css("display", "none");
   $("#pword1_small").css("display", "none");
   $("#pword2_small").css("display", "none");	
   $("#bdayDropdown").css("color", "#555555");																			
}
		
function postPicture(){
	
}

/**
 * When a user presses the check-in button, this function
 * serializes the form of the submission and sends it
 * asyncronously to the checkin page. Then the response is
 * fed back and displayed appropriately on the same page.
 */
function checkin(){
	$.post("checkin.php", $("#checkin").serialize(), function(response){
      alert(response);
      window.location.replace("index.php");
      //$("#checkin_message").text(response);
	});
}
		
/**
 * Tries to let a user signup for an account, after validation.
 */

function signup(){
	clearAlerts();
  	switch (validateAccount()) {
  	case 0: 
			$("#alert").text("Please fix the errors below.");
			$("#alert").css("display", "block"); 
		break;
	case 1: 
			postPicture();
			$.post("users.php", $("#signup").serialize(), function(data){
          if(data){
             alert("Welcome to Winesquare!"); //redirect to success page
             window.location.replace("index.php");
			 }
          else {
             $("#alert").text("There was an error with the database. Please try again.");
				 $("#alert").css("display", "block"); 
          }
       });
		
		break;
  	default: break;
  }
}

/**
 * Updates the account information for the given user
 */

function updateProfile(){
	clearAlerts();
  	switch (validateAccount()) {
  	case 0: 
			$("#alert").text("Please fix the errors below.");
			$("#alert").css("display", "block"); 
		break;
	case 1: 
			postPicture();
			$.post("users.php", $("#update").serialize(), function(data){
          if(data){
             alert("Your information was updated!"); //redirect to success page
             window.location.replace("index.php");
			 }
          else {
             $("#alert").text("There was an error with the database. Please try again.");
				 $("#alert").css("display", "block"); 
          }
       });
		
		break;
  	default: break;
  }
}
     
/**
 * Logs the user in based on the credentials entered in the
 * login form. Requests a response from login_user.php
 */     
function login(){
   $.post("users.php", $("#loginform").serialize(), function(response){
      if(response != 0){
         window.location.replace('index.php');
      }
      else {
         alert("Email or password are wrong.");
		$("#alert").text("Email or password are wrong.");
		$("#alert").css("display", "block");
      }
   });
}

/**
 * Logs the user out. Calls a corresponding function
 * from the php core to destroy the user sessions.
 */
function logout(){
   $.post("users.php", { code:"logout" }, function(response){
      if(response != 0){
         window.location.replace('login.html');
      }
      else {
         alert("You couldn't be logged out.");
      }
   });
}

/**
 * Deletes a profile. Asks the user for confirmation before that
 */
function deleteProfile(pid) {
	if (confirm("Are you sure you'd like to delete your profile?")) {
		//delete profile
      $.post("users.php", { code:"delete_account", prof:pid }, function(response){
         if(response != 0){
            alert("Your account and all associated data have been deleted!");
            window.location.replace('login.html');
         }
         else {
            alert("Your profile could not be deleted from Winesquare!");
         }
      });
	}
	else {
		//just go back to update page
	}
}