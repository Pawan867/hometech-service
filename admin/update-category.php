<?php include('partials/menu.php'); ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Update Category</h1>

    <br><br>
    <?php
    if (isset($_GET['id'])) {


      //get the id and all other details
      // echo "Getting Data";
      $id = $_GET['id'];
      //create sql query to get all other detail

      $sql = "SELECT * FROM tbl_category WHERE id=$id";

      //Execute the query
      $res = mysqli_query($conn, $sql);
      // count the row to check whether the id is valid or not 
      $count = mysqli_num_rows($res);
      if ($count == 1) {
        //get all the data
        //echo "Admin Available";
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
      } else {
        //Redrict to manage admin page with sesion message
        $_SESSION['no-category-found'] = "<div class='error'>Category Not Found.</div>";
        header('location:' . SITEURL . '/admin/manage-category.php');
      }
    } else {
      //redirect to manage category
      header("location:" . SITEURL . '/admin/manage-category.php');
    }

    ?>


    <form action="" method="POST" enctype="multipart/form-data">

      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" value="<?php echo $title; ?>">
          </td>

        </tr>
        <tr>
          <td>Current Image:</td>
          <td>
            <?php
            if ($current_image != "") {
              //display the image
            ?>
              <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">

            <?php
            } else {
              //display the message
              echo "<div class='error'>Image Not Added. </div>";
            }
            ?>
          </td>
        </tr>

        <tr>

          <td>New Image: </td>
          <td>
            <input type="file" name="image">


          </td>

        </tr>

        <tr>
          <td>Featured: </td>
          <td>
            <input <?php if ($featured == "Yes") {
                      echo "checked";
                    } ?> type="radio" name="featured" value="Yes"> Yes
            <input <?php if ($featured == "No") {
                      echo "checked";
                    } ?> type="radio" name="featured" value="No"> No
          </td>
        </tr>
        <tr>
          <td>Active: </td>
          <td>
            <input <?php if ($featured == "Yes") {
                      echo "checked";
                    } ?> type="radio" name="active" value="Yes"> Yes
            <input <?php if ($featured == "No") {
                      echo "checked";
                    } ?> type="radio" name="active" value="No"> No
          </td>


        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Category" class="btn-secondary">

          </td>
        </tr>


      </table>
    </form>

    <?php

    if (isset($_POST['submit'])) {
      // echo "clicked";
      //Get All the values from form
      $id = $_POST['id'];
      $title = $_POST['title'];
      $current_image = $_POST['current_image'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];
      //updating new image if selected

      //check whether the images selected or not
      if (isset($_FILES['image']['name'])) {
        // Get te image detail\
        $image_name = $_FILES['image']['name'];
        //check whether te image is available or not
        if ($image_name != "") {
          //image available
          //upload the new image 

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
            header("location:" . SITEURL . '/admin/manage-category.php');
            //stop the process
            die();
          }

          //remove the current image if available
          if ($current_image != "") {
            $remove_path = "../images/category/" . $current_image;
            $remove = unlink($remove_path);

            //ceck weter te image is removed or not 
            //if failed to remove te display message and stop the process
            if ($remove == false) {
              //failed to remove image
              $_SESSION['Failed-remove'] = "<div class='error'>Failed to remove current image</div>";
              header('location:' . SITEURL . '/admin/manage-category.php');
              die(); //stop the process
            }
          }
        } else {
          $image_name = $current_image;
        }
      } else {
        $image_name = $current_image;
      }

      //update the database
      $sql2 = "UPDATE tbl_category SET
      title = '$title',
      image_name = '$image_name',
      featured = '$featured',
      active = '$active'
      WHERE id = $id
      ";

      //execute the query
      $res2 = mysqli_query($conn, $sql2);

      //Redirect to manage category with message
      //check whether executed or not
      if ($res2 == true) {
        //category updated
        $_SESSION['update'] = "<div class='success'> category updated successfully.</div>";
        header('location:' . SITEURL . '/admin/manage-category.php');
      } else {
        //Failed to update category
        $_SESSION['update'] = "<div class='error'> category Failed to updated .</div>";
        header('location:' . SITEURL . '/admin/manage-category.php');
      }
    }

    ?>

  </div>
</div>


<?php include('partials/footer.php'); ?>