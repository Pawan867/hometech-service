<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br><br>
    <?php
    if (isset($_SESSION['add']))  //checking heather the session is set or not
    {
      echo $_SESSION['add'];  //display the Session message if set
      unset($_SESSION['add']); //remove session message
    }

    ?>

    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full Name:</td>
          <td>
            <input type="text" name="full_name" placeholder="Enter Your Full Name">
          </td>

        <tr>

          <td>Username: </td>
          <td>
            <input type="text" name="username" placeholder="your user name">

          </td>

        </tr>
        <tr>

          <td>Password:</td>
          <td>
            <input type="password" name="password" placeholder="your password">
          </td>

        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

          </td>
        </tr>

      </table>
    </form>
  </div>
</div>


<?php include('partials/footer.php'); ?>


<?php
//process the value from form and save it in database
//check wheather the sumbmit button is click or not
if (isset($_POST['submit'])) {
  //button clicked
  // echo "Button Clicked";
  //1.get the data from form
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); //password encryption with md5

  //2.sql Query To save the data into database
  $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";


  //3. Executing Query and saving Data into dartabase

  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));
  //4. check whether the (query is executed)data is inserted or not amd display appropriate message
  if ($res == TRUE) {
    //Data Inserted
    //echo"Data Inserted";
    //create a session variable to display message
    $_SESSION['add'] = "Admin Added Successfully";
    // redirect page to manage Admin
    header("location:" . SITEURL . '/admin/manage-admin.php');
  } else {
    //Failed to insert Data
    // echo"Failed To Insert Data";

    //create a session variable to display message
    $_SESSION['add'] = "Failed to Add Admin";
    // redirect page to Add Admin
    header("location:" . SITEURL . '/admin/add-admin.php');
  }
}

?>