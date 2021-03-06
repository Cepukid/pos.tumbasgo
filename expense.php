<?php
session_start();
$shop_type = $_SESSION['shop_type'];
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pengeluaran</title>
    <link href="assets/img/gallery/logo.png" rel="icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="plugins/jquery.min/jquery.min.js"></script>

    <!--Preloader-->
    <link rel="stylesheet" href="dist/css/preloader.css">
    <script src="dist/js/preloader.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!--For data export and print button css-->
    <link rel="stylesheet" href="dist/css/buttons.dataTables.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
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
            <img src="dist/img/AdminLTELogo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->

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
                    <a href="expense.php" class="nav-link active">
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
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <button type="button" onclick="location.href = 'add_expense.php';"
                                    class="btn btn-primary float-right"><i class='fas fa-plus-circle'></i> Tambah Pengeluaran
                            </button>
                            <h3 class="card-title font-weight-bold text-primary" style="color: #414FB7;">Informasi Pengeluaran</h3>

                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengeluaran</th>
                                    <th>Catatan Pengeluaran</th>
                                    <th>Jumlah Pengeluaran</th>
                                    <th>Waktu Pengeluaran</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <?php
                                    $user_type = $_SESSION['user_type'];
                                    $shop_id = $_SESSION['shop_id'];
                                    if ($user_type == 'admin') {


                                        ?>
                                        <th>Aksi</th>

                                        <?php
                                    }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                include('db_connect.php');
                                include('my_function.php');
                                $currency = getCurrency();

                                $sql = "SELECT * FROM expense WHERE shop_id=$shop_id ORDER BY expense_id DESC";
                                $result = mysqli_query($con, $sql);
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";

                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row['expense_name'] . "</td>";
                                    echo "<td>" . $row['expense_note'] . "</td>";
                                    echo "<td>" . $currency . $row['expense_amount'] . "</td>";
                                    echo "<td>" . date('h:i A ', strtotime($row['expense_time'])) . "</td>";
                                    echo "<td>" . date('d F, Y', strtotime($row['expense_date'])) . "</td>";

                                    if ($user_type=='admin') {
                                        echo "<td><a class='btn btn-primary'  href=\"edit_expense.php?id=" . $row['expense_id'] . "\" ><i class='fas fa-edit'></i></a> ";
                                        echo "<a class='confirmation btn btn-danger'  href=\"delete_expense.php?id=" . $row['expense_id'] . "\" ><i class='fas fa-trash'></i></a></td>";
                                    }

                                    $i++;

                                    echo "</tr> ";
                                }

                                echo " </tbody>";
                                echo " </table>";

                                ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- page script for export data from data tables -->
<script>
var shop_type = "<?php echo $shop_type; ?>";

$(function() {
    if(shop_type=="premium"){
        $("#example1").DataTable({

            "responsive": true,
            "autoWidth": true,

            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'pdfHtml5',

                    exportOptions: {
                        columns: [0, 1]
                    }
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1]
                    }
                },


            ]
        });
    }
});
</script>

<script>
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>


<!--For data export and print-->
<script src="plugins/buttons/dataTables.buttons.min.js"></script>
<script src="plugins/buttons/jszip.min.js"></script>
<script src="plugins/buttons/pdfmake.min.js"></script>
<script src="plugins/buttons/vfs_fonts.js"></script>
<script src="plugins/buttons/buttons.html5.min.js"></script>
<script src="plugins/buttons/buttons.print.min.js"></script>
<!--For data export and print-->

</body>
</html>
