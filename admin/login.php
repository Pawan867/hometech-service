<?php include('../config/constants.php');?>
<html>

<head>
    <title>Login - Home Service System</title>
    <link rel="stylesheet"  href="../css/admin.css">

</head>
<body>
  <div class="login">
  <h1 class="text-center">LOGIN</h1> 
  <br> <br>
  <?php
  if(isset($_SESSION['login']))
  {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
  }

  if(isset($_SESSION['mo-login-message']))
  {
    echo $_SESSION['mo-login-message'];
    unset ($_SESSION['mo-login-message']);
  }

  ?>
  <br><br>

  <!-- login form start here -->
  <form action="" method="POST"
    class="text-center">
    
        User Name: <br>
        
          <input type="text" name="username" placeholder="Enter username"> <br><br>
        Password: <br>
        
        <input type="password" name="password" placeholder="Enter password"> <br><br>
        
      <input type="submit" name="submit" value="Login" class="btn-primary">
        <br><br>
</form>


   <!-- login form ends here -->

  <p class="text-center">Created By  -  Passe Group</p>
  </div>
</body>


</html>
<?php 

// check whether the submit button is click or not
if(isset($_POST['submit']))
{
  //process for login
  //get the data from login form
 $username = $_POST['username'];
 $password = md5($_POST['password']);

 //sql to check whether the user with user with username and password exists or not 
 $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' "; 
 //execute the query 
 $res =mysqli_query($conn, $sql);
// count rows to check whether the user exists or not 
$count = mysqli_num_rows($res);

if($count==1)
{
//user available and loginsuccess
$_SESSION['login'] = "<div class='sucess'>Login Successfully.</div>";
$_SESSION['user'] = $username; //to check whether the user is looged in or not and logout  will unset it
// Redirect to home page/Dashboard
header('location:'.SITEURL.'/admin/');
}
else
{
  //user not available and login fail
$_SESSION['login'] ="<div class='error'>User name And Password Did not Match.</div>";
// Redirect to home page/Dashboard
header('location:'.SITEURL.'/admin/login.php');
}

}

?>