<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>


    <br><br>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add']; //Displaying Session Message
      unset($_SESSION['add']); //removing Session Message
    }
    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload']; //Displaying Session Message
      unset($_SESSION['upload']); //removing Session Message
    }


    ?>

    <br> <br>
    <!-- Add category form starts -->
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">

        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" placeholder="Category Title">
          </td>

        </tr>
        <tr>
          <td>Select Image:</td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>

          <td>Featured: </td>
          <td>
            <input type="radio" name="featured" value="Yes"> Yes
            <input type="radio" name="featured" value="No"> No

          </td>

        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
          </td>


        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">

          </td>
        </tr>



      </table>
    </form>

  </div>
</div>

<?php include('partials/footer.php'); ?>


<!-- Add Category form end -->

<?php
//check wheather the sumbmit button is click or not
if (isset($_POST['submit'])) {
  //echo "clicked";
  //button clicked
  //1.get the data from form
  $title = $_POST['title'];

  //for radio input, we need to check whether the button is clicked or not
  if (isset($_POST['featured'])) {
    //Get the value from Form
    $featured = $_POST['featured'];
  } else {
    $featured = "No";
  }

  if (isset($_POST['active'])) {
    $active = $_POST['active'];
  } else {
    $active = "No";
  }

  //ceck wether image is selected or not and set the value for image name accordingly
  // print_r($_FILES['image']);

  //die(); //Breake the code here

  if (isset($_FILES['image']['name'])) {
    //upload the image
    //to uplpoad image we need image name ,source pat and destination path
    $image_name = $_FILES['image']['name'];

    //upload the image only if image is selected
    if ($image_name != "") {


      //Auto rename our image
      //get the extension of our image (jpg,png,gif,etc) eg "specialservice1.jpg"
      $ext = end(explode('.', $image_name));
      //Rename the image
      $image_name = "Service_category_" . rand(000, 999) . '.' . $ext; //e.g. Service_category_834.jpg


      $sourse_path = $_FILES['image']['tmp_name'];
      $destination_path = "../images/category/" . $image_name;

      //finally upload the image
      $upload = move_uploaded_file($sourse_path, $destination_path);
      //ceck whether the image is uploadesd or not
      //and if the image is not uploaded then we willstop the process and redirect with erro message
      if ($upload == false) {
        //set message
        $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
        //Redirect to manage Admin Page
        header("location:" . SITEURL . '/admin/add-category.php');
        //stop the process
        die();
      }
    }
  } else {
    //dont upload image and set the image name value blank
    $image_name = "";
  }

  //2.Create sql query to insert Category into Database
  $sql = "INSERT INTO tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
 ";

  //3. Executing Query and saving Data into dartabase

  $res = mysqli_query($conn, $sql);
  //4. check whether the (query is executed)data is inserted or not amd display appropriate message
  if ($res == TRUE) {
    //Query Executed and category added
    $_SESSION['add'] = "<div class='success'> Category Added Succesfully.</div>";
    //redirect to manage category page
    header("location:" . SITEURL . '/admin/manage-category.php');
  } else {
    //Failed to add Category
    $_SESSION['add'] = "<div class='error'> Failed to add category.</div>";
    //redirect to manage category page
    header("location:" . SITEURL . '/admin/add-category.php');
  }
}


?>