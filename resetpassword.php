<?php
session_start();
//SEND HTML EMAIL
function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = safe_input($_POST["Email"]);
}
$to = "hollandjackson@hollandiacorp.com, '$email'";
$subject = "Password Reset";
$account = $_SESSION['account'];
$message = '
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>PasswordResetEmail</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body class="bg-dark">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-light" style="color: rgb(20,22,23);text-align: center;margin: 4vh;">Password Reset Request</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-light" style="text-align: center;">Hello you have sent a password change request for your account at Capture Now.</p>
                    <p class="text-light" style="text-align: center;">To change your password simply click the button below. If this was not you who made this request, please send us an email at: support@hollandiacorp.com and we will be happy to assist you.</p>
                </div>
            </div>
            <div class="row">
                <div class="col" style="margin: 3vh;"><a class="btn btn-success btn-block" role="button" name="resetpwd-submit" href="https://www.hollandiacorp.com/passwordreset.php?account='.$account.'">Reset Password</a></div>
            </div>
        </div>
    </div>
</body>

</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <CaptureNow@hollandiacorp.com>' . "\r\n";

mail($to,$subject,$message,$headers);
//END HTML EMAIL
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="assets/css/styles.min.css">
	<script src="https://kit.fontawesome.com/878929c0fc.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(33,37,41);">
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
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="indexphp"><i class="fa fa-sign-in"></i>&nbsp;Sign In</a></li>
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
                <h1 class="text-center text-light" style="margin-top: 4vh;">Email Sent</h1>
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin: 3vh;">
                <p class="text-light" style="text-align: center;">An email has been sent to your email with a link. Just click the link to reset your password. If it is not there check your spam folder.</p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>