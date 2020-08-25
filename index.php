<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CaptureNow</title>
    <meta name="description" content="The social media of the future. Upload photos and have fun!">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="/assets/img/favicon.jpg?h=42be57a646df01d5eabd75b525a9e75f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="manifest" href="/manifest.json?h=9478105007ca9886d0f62c2bef7f446f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=67225db396c0221bb57f9e3797508aca">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 offset-0 text-center m-auto col-xs-12" id="newLogin" style="padding-top: 25vh;">
                <div class="jumbotron">
                    <h1 style="text-align: center;height: 95px;">Capture Now</h1>
                    <form action="login.php" method="post">
						<input class="form-control" type="text" placeholder="Username" name="Username" style="margin-bottom: 3vh;">
                        <div class="form-row">
                            <div class="col">
								<input class="form-control" type="password" placeholder="Password" name="Password" style="margin-bottom: 3vh;"></div>
                        </div><button class="btn btn-primary btn-block" type="submit">Login</button>
						<a href="https://www.hollandiacorp.com/CaptureNow/register.php" class="m-3 text-center"> or register here. </a>
					</form>
                </div>
            </div><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>