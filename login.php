<?php
	# Runs the connection script
	require("connect.php");
	
	# Sets variables to the data entered in the HTML form
	$login_username = $_POST["username"];
	$login_password = $_POST["password"];
	
	# Set varaibles to MySQL query
	$username_sql = "SELECT * FROM `students` WHERE `student_username` LIKE '$login_username'";
	
	# Echoes out MySQL query for validation
	echo $username_sql;
	
	# Runs MySQL query and sets the result to variable
	$username_query = mysqli_query($connection,$username_sql);
	
	# Checks if username is found in the database
	if(mysqli_num_rows($username_query) > 0)
	{
		echo "<p>Username found</p>";
	}
	else
	{
		echo "<p>Username not found</p>";
	}
	
	# Echoes out the data		
	echo "<p><b>Username:</b> $login_username<br>";
	echo "<p><b>Password:</b> $login_password";
	
	# Closes the connection
	mysqli_close($connection);
?>
