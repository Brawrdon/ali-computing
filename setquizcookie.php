<?php
	$topic_id = $_POST["topic"];
	setcookie("topic_id", $topic_id);
	header("location: quiz.php");
?>
