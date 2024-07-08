<html>
	<body>
		<?php
		//echo "hi";
			$conn = mysqli_connect("localhost", "root", "", "BUS");
				if(!$conn){ 									//conn is an object where connect_error is a property of it
		 			die("Connection failed: Please try again");		//to terminate script execution
				}
				//checking credentials with those in Accounts table
				$email = mysqli_real_escape_string($conn, $_POST['email']); 
				$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
				$emailCheck = "Select email from Accounts where email= '$email';" ;
				$pwdCheck = "Select pwd from Accounts where pwd= '$pwd' and email= '$email';" ;
				$emailResult = mysqli_query($conn, $emailCheck);
				$pwdResult = mysqli_query($conn, $pwdCheck);
				
		//check if there is an account 
				if($emailResult && mysqli_num_rows($emailResult) ==0){
					echo "There is no account with this email , signup to create an account." ;
				}
				else if($pwdResult && mysqli_num_rows($pwdResult) ==0){
					echo "Incorrect password" ;
				}
				
				else if(mysqli_num_rows($emailResult) ==1 && mysqli_num_rows($pwdResult) ==1){
						// Redirect to the desired webpage
					header("Location: http://192.168.33.126/BUS%20FRONT_PAGE.html");
					exit; // Make sure to terminate the script after redirection
					
    					/*
					Hi <?php echo $_POST["name"]; ?><br>
			
					Hope you have a nice day!<br>
					You have successfully logged in.
					*/
				}
			mysqli_close($conn);
		?>	
		<button type="button" onclick= "window.location.href ='http://192.168.33.126/signup.html' ">Sign up</button>
			
	</body>
</html>
