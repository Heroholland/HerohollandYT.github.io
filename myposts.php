<?php
session_start();
echo '<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CaptureNow</title>
    <meta name="description" content="The social media of the future. Upload photos and have fun!">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-dark">
    <!-- Start: Dark NavBar -->
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button" style="height:80px;background-color:#37434d;color:#ffffff;">
            <div class="container-fluid"><a class="navbar-brand" href="#"><i class="fa fa-camera"></i>&nbsp;CaptureNow</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse better-bootstrap-nav-left" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;margin-right: 25vh;" href="create.php"><i class="fa fa-plus"></i>&nbsp;Create</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="mainpage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="account.php"><i class="fa fa-user-circle-o"></i>&nbsp;Account</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="index.php"><i class="fa fa-sign-in"></i>&nbsp;Sign In</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="register.php"><i class="fa fa-pencil"></i>&nbsp;Register</a></li>
						<li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="https://www.hollandiacorp.com/CaptureNow/myposts.php"><i class="fas fa-scroll"></i>&nbsp;My Posts</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <!-- End: Dark NavBar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-light" style="text-align: center;margin: 4vh;">My Posts</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-light" style="margin: 2vh;text-align: center;">Here you can view all of the posts that you have created!</p>
                <div style="margin: 6vh;"></div>
            </div>
        </div>
';
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!$con)
 {
  header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
$account = $_SESSION['account'];
$query = "SELECT * FROM Posts WHERE Poster = '$account'";
$result = $con->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  echo '<div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="background-color: rgb(52,58,64);">
                    <div class="card-body">
                        <h1 class="text-light">'.$row["Title"].'</h1>
                        <div style="text-align: center;"><img class="rounded img-fluid" src="'.$row["Image"].'" width="400"></div>
                        <p
                            class="text-light" style="text-align: center;">'.$row["Caption"].'</p>
                            <div class="row">
                                <div class="col-auto" style="width: 20px;">
                                    <p><i class="fa fa-heart-o" id="like'.$row["ID"].'" style="color: rgb(241,19,5);"></i>
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                </div>
                                <div class="col-auto">
                                    <p class="text-light">'.$row["Likes"].'  -'.$row["Poster"].'</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="m-3"> </div>
	';
  }
	echo '</div>
    <!-- End: Dark NavBar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>';
} else {
  echo "<p class='text-center text-light m-3'> No Posts Found </p>";
}
?>