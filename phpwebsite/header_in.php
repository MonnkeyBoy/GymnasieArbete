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
						<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Logout</button>
						</form>
							<?php

		require 'includes/dbh.inc.php';

		$sql = 'SELECT * FROM users';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				$idUsers = $row['idUsers'];
				$sqlImg = "SELECT * FROM profileimg WHERE idUsers='$idUsers';";
				$resultImg = mysqli_query($conn, $sqlImg);
				while ($rowImg = mysqli_fetch_assoc($resultImg)) {
					echo "<div>";
						if ($rowImg['status'] == 0){
							echo "<img src='uploads/Bprofile".$idUsers.".jpg'>";
						}else{
							echo "<img src='uploads/profiledefualt.jpg'>";
						}
						echo $row['uidUsers'];
					echo "</div>";
				}
			}
		}else{
			echo "<h1>There are no users yet</h1>";
		}
	?>
	</nav>
</header>