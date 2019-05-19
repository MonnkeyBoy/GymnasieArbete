<?php
	require "header_in.php";
	if (!isset($_SESSION['userId'])) {
		header("Location: ../phpwebsite/signup.php?error=notloggedin");
		exit();
		}
	
?>
	

<main>
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
	
<form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<button type="submit" name="submit">UPLOAD</button>
</form>
</main>

<?php
	require "footer.php";
?>