<?php include('./config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Teach Service</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia" />
</head>

<body>
  <header>
    <a href="#" class="logo">Work<span>.</span></a>
    <div class="menuToggle" onClick="toggleMenu();"></div>
    <ul class="navigation">
      <li><a href="<?php echo SITEURL; ?>#banner" onClick="toggleMenu();">Home</a></li>
      <li><a href="#about" onClick="toggleMenu();">About</a></li>
      <li><a href="<?php echo SITEURL; ?>#menu" onClick="toggleMenu();">Services</a></li>
      <li><a href="#expert" onClick="toggleMenu();">Expert</a></li>
      <li><a href="#testimonials" onClick="toggleMenu();">Testomonial</a></li>
      <li><a href="#contact" onClick="toggleMenu();">Contact</a></li>
    </ul>
  </header>
  <section class="banner" id="banner">
    <div class="content">
      <h2>Always Choose Good</h2>
      <p> Techno home provides general maintenance and repair services to residential and commercial customers, including plumbing and electrical repairs...</p>
      <!-- <a href="#" class="btn">Our Services</a> -->
      <a href="#menu" class="btn" onClick="toggleMenu();">Our Services</a>


    </div>
  </section>
  <section class="about" id="about">
    <div class="row">
      <div class="col50">
        <h2 class="titleText"><span>A</span>bout Us</h2>
        <p>As one of the country’s leading home assistance providers, we’ve got over 25 years’ experience in looking after UK homes.
          From cover, new boilers to one-off repairs, we're always looking for ways to bring you better care for your home through our range of products and services.</p>
      </div>
      <div class="col50">
        <div class="imgbx">
          <img src="img1.jpg">
        </div>
      </div>
  </section>
  <section class="menu" id="menu">
    <div class="title">
      <h2 class="titleText">our <span>S</span>ervices</h2>
      <p>Access to a nationwide network of Home Experts</p>
    </div>
    <?php
    //create sql query to display categories from database
    $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' ";
    //execute the query 
    $res = mysqli_query($conn, $sql);
    //count rows to check whether the category is available or not
    $count = mysqli_num_rows($res);

    if ($count > 0) {
      //categories available
      while ($row = mysqli_fetch_assoc($res)) {
        //get the value like id, title , image_name
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
    ?>


        <div class="content">
          <div class="box">
            <div class="imgBx">
              <?php

              //check whether image is avialble or noty
              if ($image_name == "") {
                //display message
                echo "<div class='error'>image not available</div>";
              } else {
                //image available
              ?>
                <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>">
              <?php
              }

              ?>

            </div>
            <div class="text">
              <h3><?php echo $title; ?></h3>
            </div>
          </div>
        </div>


    <?php
      }
    } else {
      //categories not available
      echo "<div class='error'> category not added.</div>";
    }

    ?>


    <!-- <div class="title">
      <a href="#" class="btn">View All</a>
    </div> -->
  </section>


  <!-- if (isset($_SESSION['submit'])) {
  echo $_SESSION['submit'];
  unset($_SESSION['submit']);-->
  }



  <section class="expert" id="expert">
    <div class="title">
      <h2 class="titleText">Our Software<span>E</span>xpert</h2>
      <p>Access to a nationwide network of Home Experts</p>
    </div>
    <div class="content">
      <div class="box">
        <div class="imgBx">
          <img src="passe.jpg">
        </div>
        <div class="text">
          <h3>Sarita Pandey</h3>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="pawan.jpg">
        </div>
        <div class="text">
          <h3>Pawan Acharya</h3>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="sita.jpg">
        </div>
        <div class="text">
          <h3>Sita Itani</h3>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="rachana.jpg">
        </div>
        <div class="text">
          <h3>Rachana Giri</h3>
        </div>
      </div>

    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="title white">
      <h2 class="titleText">They <span>S</span>aid About Us</h2>
      <p>Access to a nationwide network of Home Experts</p>
    </div>
    <div class="content">
      <div class="box">
        <div class="imgBx">
          <img src="Basant.jpg">
        </div>
        <div class="text">
          <p>Your products are really special, and I would have no hesitation in recommending them to anybody. I simply could not work without your Home Teach. I think your products are great</p>
          <h3>Basant Baral</h3>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="Yubaraj.jpg">
        </div>
        <div class="text">
          <p>Your products are really special, and I would have no hesitation in recommending them to anybody. I simply could not work without your Home Teach. I think your products are great</p>
          <h3>Yubaraj Devkota</h3>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="Headmaster.jpg">
        </div>
        <div class="text">
          <p>Your products are really special, and I would have no hesitation in recommending them to anybody. I simply could not work without your Home Teach. I think your products are great So please add some variant_get_type</p>

          <h3>Shatrughan Prasad Gupta</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <div class="title">
      <h2 class="titleText"><span>C</span>ontact Us</h2>
      <p>Access to a nationwide network of Home Experts</p>
    </div>
    <div class="contactForm">
      <h3>Send Message</h3>



      <div class="col-md-9">
        <form method="post" id="frmContactus">
          <div class="contact-form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="mobile">Mobile:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="comment">Comment:</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
                <span style="color:red;" id="msg"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>






    <?php
    //checck whether submit button is click or noyt
    //if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['comment'])) {
      //get the all details from the form the form

      $name = $_POST['name'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];



      $sql = "INSERT INTO contact_us SET 
      name = '$name',
      mobile = '$mobile',
      email = '$email',
      comment = '$comment'
      
      ";

      $res = mysqli_query($conn, $sql);

      //check whether the query is executed or not
      if ($res == true) {
        //query executed and order saved
        $_SESSION['submit'] = "<div class='success'>Service Order Successfully.</div>";
        //redirect te user
        header("location:" . SITEURL . '/hometech-service.php');
      } else {
        //failed to order saved
        $_SESSION['submit'] = "<div class='error'>Failed to Order service.</div>";
        //redirect te user
        // header("location:" . SITEURL . '/hometech-service.php');
      }


      $html = "<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Mobile</td><td>$mobile</td></tr><tr><td>Comment</td><td>$comment</td></tr></table>";

      include('smtp/PHPMailerAutoload.php');
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      
      $mail->Host = "smtp.gmail.com";
      
      $mail->Port = 587;
      $mail->SMTPSecure = "tls";
      $mail->SMTPAuth =true;
      $mail->Username = "passegroup@gmail.com";
      $mail->Password = "hyqatnbpsinkmjln";
      $mail->SetFrom("passegroup@gmail.com");
      $mail->addAddress("passegroup@gmail.com");
      $mail->IsHTML(true);
      $mail->Subject = "New Contact Us";
      $mail->Body = $html;
      $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
      ));
      if ($mail->send()) {
            // echo "Mail send";
      } else {
          //  echo "Error occur";
      }
      //  echo $msg;
    }
    ?>






    <!-- </div> -->

  </section>
  <div class="copyrightText">
    <p>Copyright 2021 <a href="#"> Pawan Acharya </a>. All Right Reserved</p>

  </div>
  <!-- <script>
  var x=document.getElementById('login');
  // var y=document.getElementById('register');
  var z=document.getElementById('btn');
  // function register()
  // {
  //   x.style.left='-400px';
  //   y.style.left='50px';
  //   z.style.left='110px';
    
  }
  function login()
  {
    x.style.left='50px';
    y.style.left='450px';
    z.style.left='0px';

  }
</script> 
<script>
 var model = document.getElementById('login-form');
 window.onclick = function(event)
 {
   if(event.target == modal)
   {
     modal.style.display = "none";
   }
 }
</script>-->

  <script type="text/javascript">
    window.addEventListener('scroll', function() {
      const header = document.querySelector('header');
      header.classList.toggle("sticky", window.scrollY > 0);
    });

    function toggleMenu() {
      const menuToggle = document.querySelector('.menuToggle');
      const navigation = document.querySelector('.navigation');
      menuToggle.classList.toggle('active');
      navigation.classList.toggle('active');
    }
  </script>

</body>

</html>