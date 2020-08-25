<?php
session_start();
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!$con)
 {
   header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$password = $confirmpw = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = safe_input($_GET["Password"]);
	$confirmpw = safe_input($_GET["ConfirmPW"]);
}
if (isset($_SESSION['account']) && !empty($_SESSION['account'])) {
	header("Location: https://www.hollandiacorp.com/CaptureNow/mainpage.php");
}
if ($password === $confirmpw) {
	$sql = "UPDATE Accounts SET Password = '$password' WHERE Username = '$account'";
	   if (!mysqli_query($con, $sql)) {
  header("Location: error.php");
 } else {
   header("Location: success.php");
 }
}

?>