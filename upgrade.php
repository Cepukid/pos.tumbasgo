<?php
session_start();
$shop_id = $_SESSION['shop_id'];
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:login.php");

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Upgrade</title>
  <link href="assets/img/gallery/logo.png" rel="icon">


  <!--chart-->
   <link rel="stylesheet" href="plugins/morris/morris.css">
   <script src="plugins/jquery.min/jquery.min.js"></script>
   <script src="plugins/morris/raphael-min.js"></script>
   <script src="plugins/morris/morris.min.js"></script>

  <!--Preloader-->
  <link rel="stylesheet" href="dist/css/preloader.css">
  <script src="dist/js/preloader.js"></script>


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">

<div class="se-pre-con"></div>

<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #414FB7;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="customers.php" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="suppliers.php" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                Pemasok
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="category.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kategori Produk
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="orders.php" class="nav-link">
              <i class="nav-icon fas fa-sort-amount-up"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="expense.php" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Pengeluaran
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sales_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="expense_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pengeluaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="sales_chart.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Penjualan </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="expense_chart.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pengeluaran</p>
                </a>
              </li>

            </ul>
          </li>

          
          
          <li class="nav-item">
              <a href="products.php" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                      Pengaturan
                      <i class="right fas fa-angle-left"></i>
                    </p>
              </a>
                
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="shop_information.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informasi Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_users.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
                  <a href="upgrade.php" class="nav-link">
                    <i class="nav-icon fas fa-paper-plane"></i>
                    <p>
                      Upgrade
                    </p>
                  </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>

          &ensp;
          &ensp;


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">


                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row mt--5">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-upgrade">
            <div class="card-header text-center border-bottom-0">
              <h4 class="card-title font-weight-bold text-primary"  style="color: #414FB7;">KAKAPOS UPGRADE PREMIUM</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="table-responsive table-upgrade">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th class="text-center">GRATIS</th>
                      <th class="text-center">PREMIUM SPESIAL</th>
                      <th class="text-center">PREMIUM
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Jumlah Produk</td>
                      <td class="text-center">25</td>
                      <td class="text-center">Unlimited</td>
                      <td class="text-center">Unlimited</td>
                    </tr>
                    <tr>
                      <td>Jumlah Akun</td>
                      <td class="text-center">1</td>
                      <td class="text-center">5</td>
                      <td class="text-center">5</td>
                    </tr>
                    <tr>
                      <td>Logo Struk</td>
                      <td class="text-center">Logo Kakapos</td>
                      <td class="text-center">Logo Pribadi</td>
                      <td class="text-center">Logo Pribadi</td>
                    </tr>
                    <tr>
                      <td>Pelaporan</td>
                      <td class="text-center"><i class="ni ni-fat-remove text-danger"></i></td>
                      <td class="text-center"><i class="ni ni-check-bold text-success"></i></td>
                      <td class="text-center"><i class="ni ni-check-bold text-success"></i></td>
                    </tr>

                      <td>Harga</td>
                      <td class="text-center">Gratis</td>
                      <td class="text-center">Rp 100000 / Tahun</td>
                      <td class="text-center">Rp 10000 / Bulan</td>
                    </tr>
                    <tr>
                      <td class="text-center"></td>
                      <td class="text-center">
                        <a href="#" class="btn btn-round btn-default disabled">Versi Saat ini</a>
                      </td>
                      <td class="text-center">
                        <a target="_blank" href="" class="btn btn-round btn-primary">Upgrade</a>
                      </td>
                      <td class="text-center">
                        <a target="_blank" href="" class="btn btn-round btn-primary">Upgrade</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </section>
        <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>

</body>
</html>
