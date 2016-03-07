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
				// Runs the connection script
				require_once("connect.php");

				// Sets variables to the data entered in the HTML form
				$login_username = $_POST["username"];
				$login_password = $_POST["password"];

				// Set varaibles to MySQL query
				$username_sql = "SELECT * FROM students WHERE student_username LIKE '$login_username'";

				// Runs MySQL query and sets the result to variable
				$username_query = mysqli_query($connection,$username_sql);

				// Checks if the username is found in the database
				if(mysqli_num_rows($username_query) > 0)
				{
					// Runs if the username is found
					// Takes the results assigning them to an array with the field names as indexes
					$username_record = mysqli_fetch_assoc($username_query);

					// Places the data taken from the database to variables
					$user_id = $username_record["student_id"];
					$user_fname = $username_record["student_fname"];
					$user_lname = $username_record["student_lname"];
					$user_password = $username_record["student_password"];

					// Checks if password entered matches the one found in the database
					if($login_password == $user_password)
					{
						// Runs if the password matches the one found in the database
						// Sets the value of the login cookie to the corresponding user ID
						setcookie("login", $user_id);
						header("location: topics.php");
					}

					else
					{
						// Runs if the password don't match outputting
						// Shows a wrong password error message
						echo "<p>Sorry that was the wrong password</p>";
						echo "<form action=\"index.php\"><input type=\"submit\" value=\"Back\">
					</form>";
					}

				}
				else
				{
					// Runs if the username isn't found in the database
					// Shows a wrong username error message
					echo "<p>Username not found</p>";
					echo "<form action=\"index.php\"><input type=\"submit\" value=\"Back\">
					</form>";
				}
	
				// Closes the connection
				mysqli_close($connection);
			?>
		</div>
	</body>
</html>
