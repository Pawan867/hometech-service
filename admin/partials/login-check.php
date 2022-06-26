<?php
//authorization - access control
//check whether the user is logged in or not
if(!isset($_SESSION['user']))//if user session is not set
{

//user is not loged in
//Redirect to login page with message
$_SESSION['mo-login-message']= "<div class='error text-center'>please login to access Admin Pannel.</div>";
//Redirect to login page
header('location:'.SITEURL.'/admin/login.php');
}

?>