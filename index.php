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
			if(!isset($_COOKIE["login"])){
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
			header("location: topics.php");
	}	
	?>
	</div>
	</body>
</html>
