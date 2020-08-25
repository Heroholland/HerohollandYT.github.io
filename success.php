<?php
session_start();
$location = "";
if (isset($_SESSION['account']) && !empty($_SESSION['account'])) {
	$location = "mainpage.php";
} else {
	$location = "index.php";
}
echo '<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ExtraPages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="color: rgb(52,238,6);margin: 5vh;">Success</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-light" style="text-align: center;margin: 5vh;font-size: 25PX;">Action completed. Click the button below to go back!</p>
                <div class="text-center"><img class="rounded img-fluid" src="https://www.hollandiacorp.com/CaptureNow/assets/img/success.svg" style="width: 500px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col"><a class="btn btn-success btn-block text-light" role="button" style="margin: 3vh;" href="https://www.hollandiacorp.com/CaptureNow/'.$location.'">Go Back</a></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>';
?>