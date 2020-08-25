<?php
session_start();
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!con)
 {
   header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
 header("Location: error.php");
 }
$file = "/home2/heroholland/public_html/CaptureNow/assets/user/" . $_SESSION['account'];
if(is_dir($file) == false) {
  mkdir($file, 0755);
}
if (isset($_POST['submit'])) {
	$file = $_FILES['File'];
	
	$fileName = $_FILES['File']['name'];
	$fileTmpName = $_FILES['File']['tmp_name'];
	$fileSize = $_FILES['File']['size'];
	$fileError = $_FILES['File']['error'];
	$fileType = $_FILES['File']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed  = array('jpg', 'jpeg', 'png');
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".". $fileActualExt;
				$fileDestination = 'assets/user/' . $account . "/". $fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				echo '<div class="container"> <div class="row"> <div class="col text-center"> <p class="text-center text-light m-3" style="color:green;"> Your image was uploaded successfully!	 </p> </div> </div> </div>';
				  $filepath = "https://www.hollandiacorp.com/CaptureNow/" . $fileDestination;
				$account = $_SESSION['account'];
 $sql = "UPDATE Accounts SET Icon = '$filepath' WHERE Username = '$account'";
	   if (!mysqli_query($con, $sql)) {
  echo '<div class="container"> <div class="row"> <div class="col text-center text-light"> <p class="text-center text-light m-3"> Value not inserted into the database. </p> </div> </div> </div>';
 } else {
   header("Location: success.php");
 }
			} else {
				echo '<div class="container"> <div class="row"> <div class="col text-center text-light m-3"> <p class="text-center text-light"> Your file is too large to upload!</p> </div> </div> </div>';
			}
		} else {
			header("Location: error.php");
		}
	} else {
		echo '<div class="container"> <div class="row"> <div class="col text-center text-light m-3"> <p class="text-center text-light"> This type of file : '.$fileActualExt.' can not be uploaded!</p> </div> </div> </div>';
	}
}
?>