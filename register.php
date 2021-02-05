
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

      <form action="" method="post">
        
            <div class="input-group mb-3">
              <input type="name" class="form-control" name="username" placeholder="Nama Lengkap" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <!--<span class="fas fa-envelope"></span>-->
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <!--<span class="fas fa-envelope"></span>-->
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="no_hp" placeholder="No. HP" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
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
            echo "<div  align='center'>" . $msg . "</div";
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>