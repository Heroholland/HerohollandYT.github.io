<?php

$servername = "127.0.0.1";
$dbUsername = "heroholl_holland";
$dbPassword = "holland.910";
$dbName = "heroholl_capturenow";

$con = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$con) {
	die("Connection failed: ".mysqli_connect_error());
}
