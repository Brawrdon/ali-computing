<?php
	require_once("connect.php");
	
	echo "<h2><center><b>Topics List</b></center></h2>";
	
	$topic_sql = "SELECT * FROM topics";
	
	echo $topic_sql;
	
	$topic_query = mysqli_query($connection, $topic_sql);
	
	if(mysqli_num_rows($topic_query) > 0)
	{
		echo "<p>There is data here</p>";
		
		while($topic_record = mysqli_fetch_assoc($topic_query))
		{
			$topic_id = $topic_record["topic_id"];
			echo "<p>Title: " . $topic_record["topic_title"] .
			"<form action=\"quiz.php\" method=\"POST\">
			<input type=\"hidden\" name=\"topic\" value=\"$topic_id\">
			<input type=\"submit\" value=\"Start Quiz\"></form></p>";	
		}

	}
	else
	{
		echo "<p>There is no data here</p>";
	}		
?>
