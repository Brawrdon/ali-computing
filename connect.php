<?php
	# Sets the connection variables
	$host = "###";
	$database_username = "###";
	$database_password = "###";
	$database_name = "###";
    
    # Runs query to connect to database
    $connection = mysqli_connect($host, $database_username, $database_password, $database_name);
    
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
