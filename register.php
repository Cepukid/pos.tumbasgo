<?php
session_start();

  include_once ('PHPMailer/src/PHPMailer.php');
  include_once ('PHPMailer/src/SMTP.php');
  include_once ('PHPMailer/src/Exception.php');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;


$submit = "";
$status1 = "OK";
$msg1 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $cell = $_POST['no_hp'];
  $password = $_POST['password'];
  $password = md5($password);
  $password2 = $_POST['password2'];

  $shop_name = $_POST['shop_name'];
  $shop_contact = $_POST['no_hp'];
  $shop_address = $_POST['alamat'];

  $token = md5(rand('10000','99999'));
  

  if (empty($name)){
    $msg1 .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Tolong Masukkan Nama anda. </font></center>";

    $status1 = "NOTOK";
  }

  if (empty($email)){
    $msg1 .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Tolong Masukkan Email anda. </font></center>";

    $status1 = "NOTOK";
  }
  
  if (empty($cell)){
    $msg1 .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Tolong Masukkan No. Handphone anda. </font></center>";

    $status1 = "NOTOK";
  }

  if (empty($password)){
    $msg1 .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Tolong Masukkan Kata sandi anda. </font></center>";

    $status1 = "NOTOK";
  }

  if (empty($password2)){
    $msg1 .= "<center><font  size='4px' face='Verdana' size='1' color='red'>Mohon Ulang Kata sandi anda. </font></center>";

    $status1 = "NOTOK";
  }


  if ($status1 == "OK") {

      include('db_connect.php');

      //cek username dan email terdaftar
      $cek_usermail = mysqli_query($con,"SELECT * FROM users WHERE email = '".$email."' ");
      $r_cek = mysqli_num_rows($cek_usermail);
      if ($r_cek > 0){
        echo '<script>alert("Email sudah terdaftar hehe")</script>';
      } elseif (($_POST['password'])!= ($_POST['password2'])){
          //Cek Password sama atau tidak
          echo '<script>alert("Konfirmasi Password salah")</script>';
        }
        else { 
              $tambah =  "INSERT INTO shop (`shop_name`,`shop_contact`,`shop_email`,`shop_address`,`tax`,currency_symbol,`shop_status`,`shop_type`) 
              VALUE ('$shop_name','$shop_contact','$email','$shop_address','0','Rp','OPEN','free')";

              if(mysqli_query($con, $tambah)){ 
                
                  $id=mysqli_insert_id($con);
                  $tambah1 = "INSERT INTO users (`name`,
                  `cell`,
                  `email`,
                  `password`,
                  `user_type`,
                  `shop_id`,
                  `token`,
                  `verifikasi`,
                  `shop_type`) VALUE ('$name',
                  '$cell',
                  '$email',
                  '$password',
                  'admin',
                  '$id',
                  '$token',
                  'Inaktif',
                  'free')";
                  $result = mysqli_query($con, $tambah1);
                  
                  $last_id = mysqli_insert_id($con);
                  $url = 'http://'.$_SERVER['SERVER_NAME'].':8181/magang/pos.tumbasgo/verify.php?id='.$last_id.'&token='.$token; 

                  $output = '<div> Terimakasih telah registrasi di Pos Kakatoo, silahkan klik link berikut untuk melanjutkan verifikasi <br>' .$url. '</div>';

                if($result == true ){
                  //Load Composer's autoloader
                  require 'C:\Users\DIMAS BAGAS C\vendor\autoload.php';
                                  
                  //Instantiation and passing `true` enables exceptions
                  $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2;                 //Enable verbose debug output
                        
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = gethostbyname('smtp.gmail.com');                       //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'info.kakatoo@gmail.com';                                  //SMTP username
                        $mail->Password   = 'tffglytfmosqaubu';                               //SMTP password
                        $mail->SMTPSecure = 'tls';    
                        //$mail->SMTPAutoTLS = false;                            //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        $mail->SMTPOptions = array(
                          'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                          ));

                        //Recipients
                        $mail->setFrom('info.kakatoo@gmail.com', 'Kakatoo ID');
                        $mail->addAddress($email , $name);     //Add a recipient

                        //Content
                        $mail->isHTML(true);
                        
                        //Set email format to HTML
                        $mail->Subject = "Verifikasi Pendaftaran Member baru";
                        $mail->Body    = $output;
                        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                        $mail->send();
                        echo '<script>alert( "Registrasi berhasil! Silahkan Verifikasi Email anda :) " )</script>';
                    } catch (Exception $e) {
                       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }
                  }
               

             }
                       
           }
    }
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kaka POS | Registrasi</title>
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
<body class="">
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

      </nav><!-- .nav-menu -->
 
    </div>
  </header>
  <!-- End Header -->


  <!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">

        </div>
    </nav>
</header>


<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="3.png" alt="" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
        <form action="register.php" method="POST">
                <h3 class="login-box-msg">Daftar Akun</h3>
                <p class="login-box-msg">Silakan Mengisikan data berikut </p>
                <div class="row">

                <div class="input-group col-lg-12 mb-4">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>

                  <div class="input-group col-lg-12 mb-4">
                    <input type="text" class="form-control" name="shop_name" placeholder="Nama Toko" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>
                  
                  <div class="input-group col-lg-12 mb-4">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>
                  
                  <div class="input-group col-lg-12 mb-4">
                    <input type="text" onkeypress="return angkahp(event)" maxlength="12" minlength="11" class="form-control" name="no_hp" placeholder="No. HP" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        
                      </div>
                    </div>
                  </div>

                  <div class="input-group col-lg-12 mb-4">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        
                      </div>
                    </div>
                  </div>

                  <div class="input-group col-lg-12 mb-4">
                    <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>

                  <div class="input-group col-lg-12 mb-4">
                    <input type="password" class="form-control" name="password2" id="password2" minlength="8" placeholder="Konfirmasi Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>

                  <div>

                  <div>

                  
              </div>
              </div>

                <!-- /.col -->
                <!-- /.col -->

                </div>
                <div>
                  <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  echo "<div  align='center'>" . $msg1 . "</div";
                }
                ?>
                
            </form>
        </div>
    </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Pembatassan Angka no HP-->
<script type="text/javascript">

function angkahp(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

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