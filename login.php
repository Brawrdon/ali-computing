<?php
	# Runs the connection script
	require_once("connect.php");
	
	# Sets variables to the data entered in the HTML form
	$login_username = $_POST["username"];
	$login_password = $_POST["password"];
	
	# Set varaibles to MySQL query
	$username_sql = "SELECT * FROM students WHERE student_username LIKE '$login_username'";
	
	# Echoes out MySQL query for validation
	echo $username_sql;
	
	# Runs MySQL query and sets the result to variable
	$username_query = mysqli_query($connection,$username_sql);
	
	# Checks if username is found in the database
	if(mysqli_num_rows($username_query) > 0)
	{
		echo "<p>Username found</p>";
		
		$username_record = mysqli_fetch_array($username_query, MYSQLI_NUM);
		
		# Data taken from database	
		echo "<h3>Data taken from database</h3>";
		$user_id = $username_record[0];
		$user_fname = $username_record[1];
		$user_lname = $username_record[2];
		$user_password = $username_record[4];
		
		# Checks if password entered matches the one found in the database
		if($login_password == $user_password)
		{			
			header("location: topics.php");
		}
		
		else 
		{
			echo "<p>Sorry that was the wrong password</p>";
		}
		
	}
	else
	{
		echo "<p>Username not found</p>";
	}
	
	# Echoes out the data	
	echo "<h3><b>Data inputed</b></h3>";
	echo "<p><b>Username:</b> $login_username<br>";
	echo "<p><b>Password:</b> $login_password";
	
	# Free memeory from the result
	mysqli_free_result($username_query);
	
	# Closes the connection
	mysqli_close($connection);
?>
