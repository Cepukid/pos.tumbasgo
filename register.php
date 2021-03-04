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

  <section id="hero" class="d-flex align-items-center">


        <div class="container">
          <div class="row justify-content-center" style="margin:0;">
          <div class="col col-lg-6  pt-5 d-flex text-center">
            &ensp;
            <img src="3.png">
          </div>

          <div class="col col-lg-6">
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

  </section>
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