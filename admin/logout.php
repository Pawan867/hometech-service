<?php 
//include constants.php for SITEURL
include('../config/constants.php');
//destroy the session
session_destroy();//unset $_SESSION['user']
//Redirect to login page
header('location:'.SITEURL.'/admin/login.php');
?>