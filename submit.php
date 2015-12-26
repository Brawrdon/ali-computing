<?php
	# Runs the connection script
	require_once("connect.php");
	
	# Takes the submitted data
	$chosen_answer = $_POST["answers"];
	$correct_answer = $_POST["correct"];

	# Compares the chosen answer with the correct answer
	if($chosen_answer == $correct_answer)
	{
		echo "<p>You got the answer right!</p>";
	}	
	else
	{
		echo "<p>You got the answer wrong...</p>";
		echo "<p>The correct answer was " . $correct_answer . "</p>";
	}
	
	echo "<form action=quiz.php><input type=\"submit\" value=\"Next\"></form>";

?>
