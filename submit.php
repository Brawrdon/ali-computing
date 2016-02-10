<DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Ali Computing</title>
	</head>
	<body>
		<header>
			<h1>Ali Computing</h1>
		</header>
		<div class="page-wrapper">
			<?php
				# Runs the connection script
				require_once("connect.php");
	
				# Takes the submitted data
				$chosen_answer = $_POST["answers"];
				$correct_answer = $_POST["correct"];
	
				$score = $_COOKIE["score"];
		
				# Increments the value in the question number cookie
				$question_number = $_COOKIE["question_number"];
				$question_number = $question_number + 1;
				setcookie("question_number", $question_number);
	
				# Compares the chosen answer with the correct answer
				if($chosen_answer == $correct_answer)
				{
					echo "<p>You got the answer right!</p>";
					# Increments the score
					$score = $score + 1;
					setcookie("score", $score);
				}	
				else
				{
					echo "<p>You got the answer wrong...</p>";
					echo "<p>The correct answer was: <span class=\"correct-answer\">" . $correct_answer . "</span></p>";
				}
	
				echo "<form action=quiz.php><input type=\"submit\" value=\"Next\"></form>";

			?>
		</div>
	</body>
</html>
