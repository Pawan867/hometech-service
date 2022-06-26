<?php

require "config/constants.php";

$servername = "localhost";
$username = "USER";
$password = "PASSWORD";
$db = "home_db"; 
// $db = "work-order";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>