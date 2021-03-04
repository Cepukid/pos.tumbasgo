<?php
session_start();


$submit = "";
$status = "OK";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];

//$id=md5($id1);
//$password=md5($password1);


    if (empty($email)) {
        
      $msg = "<div class='alert alert-danger'> Silahkan Masukan Email !</div>"; 
      
      
      $status = "NOTOK";
      
    }

    if (empty($password)) {
      $msg = "<div class='alert alert-danger '> Silahkan Masukan Password !</div>"; 
      
      $status = "NOTOK";
    }

    if (empty($email && $password)){

    $msg = "<div class='alert alert-danger'> Silahkan Masukan Email dan Password !</div>"; 

    $status = "NOTOK";
    }

  if ($status == "OK") {

    include('db_connect.php');

    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");

    $count = mysqli_num_rows($result);

    if ($count == 1) {

      $row = mysqli_fetch_array($result);

      $_SESSION['email'] = $row['email'];
      $_SESSION['key']=mt_rand(1000,9999);
      $_SESSION['user_type'] = $row['user_type'];
      $_SESSION['shop_id'] = $row['shop_id'];
      $shop_id= $_SESSION['shop_id'];
      $result = mysqli_query($con, "SELECT * FROM shop WHERE shop_id=$shop_id");
      $rows = $result->fetch_assoc();
      $_SESSION['shop_type']=$rows['shop_type'];

      header("location:dashboard.php");
    } else {

        echo '<script type="text/javascript">
        alert("Ada Kesalahan pada Email atau Password !!!");
        </script>'; 
      
    }
  }

}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tumbas POS | Masuk</title>
  <link href="assets/img/gallery/logo.png" rel="icon">
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
<body>
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
            <li class="get-started" style="color: #414FB7;"><a href="register.php">Registrasi</a></li>
            </ul>
        </nav><!-- .nav-menu -->
    
        </div>
    </header><!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <!-- form login -->
            <form action="login.php" method="post">
                <div class="form-group">
                    <ul class="text-center">
                    <img src="assets/img/gallery/logo.png " alt="" class="img-fluid">
                    &ensp;
                    <p>Silakan Masukan Email dan Password !</p>
                    </ul>
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<div  align='center'>" . $msg . "</div>";
                        }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <!-- end form login -->
            </div>
            <!-- gambar -->

            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
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
