 <?php include('partials/menu.php'); ?>

 <div class="main-Contant">
   <div class="wrapper">
     <h1>Manage Admin</h1>

     <br />

     <?php
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add']; //Displaying Session Message
        unset($_SESSION['add']); //removing Session Message
      }
      if (isset($_SESSION['deleted'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']); //
      }
      if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
      if (isset($_SESSION['user-not-found'])) {
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
      }
      if (isset($_SESSION['pwd-not-match'])) {
        echo $_SESSION['pwd-not-match'];
        unset($_SESSION['pwd-not-match']);
      }
      if (isset($_SESSION['change-pwd'])) {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
      }



      ?>

     <br><br><br>

     <a href="add-admin.php" class="btn-primary">Add Admin</a>

     <br /><br /><br />
     <table class="tbl-full">
       <tr>
         <th>S.N.</th>
         <th>Full Name</th>
         <th>Username</th>
         <th>Actions</th>
       </tr>

       <?php
        //Query to get all Admin
        $sql = "SELECT * FROM tbl_admin";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if ($res == TRUE) {
          //Count Rows to check wheather we have data in database or not
          $count = mysqli_num_rows($res); //function to get all the row in database
          $sn = 1; //create a variable and assign the value

          //check the number of rows
          if ($count > 0) {
            //we have data in database
            while ($rows = mysqli_fetch_assoc($res)) {
              //using while loop to get all the data from database.
              //and while loop will run as long as we have date in database

              //Get Individual Data
              $id = $rows['id'];
              $full_name = $rows['full_name'];
              $username = $rows['username'];

              //display the value in our table
        ?>

             <tr>
               <td><?php echo $sn++; ?>.</td>
               <td><?php echo $full_name; ?></td>
               <td>
                 <?php echo $username; ?></td>
               <td>
                 <a href="<?PHP echo SITEURL; ?>/admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                 <a href="<?PHP echo SITEURL; ?>/admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"" class=" btn-secondary">Update Admin</a>
                 <a href="<?PHP echo SITEURL; ?>/admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
               </td>
             </tr>
       <?php

            }
          } else {
            // we do not have data in database -->
          }
        }
        ?>


     </table>
   </div>

 </div>
 </div>
 <?php include('partials/footer.php'); ?>