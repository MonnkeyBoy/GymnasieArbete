<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	
<header>
	<nav id="all">
		<form action="includes/login.inc.php" method="post"> 
				<input type="text" name="mailuid" placeholder="Username/Email..."> 
				<input type="password" name="pwd" placeholder="password"> 
				<button type="submit" name="login-submit">Login</button>     
				</form>
	
			<a href="signup.php">Signup</a>
	</nav>
</header>