<?php
  //include constant.php file here 
  include('../config/constants.php');
//get the id to be deleted
 $id = $_GET['id'];
//create the sql query 
$sql ="DELETE FROM tbl_admin Where id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);
//check whether the query executed succesfully or not
if($res==true )
{
  //Query Executed Succefully and admin delete
 // echo "Admin Deleted" ;
 //create SEsssion variable to display message
 $_SESSION['delete'] = "<div class='success'>Admin delete Successfuly.</div>";
 //redrict to manage admin page 
 header('location:'.SITEURL.'/admin/manage-admin.php');
}
else
{
  //failed to delete admin
 // echo "failed deletes admin ";
  $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin Try Again Latter.</div>";
  header('location:'.SITEURL.'/admin/manage-admin.php');
}

//REDIRECT TO MANAGE ADMIN PAGE WITH MESSAGE(ERROR) SUCCESS/(ERROR)
//header("Location: http://www.example.com/another-page.php");
?>