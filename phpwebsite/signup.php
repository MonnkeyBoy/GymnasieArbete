<?php
	require "header_out.php";
?>

<main>
	<div id="content">
	<h1>Sign Up!</h1>
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username"></input>
		<input type="text" name="mail" placeholder="E-mail"></input>
		<input type="password" name="pwd" placeholder="Password"></input>
		<input type="password" name="pwd-repeat" placeholder="Repeat Password"></input>
		<button type="submit" name="signup-submit">Signup</button>
	</form>
	</div>
</main>

<?php
	require "footer.php";
?>