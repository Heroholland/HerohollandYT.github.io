<?php
session_start();
if (isset($_SESSION['account']) && !empty($_SESSION['account'])) {
	header("Location: https://www.hollandiacorp.com/CaptureNow/mainpage.php");
}
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!con)
 {
   header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = safe_input($_POST["Username"]);
  $password = safe_input($_POST["Password"]);
}
$query = "SELECT Password FROM Accounts WHERE Username = '$username'";
$result = $con->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  if ($result->num_rows == 1) {
		  session_regenerate_id();
		   $_SESSION["account"] = $_POST["Username"];
		  header("Location: https://www.hollandiacorp.com/CaptureNow/mainpage.php");
	  } else {
	  }
  }
}
function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>