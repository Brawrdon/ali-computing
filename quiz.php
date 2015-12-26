<?php
	# Runs the connection script
	require_once("connect.php");
	
	# Takes the submitted data
	$topic_id = $_POST["topic"];
	
	# Creates and sets the cookies 
	setcookie("topic_id", $topic_id);
	
	# Sets the ID to the data saved in the cookies
	$_COOKIE["topic_id"] = $topic_id;	
	
	# Outputs the data found in the saved cookies
	echo "<p> The topic ID from the cookie is: " . $_COOKIE["topic_id"] . "</p>";
	echo "<p> The user ID from the cookie is: " . $_COOKIE["login"] . "</p>";
	

	$quiz_sql = "SELECT * FROM questions WHERE topic_id = $topic_id ";
	
	echo $quiz_sql;
	
	# Runs the MySQL query
	$quiz_query = mysqli_query($connection, $quiz_sql);
	
	# Checks the results of the query
	if(mysqli_num_rows($quiz_query) > 0)
	{
		# Takes the record and outputs the required data
		$question_record = mysqli_fetch_assoc($quiz_query);
		$question_title = $question_record["question_title"];
		$answer_1 = $question_record["question_answer1"];
		$answer_2 = $question_record["question_answer2"];
		$answer_3 = $question_record["question_answer3"];
		$answer_4 = $question_record["question_correctanswer"];
		echo "<p><b>Question Tite: </b>" . $question_title . "<p>";
		echo "<form action=\"submit.php\" method=\"POST\"><input type=\"radio\" name=\"answers\" value=\"$answer_1\">$answer_1
		<br />
		<input type=\"radio\" name=\"answers\" value=\"$answer_2\">$answer_2
		<br />
		<input type=\"radio\" name=\"answers\" value=\"$answer_3\">$answer_3
		<br />
		<input type=\"radio\" name=\"answers\" value=\"$answer_4\">$answer_4
		<br />
		<input type=\"submit\" value=\"Submit\"></form>";
	}
	else
	{
		echo "<p>No records were found</p>";
	}
?>

