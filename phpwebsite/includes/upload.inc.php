<?php
session_start();
include_once 'dbh.inc.php';
$userid = $_SESSION['userId'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpname = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($filesize < 1000000) {
				$fileNameNew = "profile".$userid.".".$fileActualExt;
				$fileDestination = 'D:\XAMP\htdocs\phpwebsite\uploads\B'.$fileNameNew;
				move_uploaded_file($fileTmpname, $fileDestination);
				$sql = "UPDATE profileimg SET status=0 WHERE idUsers='$userid';";
				$result = mysqli_query($conn, $sql);
				header("Location: ../index.php?upload=succes");
			}else{
				echo "The image you're trying to upload is too big";
			}
		}else{
			echo "there was an error uploading your file!";
		}

	}else{
		echo "You cannot upload files of this type!";
	}
}