<?php
session_start();

$submit = "";
$status1 = "OK";
$msg1 = "";
$passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $cell = $_POST['no_hp'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $shop_name = $_POST['shop_name'];
  $shop_contact = $_POST['no_hp'];
  $shop_address = $_POST['alamat'];

  

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

      $cek_username=mysqli_num_rows(mysqli_query ("SELECT name FROM users WHERE name='$_POST[name]'"));
      // Kalau username sudah ada yang pakai
          if ($cek_username > 0){
          echo "Username sudah ada yang pakai. Ulangi lagi";
        }

        if (($_POST['password'])!= ($_POST['password2'])){
          //Cek Password sama atau tidak
          $msg1 = "<center><font  size='4px' face='Verdana' size='1' color='red'>Konfirmasi Sandi salah.</font></center>";
          
        }
        else {
              $tambah =  "INSERT INTO shop (`shop_name`,`shop_contact`,`shop_email`,`shop_address`,`tax`,currency_symbol,`shop_status`) VALUE ('$shop_name','$shop_contact','$email','$shop_address','0','Rp','OPEN')";
              
              if(mysqli_query($con, $tambah)){
                $id=mysqli_insert_id($con);
                $tambah1 =  "INSERT INTO users (`name`,`cell`,`email`,`password`,`user_type`,`shop_id`) VALUE ('$name','$cell','$email','$password','admin','$id')";
                if(mysqli_query($con, $tambah1)){

                }else{
                  echo "yy";
                }
              }
              else {
                echo "hagfdsg";
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