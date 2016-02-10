<DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Topics - Ali Computing</title>
	</head>
	<body>
		<header>
			<h1>Ali Computing</h1>
		</header>
		<div class="page-wrapper">
		<?php
			# Runs the connection script
			require_once("connect.php");
	
			# Echos heading and inner content tag
			echo "<h2>Topics List</h2><div class=\"inner-content\">";
	
			$topic_sql = "SELECT * FROM topics";
	
			# Runs MySQL query
			$topic_query = mysqli_query($connection, $topic_sql);
	
			#Checks the result of the query
			if(mysqli_num_rows($topic_query) > 0)
			{
	
				# Gets each record, outputting them and setting an ID to the buttons
				while($topic_record = mysqli_fetch_assoc($topic_query))
				{
					$topic_id = $topic_record["topic_id"];
					echo "<div class=\"topic\"><p class=\"title\">" . $topic_record["topic_title"] .
					"<form action=\"quiz.php\" method=\"POST\">
					<input type=\"hidden\" name=\"topic\" value=\"$topic_id\">
					<input type=\"submit\" value=\"Start Quiz\"></form></p></div>";	
				}
			}
			# Ends inner content tag
			echo "</div>";

		?>
		</div>
	</body>
</html>
