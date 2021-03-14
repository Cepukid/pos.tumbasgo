<?php

include_once 'db_connect.php';

if(!isset($_GET["code"])){
    exit("Can't find page");
}

$code = $_GET["code"];

$getemailquery = mysqli_query($con, "SELECT email FROM resetpassword WHERE code='$code'");
if(mysqli_num_rows($getemailquery) == 0){
    echo "<script> alert('Email tidak terdaftar');  </script>";

}

if(isset($_POST["submit"])) {
    $password = $_POST["password"];
    $password = md5($password);

    $row = mysqli_fetch_array($getemailquery);
    $email = $row["email"];

    $query = mysqli_query($con, "UPDATE users SET password='$password' WHERE email='$email'");

    if($query){
        $query = mysqli_query($con, "DELETE FROM resetpassword WHERE code='$code'");
        echo "<script> alert('Reset password berhasil');  </script>";//jika pesan terkirim
    } else {
        echo "<script>alert('Gagal Menyimpan '); window.location = 'login.php';</script>";
    }
}


// if(isset($_POST['submit']))

// {
//     include('db_connect.php');
//     $email=$_POST['email'];
//   $pass=$_POST['password'];
//     $sql = "UPDATE users SET password = '$pass' WHERE email = '$email' ";
//     $select = mysqli_query($con, $sql) or die(mysqli_error());
//     if($select){
//         echo "<script> alert('Reset password berhasil');  </script>";//jika pesan terkirim
	    
//     }else{
//     echo "<script>alert('Gagal Menyimpan '); window.location = 'login.php';</script>";
//      }
// }
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

        <!-- <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li class="get-started" style="color: #414FB7;"><a href="register.php">Registrasi</a></li>
            </ul>
        </nav> --><!-- .nav-menu -->
    
        </div>
    </header><!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Buat Password Baru Anda</h1>
                                        <p class="mb-4">Silahkan masukkan password baru Anda !</p>
                                    </div>
                                    <form class="user" action="" method="POST">
                                    <label class="label">Password Baru</label>
                                        <div class="form-group" >
                                            <input type="password" class="form-control" name="password" id="password"  placeholder="Masukan Password Baru Anda">
                                            <input type="hidden" name="email" value="<?php echo $email;?>">
                                            <input type="hidden" name="pass" value="<?php echo $pass;?>">

                                        <label class="label">Konfirmasi Password</label>
                                        <div class="form-group" >
                                        <input type="password" name="konfirmasi" class="form-control" id="confirm_password"  onkeyup='check();' placeholder="Konfirmasi Password Anda">
                                        </div>
                                        <span id='message'></span>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" id="btnSubmit" name="submit">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
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


  
  <script type="text/javascript">
            var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = "<div class='alert alert-danger'> Password dan Konfirmasi Sama </div> ";
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = "<div class='alert alert-danger'> Password dan Konfirmasi Tidak Sama </div> ";
        }
        }
    </script>

</body>
</html>