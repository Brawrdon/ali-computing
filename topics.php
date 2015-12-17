<?php
	require_once("connect.php");
	
	echo "<h2><center><b>Topics List</b></center></h2>";
	
	$topics_sql = "SELECT * FROM topics";
	
	echo $topics_sql;
	
	$topics_query = mysqli_query($connection, $topics_sql);
	
	if(mysqli_num_rows($topics_query) > 0)
	{
		echo "<p>There is data here</p>";

	}
	else
	{
		echo "<p>There is no data here</p>";
	}		
?>
