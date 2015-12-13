<?php
	# Runs the connection script
	require("connect.php");
	
	# Sets variables to the data entered in the HTML form
	$login_username = $_POST["username"];
	$login_password = $_POST["password"];
	
	# Echoes out the data		
	echo "<p><b>Username:</b> $login_username<br>";
	echo "<p><b>Password:</b> $login_password";
	
	# Closes the connection
	mysqli_close($connection);
?>
