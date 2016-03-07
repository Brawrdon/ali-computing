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
				// Runs the connection script
				require_once("connect.php");
				
				// Creates a function called question
				function question($number){
				
					// Declares which variables are global variables so that the function can
					// use variables declared outside of the function
					global $topic_id, $connection;
					
					// Creates two SQL queries for the quizes
					// Finds the record that matches the topic ID and the question number the user is on
					$quiz_sql = "SELECT * FROM questions WHERE topic_id = $topic_id 
								AND question_number = $number";
					
					// Runs the find the total number of records there are for the chosen quiz
					$number_of_rows_sql = "SELECT * FROM questions WHERE topic_id = $topic_id";
	
					// Runs the SQL queries
					$quiz_query = mysqli_query($connection, $quiz_sql);
					$number_of_rows_query = mysqli_query($connection, $number_of_rows_sql);
					
					// Sets the amount of questions there are
					$question_amount = mysqli_num_rows($number_of_rows_query);
		
					// Checks to see if question amount cookie has been set
					if(!isset($_COOKIE["question_amount"])){
						// Creates and sets the cookies if it isn't set already
						setcookie("question_amount", $question_amount);
					}
		
					// Checks to see if the user has ran out of questions
					if ($number <= $question_amount) {
	
						// If they haven't it'll find the next record
						if(mysqli_num_rows($quiz_query) > 0)
						{
							// Takes the record and outputs the required data
							$question_record = mysqli_fetch_assoc($quiz_query);
							$question_title = $question_record["question_title"];
							
							// Creates a question number cookie to be edited in the sumbit module
							$question_number = $question_record["question_number"];
							setcookie("question_number", $question_number);
							
							// Sets the answers to local variables
							$answer_1 = $question_record["question_answer1"];
							$answer_2 = $question_record["question_answer2"];
							$answer_3 = $question_record["question_answer3"];
							$answer_4 = $question_record["question_correctanswer"];
							
							// Places the four possible answers into an array and shuffles them
							$answer_order = array($answer_1,$answer_2,$answer_3,$answer_4);
							shuffle($answer_order);
							
							// Echos out the HTML required to dipsplay the form on the page
							echo "<h2>" . $question_title . "</h2>";
							echo "<form action=\"submit.php\" method=\"POST\">";
							
							// Loops for times popping out the last item in the array until it's empty
							for($x = 1; $x <= 4; $x++){
							
							// Creates and displays radio buttons attached to the appropriate value
							$question_output = array_pop($answer_order);
							echo "<div class=\"answer\"><input type=\"radio\" name=\"answers\" value=\"$question_output\">$question_output
							<br /></div>";
							}
							echo "<input type =\"hidden\" name=\"correct\" value=\"$answer_4\">
							<input type=\"submit\" value=\"Submit\"></form>";
						}
					}
					
					// If they have run out of questions then load the complete page
					else {		
						header("location: complete.php");
					}
				}
				
				
				// Checks to see if it's the first time the user is on the script
				if(!isset($_COOKIE["topic_id"])){
					// Takes the submitted data
					$topic_id = $_POST["topic"];
	
					// Creates and sets the cookies 
					setcookie("topic_id", $topic_id);
					setcookie("score", 0);
	
					// Ensures the cookie is set
					$_COOKIE["topic_id"] = $topic_id;	

					// Runs the question function with the value of 1 if it's the first time
					question(1);
				}
				else
				{

					// Runs the question function with updated number
					$topic_id = $_COOKIE["topic_id"];
					$question_number = $_COOKIE["question_number"];
					question($question_number);
				}
				
				// Closes the connection
				mysqli_close($connection);	
			?>
		</div>
	</body>
</html>
