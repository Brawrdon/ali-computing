<?php

	// Sets the connection variables
	$host = "localhost";
	$database_username = "root";
	$database_password = "LampServer1";
	$database_name = "ali_computing";
	
	// Runs query to connect to database
	$connection = mysqli_connect($host, $database_username, $database_password, $database_name);

	// Checks whether or not a connection has been established
	if (!$connection)
	{
		// If the connection fails, echo out an error
		echo "<h2><b><center>Connection to the database failed...</center></b></h2>";
		mysqli_close($connection);
	}
	else
	{
		// If the connection succeeds, select the appropriate database
		mysqli_select_db("ali-computing");
	}

?>
