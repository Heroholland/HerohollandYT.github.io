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
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
} else {
	header("Location: https://www.hollandiacorp.com/CaptureNow/index.php");
}
$id = $likevalue = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $likevalue = 1;
  $id = safe_input($_POST["id"]);
}
$account = $_SESSION['account'];
$query = "SELECT * FROM PostLikes WHERE PostID = ". intval($id) ." AND Liker = '$account'";
$result = $con->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
  }
} else {
$query = "SELECT Likes FROM Posts WHERE ID = '$id'";
$result = $con->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $newLikes = $likevalue + intval($row["Likes"]);
	 $sql = "UPDATE Posts SET Likes = '$newLikes' WHERE ID = '$id'";
 if (!mysqli_query($con, $sql)) {
   header("Location: error.php");
 } else {
	 $sql = "INSERT INTO PostLikes (PostID, Liker) VALUES ('$id', '$account')";
 if (!mysqli_query($con, $sql)) {
   header("Location: error.php");
 } else {
   echo 'Inserted';
 }
header("Location: https://www.hollandiacorp.com/mainpage.php");
 }  
  }
} else {
  echo "0 results";
}
}
function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>