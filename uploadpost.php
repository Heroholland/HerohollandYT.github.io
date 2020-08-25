<?php
session_start();
function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$file = "/home2/heroholland/public_html/CaptureNow/assets/user/" . $_SESSION['account'];
if(is_dir($file) == false) {
  mkdir($file, 0755);
}
$title = $caption = "";
  $title = safe_input($_POST["Title"]);
  $caption = safe_input($_POST["Caption"]);
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!$con)
 {
   header("Location: error.php");
 }
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
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
    <link rel="stylesheet" href="assets/css/styles.min.css">
	<script src="https://kit.fontawesome.com/878929c0fc.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <!-- Start: Dark NavBar -->
       <div>
       <style> #side-menu,
.side-menu-overlay {
	position: fixed;
	top: 0;
	height: 100%;
	display: none
}

body.overflow-hidden {
	overflow: hidden
}

#side-menu {
	width: 300px;
	right: -300px;
	overflow-y: auto;
	z-index: 1035;
	background: #212529;
	padding: 20px 30px;
	color: #333;
	transition: .4s
}

body.side-menu-visible #side-menu {
	transform: translateX(-300px)
}

#side-menu .contents {
	margin-top: 15px
}

#side-menu .nav-link {
	color: #333;
	font-size: 16px;
	font-weight: 600;
	padding: 12px 0
}

#side-menu .nav-link:hover {
	opacity: .8
}

#side-menu .close {
	font-size: 36px;
	font-weight: 400
}

.side-menu-overlay {
	left: 0;
	min-width: 100%;
	background: rgba(0, 0, 0, .4);
	z-index: 100
}

#side-menu.side-menu-left {
	right: auto;
	left: -300px
}

body.side-menu-visible #side-menu.side-menu-left {
	transform: translateX(300px)
} </style>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button better-bootstrap-nav-left" style="height:80px;background-color:#37434d;color:#ffffff;">
            <div class="container-fluid"><a class="navbar-brand" href="#"><i class="fa fa-camera"></i>&nbsp;CaptureNow</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse better-bootstrap-nav-left" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;margin-right: 25vh;" href="https://www.hollandiacorp.com/CaptureNow/create.php"><i class="fa fa-plus"></i>&nbsp;Create</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" style="color: #ffffff;" href="https://www.hollandiacorp.com/CaptureNow/mainpage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="https://www.hollandiacorp.com/CaptureNow/account.php"><i class="fa fa-user-circle-o"></i>&nbsp;Account</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="https://www.hollandiacorp.com/CaptureNow/index.php"><i class="fa fa-sign-in"></i>&nbsp;Sign In</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: #ffffff;" href="https://www.hollandiacorp.com/CaptureNow/register.php"><i class="fa fa-pencil"></i>&nbsp;Register</a></li>
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
                <h1 class="text-light" style="text-align: center;margin: 4vh;">Uploading your post</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-light" style="margin: 2vh;text-align: center;">We are uploading your post to our servers.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="text-center">
				<a href="https://www.hollandiacorp.com/CaptureNow/mainpage.php"> <button class="btn btn-primary">Back to Capture Now</button></a>
				</div>
            </div>
        </div>
    </div>';
	  $account = $_SESSION["account"];
if (isset($_POST['submit'])) {
$file = $_FILES['File'];
	$fileName = $_FILES['File']['name'];
	$fileTmpName = $_FILES['File']['tmp_name'];
	$fileError = $_FILES['File']['error'];
	$fileType = $_FILES['File']['type'];
	$fileSize = $_FILES['File']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png');
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".". $fileActualExt;
				$fileDestination = 'assets/user/' . $account . "/". $fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: success.php");
				  $filepath = "https://www.hollandiacorp.com/CaptureNow/" . $fileDestination;
 $sql = "INSERT INTO Posts (Title, Caption, Poster, Image, Likes) VALUES ('$title', '$caption', '$account', '$filepath', 0)";
	   if (!mysqli_query($con, $sql)) {
 header("Location: Location: https://www.hollandiacorp.com/CaptureNow/error.php");
 } else {
 header("Location: https://www.hollandiacorp.com/CaptureNow/success.php");
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
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>';
?> 