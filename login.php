<DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Ali Computing</title>
	</head>
	<body>
		<header>
			<h1>Ali Computing</h1>
		</header>
		<div class="page-wrapper">

			<?php
				# Runs the connection script
				require_once("connect.php");
	
				# Sets variables to the data entered in the HTML form
				$login_username = $_POST["username"];
				$login_password = $_POST["password"];
	
				# Set varaibles to MySQL query
				$username_sql = "SELECT * FROM students WHERE student_username LIKE '$login_username'";
	
				# Echoes out MySQL query for validation

	
				# Runs MySQL query and sets the result to variable
				$username_query = mysqli_query($connection,$username_sql);
	
				# Checks if username is found in the database
				if(mysqli_num_rows($username_query) > 0)
				{
		
					$username_record = mysqli_fetch_assoc($username_query);
		
					# Data taken from database	
					$user_id = $username_record["student_id"];
					$user_fname = $username_record["student_fname"];
					$user_lname = $username_record["student_lname"];
					$user_password = $username_record["student_password"];
		
					# Checks if password entered matches the one found in the database
					if($login_password == $user_password)
					{			
						setcookie("login", $user_id);
						header("location: topics.php");
					}
			
					else 
					{
						echo "<p>Sorry that was the wrong password</p>";
						echo "<form action=\"index.php\"><input type=\"submit\" value=\"Back\"> 
					</form>";
					}
		
				}
				else
				{
					echo "<p>Username not found</p>";
					echo "<form action=\"index.php\"><input type=\"submit\" value=\"Back\"> 
					</form>";
				}
	
				# Free memeory from the result
				mysqli_free_result($username_query);
	
				# Closes the connection
				mysqli_close($connection);
			?>
		</div>
	</body>
</html>
