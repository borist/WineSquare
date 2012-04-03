function validateAccount(){
		  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
		  $email = emailPattern.test($("#email").val());
		  $password = $("#password1").val() == $("#password2").val();
		  $password = $password && $("#password1").val() != "";
	
		  if (!$email && !$password)
				return 1;
			else if (!$email)
				return 2;
			else if (!$password)
				return 3;
			else return 0;
		} 
	
		function clearAlerts(){
				$("#alert").css("display", "none");
				$("#email").removeClass("red");
				$("#password1").removeClass("red");			
				$("#password2").removeClass("red");
		}
	
		function showAlert(input) {	
			switch (input) {
				case 0:
					return;
				break;
				case 1: 
					$("#alert").text("You haven't provided a valid email address and your passwords do not match.");
					$("#email_wrapper").addClass("error");
					$("#pword1_wrapper").addClass("error");
					$("#pword2_wrapper").addClass("error");
					break;
				case 2: 
					$("#alert").text("Your haven't provided a valid email address.");
					$("#email_wrapper").addClass("error");
					break;
				case 3:
					$("#alert").text("Your passwords don't match.");
					$("#pword1_wrapper").addClass("error");
					$("#pword2_wrapper").addClass("error");
					break;
				case 4:
					$("#alert").text("There was an error with the database. Please try again.");
					break;
				default: break;	
				}
				$("#alert").css("display", "block");
		}