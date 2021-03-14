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
  $password =  md5($password);

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
                  $url = 'http://'.$_SERVER['SERVER_NAME'].':8080/tumbasgo/verify.php?id='.$last_id.'&token='.$token; 

                  $output = '<div> Terimakasih telah registrasi di Pos Kakatoo, silahkan klik link berikut untuk melanjutkan verifikasi <br>' .$url. '</div>';

                if($result == true ){
                  //Load Composer's autoloader
                  require 'C:\Users\user only\vendor\autoload.php';
                                  
                  //Instantiation and passing `true` enables exceptions
                  $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2;                 //Enable verbose debug output
                        
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = gethostbyname('smtp.gmail.com');                       //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'info.kakatoo@gmail.com';                                  //SMTP username
                        $mail->Password   = 'kakatoo12*';                               //SMTP password
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
  <title>KakaPos | Registrasi</title>

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
</head>
<body class="">
  <nav class="navbar" style="margin-left=10px">
    <a class="navbar-brand" href="index.php">
    &ensp;
    &ensp;
    &ensp;
    &ensp;
    <img src="logo.png" height="50px">
    &ensp;
    <img src="KakaPos.png" height="20px">
    </a>
  </nav>
  <div class="container">
              <!--<div class="login-box">
              
                    <div class="login-logo">
                      <h1><b>KakaPos</b></h1>  
                    </div>
               /.login-logo -->

    <div class="row justify-content-center" style="margin:0;">
    <div class="img1 col-lg-5">
    &ensp;
      <img src="3.png" style="background-size: 360px 480px;">
    </div>

    <div class="col col-lg-5">
   <div class="cardregis">
    <div class="card-body login-card-body">
        <h3 class="login-box-msg">Daftar Akun</h3>
      <p class="login-box-msg">Silakan Mengisikan data berikut</p>

      <form action="register.php" method="POST">
        
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <!--<span class="fas fa-envelope"></span>-->
                </div>
              </div>
            </div>

<<<<<<< Updated upstream
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="shop_name" placeholder="Nama Toko" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <!--<span class="fas fa-envelope"></span>-->
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <!--<span class="fas fa-envelope"></span>-->
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" onkeypress="return angkahp(event)" maxlength="12" minlength="11" class="form-control" name="no_hp" placeholder="No. HP" required>
              <div class="input-group-append">
                <div class="input-group-text">
=======
        <div class="container">
          <div class="row justify-content-center" style="margin:0;">
          <div class="col col-lg-6  pt-5 d-flex text-center" data-aos="fade-right">
            &ensp;
            <img src="3.png">
          </div>

          <div class="col col-lg-6">
        <div class="cardregis" data-aos="fade-left">
          <div class="card-body login-card-body">
              <h3 class="login-box-msg">Daftar Akun</h3>
            <p class="login-box-msg">Silakan Mengisikan data berikut</p>

            <form action="register.php" method="POST">
              
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="shop_name" placeholder="Nama Toko" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <!--<span class="fas fa-envelope"></span>-->
                      </div>
                    </div>
                  </div>
>>>>>>> Stashed changes
                  
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password" maxlength="8" minlength="8" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password2" id="password2" maxlength="8" minlength="8" placeholder="Konfirmasi Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div>

            
        </div>
        </div>

        

          <!-- /.col -->
          <div>
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->

        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div  align='center'>" . $msg1 . "</div";
          }
          ?>

        </div>
      </form>


    </div>
    <!-- /.login-card-body -->
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

</body>
</html>