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
			// Checks if the login cookie is set so that the appriopriate page can be displayed
			if(!isset($_COOKIE["login"]))
			{
				// If the login cookie isn't set, echo out the HTML login form
				echo "<div class=\"login-form\">
				<form action=\"login.php\" method=\"POST\">
				Username: <input type=\"text\" name=\"username\" class=\"username\">
				<br />
				Password: <input type=\"password\" name=\"password\">
				<br>
				<input type=\"submit\" value=\"Login\">
				</form></div>";
			}
			else
			{
				// If the login cookie is set, the topics page will be loaded instead
				header("location: topics.php");
			}

			// Closes the connection
			mysqli_close($connection);
		?>
	</div>
	</body>
</html>
