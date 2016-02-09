<?php
	# Runs the connection script
	require_once("connect.php");
	
	$topic_id = $_COOKIE["topic_id"];
	$student_id = $_COOKIE["login"];
	$score = $_COOKIE["score"];
	$question_amount = $_COOKIE["question_amount"];

	$insert_sql = "INSERT INTO events (event_id, student_id, topic_id, event_completed) VALUES (NULL, '$student_id', '$topic_id', CURRENT_TIMESTAMP)";
	
	mysqli_query($connection, $insert_sql);
	
	# Force deletes the cookie
	unset($_COOKIE["topic_id"]);
	unset($_COOKIE["question_number"]);
	unset($_COOKIE["score"]);
	unset($_COOKIE["question_amount"]);	
	setcookie("topic_id", '', time() - 3600);
	setcookie("question_number", '', time() - 3600);
	setcookie("score", '', time() - 3600);
	setcookie("question_amount", '', time() - 3600);
	
	echo "The test is now finished <br />";
	echo "Score: " . $score . "/" . $question_amount;
	
	echo "<form action=topics.php><input type=\"submit\" value=\"Finished\"></form>";

?>
