<?php
session_start();
if (!isset($_SESSION['account']) && empty($_SESSION['account'])) {
	header("Location: https://www.hollandiacorp.com/CaptureNow/index.php");
}
$con = mysqli_connect('127.0.0.1','heroholl_holland', 'holland.910');
 if (!$con)
 {
  header("Location: error.php");
 }
$account = $_SESSION["account"];
echo '<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CaptureNow</title>
    <meta name="description" content="The social media of the future. Upload photos and have fun!">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="/assets/img/favicon.jpg?h=42be57a646df01d5eabd75b525a9e75f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="manifest" href="https://www.hollandiacorp.com/manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.min.css?h=67225db396c0221bb57f9e3797508aca">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
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
	  <h1 class="text-light shadow-sm" style="text-align: center;font-size: 7vh;padding: 4vh;text-shadow: -2px 2px 12px rgb(0,0,0);">Capture Now</h1>';
$file = "/home2/heroholland/public_html/CaptureNow/assets/user/" . $account;
if(is_dir($file) == false) {
  mkdir($file, 0755);
}
 if (!mysqli_select_db($con, 'heroholl_capturenow')) {
   header("Location: error.php");
 }
$query = "SELECT * FROM Posts";
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
<script>
  $(document).ready(function() {
    $("#like'.$row["ID"].'").click(function() {
        if ($("#like'.$row["ID"].'").attr("class") == "fa fa-heart-o") {
        $("#like'.$row["ID"].'").attr("class", "fa fa-heart");
            $.post("like.php", {
                likevalue: 1,
				id: '.$row["ID"].'
            }, function() {
                console.log("Like added");
            });
        } else {
           $("#like'.$row["ID"].'").attr("class", "fa fa-heart-o"); 
            $.post("like.php", {
                likevalue: -1,
				id: '.$row["ID"].'
            }, function() {
                console.log("Like removed");
            });
        }
    });
 });
</script></p>
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
    