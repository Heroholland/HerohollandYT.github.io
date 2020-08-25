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
    <link rel="manifest" href="https://www.hollandiacorp.com/manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css
	<script src="https://kit.fontawesome.com/878929c0fc.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div class="modal fade" role="dialog" tabindex="-1" id="settingsModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">My Settings</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>Here you can manage your settings and preferences!</p>
                    <div class="row">
                        <div class="col"><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" style="margin-bottom: 3vh;">Reset Password</button>
                            <div id="collapse1">
                                <p>Enter your email below to reset your password.</p>
                                <!-- Start: ResetPassword -->
                                <form method="post" action="resetpassword.php">
									<input class="form-control" type="email" placeholder="Email" style="margin-bottom: 2.5vh;" name="Email" required="">
									<button class="btn btn-primary" type="submit">Send Reset Request</button>
								</form>
                                <!-- End: ResetPassword -->
                            </div>
                        </div>
                    </div>
                    <!-- Start: SettingsForm -->
                    <form>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                    </form>
                    <!-- End: SettingsForm -->
                </div>
            </div>
        </div>
    </div>
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
            <div class="col">
                <h2 class="display-3" style="color: rgb(255,255,255);text-align: center;margin: 3vh;">My Account</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-center text-justify text-light" style="margin-top: 2vh;">Welcome to your account! Here you can manage your account and change your password.</p>
            </div>
        </div>';
 $con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!con)
 {
     header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
$account = $_SESSION['account'];
$query = "SELECT Icon FROM Accounts WHERE Username = '$account'";
$result = $con->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $icon = $row['Icon'];
	  echo '<div class="text-center" style="margin: 2.5vh;"><img class="rounded-circle img-fluid" src="'.$icon.'" style="width: 150px;height: 150px;" /></div>';
  }
}
echo '
    <div class="row">
            <div class="col text-center"><button class="btn btn-outline-primary btn-block" type="button" style="margin-top: 3vh;" data-toggle="modal" data-target="#settingsModal">Settings</button></div>
        </div>
		<div class="m-3"></div>
		<div class="row">
			<div class="col text-center">
				<form action="uploadicon.php" method="post" enctype="multipart/form-data">
					<input class="text-light" type="file" name="File" class="form-control">
					<div class="m-3"></div>
					<button type="submit" name="submit" class="btn btn-success btn-block"> Set Icon </button>
				</form>
			</div>
		</div>
</div>
';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>';
?>
  