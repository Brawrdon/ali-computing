<DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Quiz - Ali Computing</title>
	</head>
	<body>
		<header>
			<h1>Ali Computing</h1>
		</header>
		<div class="page-wrapper">

			<?php
				# Runs the connection script
				require_once("connect.php");
	
				function question($number){
	
					global $topic_id, $connection;
					$quiz_sql = "SELECT * FROM questions WHERE topic_id = $topic_id AND question_number = $number";
					$number_of_rows_sql = "SELECT * FROM questions WHERE topic_id = $topic_id";
	

	
					# Runs the MySQL query
					$quiz_query = mysqli_query($connection, $quiz_sql);
					$number_of_rows_query = mysqli_query($connection, $number_of_rows_sql);
					$question_amount = mysqli_num_rows($number_of_rows_query);
		
						# Checks to see if question amount cookie has been set
						if(!isset($_COOKIE["question_amount"])){
							# Creates and sets the cookies 
							setcookie("question_amount", $question_amount);
						}
		

		
					if ($number <= $question_amount) {
	
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
							$answer_order = array($answer_1,$answer_2,$answer_3,$answer_4);
							shuffle($answer_order);
							echo "<h2>" . $question_title . "</h2>";
			
							echo "<form action=\"submit.php\" method=\"POST\">";
			
							for($x = 1; $x <= 4; $x++){
			
							$question_output = array_pop($answer_order);
							echo "<div class=\"answer\"><input type=\"radio\" name=\"answers\" value=\"$question_output\">$question_output
							<br /></div>";
							}
							echo "<input type =\"hidden\" name=\"correct\" value=\"$answer_4\">
							<input type=\"submit\" value=\"Submit\"></form>";
						}
					}
		
					else {		
						header("location: complete.php");
					}
				}
	
				if(!isset($_COOKIE["topic_id"])){
					# Takes the submitted data
					$topic_id = $_POST["topic"];
	
					# Creates and sets the cookies 
					setcookie("topic_id", $topic_id);
					setcookie("score", 0);
	
					# Ensures the cookie is set
					$_COOKIE["topic_id"] = $topic_id;	

					# Runs the question function with the value of 1 if it's the first time
					question(1);
				}
				else
				{

					# Runs the question function with updated number
					$topic_id = $_COOKIE["topic_id"];
					$question_number = $_COOKIE["question_number"];
					question($question_number);
				}	
	
			?>
		</div>
	</body>
</html>

