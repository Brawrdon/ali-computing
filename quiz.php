<?php
	# Runs the connection script
	require_once("connect.php");
	
	function question($number){
	
		global $topic_id, $connection;
		$quiz_sql = "SELECT * FROM questions WHERE topic_id = $topic_id AND question_number = $number";
	
		echo $quiz_sql;
	
		# Runs the MySQL query
		$quiz_query = mysqli_query($connection, $quiz_sql);
	
		# Checks the results of the query
		if(mysqli_num_rows($quiz_query) > 0)
		{
			# Takes the record and outputs the required data
			$question_record = mysqli_fetch_assoc($quiz_query);
			$question_title = $question_record["question_title"];
			# Creates a question number cookie to be edited in the sumbit file
			$question_number = $question_record["question_number"];
			setcookie("question_number", $question_number);
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
			<input type =\"hidden\" name=\"correct\" value=\"$answer_4\">
			<input type=\"submit\" value=\"Submit\"></form>";
		}
		else
		{
			echo "<p>No records were found</p>";
		}
	}
	
	if(!isset($_COOKIE["topic_id"])){
		# Takes the submitted data
		$topic_id = $_POST["topic"];
	
		# Creates and sets the cookies 
		setcookie("topic_id", $topic_id);
	
		# Ensures the cookie is set
		$_COOKIE["topic_id"] = $topic_id;	
		echo "<p>First time on the script</p>";
		# Runs the question function with the value of 1 if it's the first time
		question(1);
	}
	else
	{
		echo "<p>isset worked</p>";
		# Runs the question function with updated number
		$topic_id = $_COOKIE["topic_id"];
		$question_number = $_COOKIE["question_number"];
		question($question_number);
	}




	

	# Outputs the data found in the saved cookies
	echo "<p> The topic ID from the cookie is: " . $_COOKIE["topic_id"] . "</p>";
	echo "<p> The user ID from the cookie is: " . $_COOKIE["login"] . "</p>";
	

?>

