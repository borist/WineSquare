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
     
/**
 * Logs the user in based on the credentials entered in the
 * login form. Requests a response from login_user.php
 */     
function login(){
   $.post("login_user.php", $("#loginform").serialize(), function(response){
      if(response != 0){
         window.location.replace('example_prof.html');
      }
      else {
         alert("Email or password are wrong.");
      }
   });
}
