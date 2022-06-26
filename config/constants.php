<?php

//start the session
session_start();



//create constant to store non repeatin values
define('SITEURL', 'http://localhost/hometech-service');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'work-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn, $sql)); //database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn, $sql));//SELECTING DATABASE
