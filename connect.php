<?php
	# Sets the connection variables
	$host = "localhost";
	$database_username = "root";
	$database_password = "WrongPassword";
    
    # Runs query to connect to database
    $connection = mysqli_connect($host, $database_username, $database_password);
    
    # Checks whether or not a connection has been established
    if(!$connection){
        echo "<h2><b><center>Connection to the database failed...</center></b></h2>";
	mysqli_close($connection);
    }
    else{
	mysqli_select_db("ali-computing");
        echo "<h2><b><center>Connection to the database worked!<center></b></h2>";
    }
?>
