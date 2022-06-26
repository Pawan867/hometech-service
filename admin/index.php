<?php include('partials/menu.php'); ?>
<div class="main-Contant">
  <div class="wrapper">
    <h1>Dashboard</h1>
    <br><br>

    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }

    ?>
    <br><br>

    <div class="col-4 text-center">
      <?php
      //SQL Query
      $sql = "SELECT * FROM tbl_admin";
      //Execute Query
      $res = mysqli_query($conn, $sql);
      //count Rows
      $count = mysqli_num_rows($res);
      ?>

      <h1><?php echo $count; ?></h1>
      <br />
      Admins
    </div>
    <div class="col-4 text-center">
      <?php
      //SQL Query
      $sql2 = "SELECT * FROM tbl_category";
      //Execute Query
      $res2 = mysqli_query($conn, $sql2);
      //count Rows
      $count2 = mysqli_num_rows($res2);
      ?>

      <h1><?php echo $count2; ?></h1>
      <br />
      Services
    </div>
    <div class="col-4 text-center">
      <h1>5</h1>
      <br />
      Contact
    </div>
    <!--<div class="col-4 text-center">
      <h1>5</h1>
      <br />
      Categories
    </div>
    <div class="clearfix"></div>
  </div> -->

    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>

  </div>

  <?php include('partials/footer.php') ?>