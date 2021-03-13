<?php

session_start();


$submit = "";
$status = "OK";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

//$id=md5($id1);
//$password=md5($password1);


  if (empty($email)) {
    $msg .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Please Enter Your email. </font></center>";

    $status = "NOTOK";

  }

  if (empty($password)) {
    $msg .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Please Enter Your password.</font></center>";

    $status = "NOTOK";
  }

  if ($status == "OK") {

    include('db_connect.php');

    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' AND verifikasi ='Aktif' ");

    $count = mysqli_num_rows($result);

    if ($count == 1) {

      $row = mysqli_fetch_array($result);

      $_SESSION['email'] = $row['email'];
      $_SESSION['key']=mt_rand(1000,9999);
      $_SESSION['user_type'] = $row['user_type'];
      $_SESSION['shop_id'] = $row['shop_id'];

      //$shop_type = $_SESSION['shop_type'];
      $shop_id= $_SESSION['shop_id'];
      $result = mysqli_query($con, "SELECT * FROM shop WHERE shop_id = '$shop_id' AND shop_type = '$shop_type'");
      $rows = $result->fetch_assoc();
      $_SESSION['shop_type']=$row['shop_type'];

      header("location:dashboard.php");
    } else {

      $msg = "<center><font  size='3px' face='Verdana' size='1' color='red' align='center'>Wrong Email or Password !!!.</font></center>";
      
    }
  }

}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KakaPos | Masuk</title>

  <!-- Favicon -->
  <link href="assets/img/gallery/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body class="hold-transition login-page" style="background-color: #ffffff;">


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <ul>
          <a href="index.php"><img src="assets/img/gallery/logo.png " alt="" class="img-fluid"></a>
          &ensp;
          <a href="index.php"><img src="assets/img/gallery/KakaPos.png " alt="" class="img-fluid"></a>

        </ul>      
        </div>

        <nav class="nav-menu d-none d-lg-block">
        <ul>
         
          <li class="get-started" style="color: #414FB7;"><a href="register.php">Daftar</a></li>
        </ul>
      </nav><!-- .nav-menu -->
 
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column text-center">
        <div class="login-box">
          <div class="login-logo" data-aos="fade-up">
          <ul>
          <img src="assets/img/gallery/logo.png " alt="" class="img-fluid">
        </ul>      
          </div>
          <!-- /.login-logo -->
          <!-- <div class="row "> -->
            <div class="col-lg-6 pt-5  pt-lg-0 order-2 order-lg-1 d-flex flex-column text-center">
            <div class="login-box" data-aos="fade-up">
                <form action="login.php" method="post">
                  <p class="login-box-msg" data-aos="fade-up">Silakan Masukan Email dan Password</p>
                  <div class="input-group mb-12 justify-content-center">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="input-group mb-12 justify-content-center">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>

                    
            </div>
                      <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          echo "<div  align='center'>" . $msg . "</div";
                        }
                        ?>

          
                    <!-- /.col -->
          <!-- </div> -->
                    <br>
                    <div class="login-box" data-aos="fade-up">
                      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->


                </div>
              </form>


            </div>

            
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->
            <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="fade-left" data-aos-delay="200">
              <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>

        </div>
        
     

      </div>
    </div>

  </section><!-- End Hero -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
