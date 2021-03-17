<?php
session_start();
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

  <title>Grafik Pengeluaran </title>
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
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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


                <li class="nav-item has-treeview menu-open">
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
                        <a href="expense_chart.php" class="nav-link active">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold text-primary" style="color: #414FB7;"">Grafik Pengeluaran</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">




        <?php

        include ('db_connect.php');
        include ('my_function.php');
        $currency=getCurrency();

        ?>




            <div class="col-lg-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title font-weight-bold text-primary" style="color: #414FB7;"">Jumlah Total Pengeluaran</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">

                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg"><?php echo $currency.' '.getTotalExpense()?></span>
                      <span>Total Pengeluaran</span>
                    </p>

                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <div id="monthly_expense_graph" style="height: 250px;"></div>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Tahun <?php echo date("Y") ?>
                  </span>


                  </div>
                </div>
              </div>
            </div>
              <!-- /.card -->



              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title font-weight-bold text-primary" style="color: #414FB7;"">Jumlah Total Pengeluaran</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">

                      <p class="d-flex flex-column">
                        <span class="text-bold text-lg"><?php echo $currency.' '.getTotalExpense()?></span>
                        <span>Total Pengeluaran</span>
                      </p>

                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                      <div id="monthly_expense_graph_barchart" style="height: 250px;"></div>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Tahun <?php echo date("Y") ?>
                  </span>


                    </div>
                  </div>
                </div>
                <!-- /.card -->


        </div>


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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



<script>

  <?php
  //set default time zone
  date_default_timezone_set("Asia/Dhaka");

  //get current timedate
  $current_time=date("h:i A");
  //get current date
  $current_date=date("Y/m/d");
  $current_year = date("Y");
  ?>
  new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'monthly_expense_graph',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { month: 'Jan', value: <?php echo getMonthlyExpense('01',$current_year)?>},
      { month: 'Feb', value:  <?php echo getMonthlyExpense('02',$current_year)?>},
      { month: 'Mar', value:  <?php echo getMonthlyExpense('03',$current_year)?>},
      { month: 'Apr', value:  <?php echo getMonthlyExpense('04',$current_year)?>},
      { month: 'May', value: <?php echo getMonthlyExpense('05',$current_year)?>},
      { month: 'Jun', value:  <?php echo getMonthlyExpense('06',$current_year)?>},
      { month: 'Jul', value:  <?php echo getMonthlyExpense('07',$current_year)?>},
      { month: 'Aug', value:  <?php echo getMonthlyExpense('08',$current_year)?>},
      { month: 'Sep', value:  <?php echo getMonthlyExpense('09',$current_year)?>},
      { month: 'Oct', value:  <?php echo getMonthlyExpense('10',$current_year)?>},
      { month: 'Nov', value:  <?php echo getMonthlyExpense('11',$current_year)?>},
      { month: 'Dec', value:  <?php echo getMonthlyExpense('12',$current_year)?>}
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'month',
    parseTime: false,
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['<?php echo $currency?>']
  });


</script>



<script>

  <?php
  //set default time zone
  date_default_timezone_set("Asia/Dhaka");

  //get current timedate
  $current_time=date("h:i A");
  //get current date
  $current_date=date("Y/m/d");
  $current_year = date("Y");
  ?>
  new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'monthly_expense_graph_barchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { month: 'Jan', value: <?php echo getMonthlyExpense('01',$current_year)?>},
      { month: 'Feb', value:  <?php echo getMonthlyExpense('02',$current_year)?>},
      { month: 'Mar', value:  <?php echo getMonthlyExpense('03',$current_year)?>},
      { month: 'Apr', value:  <?php echo getMonthlyExpense('04',$current_year)?>},
      { month: 'May', value: <?php echo getMonthlyExpense('05',$current_year)?>},
      { month: 'Jun', value:  <?php echo getMonthlyExpense('06',$current_year)?>},
      { month: 'Jul', value:  <?php echo getMonthlyExpense('07',$current_year)?>},
      { month: 'Aug', value:  <?php echo getMonthlyExpense('08',$current_year)?>},
      { month: 'Sep', value:  <?php echo getMonthlyExpense('09',$current_year)?>},
      { month: 'Oct', value:  <?php echo getMonthlyExpense('10',$current_year)?>},
      { month: 'Nov', value:  <?php echo getMonthlyExpense('11',$current_year)?>},
      { month: 'Dec', value:  <?php echo getMonthlyExpense('12',$current_year)?>}
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'month',
    parseTime: false,
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['<?php echo $currency?>']
  });


</script>

</body>
</html>
