<?php
//include constant file
include('../config/constants.php');
//check whether the id and image_name value is set or not


if (isset($_GET['id']) and isset($_GET['image_name'])) {
  //get the value an delete 
  //echo "Get Value And Delete";
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  //remove the physical image file is available

  if ($image_name != "") {
    //Image is available .so remove it
    $path = "../images/category/" . $image_name;
    //Remove the image
    $remove = unlink($path);
    //if failed to remove image  stop the process
    if ($remove == false) {
      //set the session message
      $_SESSION['remove'] = "<div class='error'> Failed to Remove category image.</div>";
      //redirect to manage category page 
      header('location:' . SITEURL . '/admin/manage-category.php');
      //stop the process
      die();
    }
  }
  //Delete Data From DAtabase
  // sql query to delete database
  $sql = "DELETE FROM tbl_category Where id=$id";
  //Execute the query
  $res = mysqli_query($conn, $sql);
  //check whether the data is delete from database or not
  if ($res == TRUE) {
    //set success message 
    $_SESSION['delete'] = "<div class='success'>category delete Successfuly.</div>";
    //redrict to manage category
    header('location:' . SITEURL . '/admin/manage-category.php');
  } else {
    //failed to delete category
    // echo "failed deletes category ";
    $_SESSION['delete'] = "<div class='error'>Failed To Delete Category Try Again Latter.</div>";
    header('location:' . SITEURL . '/admin/manage-category.php');
  }
} else {

  //redirect to manage category page 
  header('location:' . SITEURL . '/admin/manage-category.php');
}
