function validateAccount(){
		  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
		  $email = emailPattern.test($("#email").val());
		  $password = $("#password1").val() == $("#password2").val();
		  $password = $password && $("#password1").val() != "";
		  $fname = $("#firstname").val() == "";
		  $lname = $("#lastname").val() == "";
		
		  if ($fname && $lname)
				return 1;
		  else if ($fname)
				return 2;
		  else if ($lname)
				return 3;
		  if (!$email && !$password)
				return 4;
			else if (!$email)
				return 5;
			else if (!$password)
				return 6;
			else return 0;
		} 
	
		function clearAlerts(){
				$("#alert").css("display", "none");
				$("#fname_wrapper").removeClass("error");
				$("#lname_wrapper").removeClass("error");				
				$("#email").removeClass("error");
				$("#password1").removeClass("error");			
				$("#password2").removeClass("error");
		}
	
		function showAlert(input) {	
			switch (input) {
				case 0:
					return;
				break;
				case 1:
					$("#alert").text("Please fill in the blank fields");
					$("#fname_wrapper").addClass("error");
					$("#lname_wrapper").addClass("error");					
				break;
				case 2:
					$("#alert").text("Please fill in the blank fields");
					$("#fname_wrapper").addClass("error");					
				break;
				case 3:
					$("#alert").text("Please fill in the blank fields");
					$("#lname_wrapper").addClass("error");					
				break;								
				case 4: 
					$("#alert").text("You haven't provided a valid email address and your passwords do not match.");
					$("#email_wrapper").addClass("error");
					$("#pword1_wrapper").addClass("error");
					$("#pword2_wrapper").addClass("error");
					break;
				case 5: 
					$("#alert").text("Your haven't provided a valid email address.");
					$("#email_wrapper").addClass("error");
					break;
				case 6:
					$("#alert").text("Your passwords don't match.");
					$("#pword1_wrapper").addClass("error");
					$("#pword2_wrapper").addClass("error");
					break;
				case 7:
					$("#alert").text("There was an error with the database. Please try again.");
					break;
				default: break;	
				}
				$("#alert").css("display", "block");
		}