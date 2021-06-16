<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include_once 'PHPMailer/src/Exception.php';
include_once 'PHPMailer/src/PHPMailer.php';
include_once 'PHPMailer/src/SMTP.php';
include_once 'db_connect.php';

if(isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    
    $sql = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    if(mysqli_num_rows($sql)==1)
    {
        $code = uniqid(true);
        $query = mysqli_query($con, "INSERT INTO resetpassword(`code`, `email`) VALUES ('$code','$email')");

        if($query == 0)
        {
            echo "<script> alert('Link gagal dikirim'); </script>";//jika pesan terkirim
        }
            //Load Composer's autoloader
            require 'C:\Users\DIMAS BAGAS C\vendor\autoload.php';
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = gethostbyname('smtp.gmail.com');        //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'info.kakatoo@gmail.com';               //SMTP username
                $mail->Password   = 'tffglytfmosqaubu';                           //SMTP password
                $mail->SMTPSecure = 'tls';                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->SMTPOptions = array(
                    'ssl'=>array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                    );

                //Recipients
                $mail->setFrom('info.kakatoo@gmail.com', 'Kakatoo Digital Media');
                $mail->addAddress($email, 'reset');     //Add a recipient
            
                //Content
                $url = "http://".$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/risetpassword.php?code=$code";
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Silahkan klik link berikut untuk reset passwod Anda !';
                $mail->Body    = "<h1>Anda meminta untuk reset password</h1>
                                    klik <a href='".$url."'>link ini</a> untuk melakukannya";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset');  </script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    } 
    else {
        echo "<script> alert('Email anda tidak terdaftar di sistem'); window.location = 'login.php'; </script>";//jika pesan terkirim
        
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
                                        <h1 class="h4 text-gray-900 mb-2">Lupa Password Anda?</h1>
                                        <p class="mb-4">Kami mengerti, banyak hal terjadi. Cukup masukkan alamat email Anda di bawah ini dan kami akan mengirimkan tautan pada email Anda untuk mengatur ulang kata sandi Anda!</p>
                                    </div>
                                    <form class="user" action="lupapassword.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="submit" >
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Buat akun!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah punya akun? Login!</a>  
                                    </div>
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

</body>
</html>