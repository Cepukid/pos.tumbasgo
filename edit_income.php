<?php
session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:login.php");

}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $getid = $_GET['id'];
  include('db_connect.php');

  if (!empty($getid)) {
    $query = mysqli_query($con, "SELECT * FROM income WHERE income_id='$getid'");
    $row = mysqli_fetch_assoc($query);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include('db_connect.php');

  $income_id = $_POST['income_id'];
  $income_name = $_POST['income_name'];
  $income_note = $_POST['income_note'];
  $income_amount = $_POST['income_amount'];
  $income_time = date('h:i A ', strtotime($_POST['income_time']));
  $income_date = $_POST['income_date'];
  $shop_id = $_SESSION['shop_id'];


  $query = mysqli_query($con, "SELECT * FROM income WHERE income_id='$income_id'");
  $row = mysqli_fetch_assoc($query);

  if (mysqli_query($con, "UPDATE income SET income_name='$income_name',income_note = '$income_note',income_amount='$income_amount',income_time='$income_time',income_date='$income_date' WHERE income_id='$income_id'")) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire("Update berhasil!","Done!","success");';
    echo '}, 500);</script>';

    echo '<script type="text/javascript">';
    echo "setTimeout(function () { window.open('income.php','_self')";
    echo '}, 1500);</script>';

  } else {// display the error message
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire("ERROR!","Something Wrong!","error");';
    echo '}, 500);</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Pemasukkan</title>
  <link href="assets/img/gallery/logo.png" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="plugins/jquery.min/jquery.min.js"></script>

  <!--Preloader-->
  <link rel="stylesheet" href="dist/css/preloader.css">
  <script src="dist/js/preloader.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

  <!-- Bootstrap core CSS     -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                    <a href="expense.php" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Pengeluaran
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="income.php" class="nav-link active">
                    <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                        Pemasukan
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
                        <a href="income_report.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Pemasukan</p>
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
                    <li class="nav-item">
                        <a href="income_chart.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Grafik Pemasukan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="labachart.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Grafik Laba</p>
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

              <h3 class="card-title font-weight-bold text-primary" style="color: #414FB7;">Update Informasi Pemasukan</h3>

            </div>


            <form role="form" id="quickForm" method="post" action="edit_income.php">
              <div class="card-body">


                <div class="form-group">
                  <input type="hidden" name="income_id" class="form-control" id="exampleInputexpenseId"
                         value="<?php echo $row['income_id'] ?>">
                </div>


                <div class="form-group">
                  <label for="exampleInputexpenseName">Nama Pemasukan</label>
                  <input type="text" name="income_name" class="form-control" id="exampleInputexpenseName"
                         value="<?php echo $row['income_name'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputNote">Catatan Pemasukan</label>
                  <input type="text" name="income_note" class="form-control" id="exampleInputNote"
                         value="<?php echo $row['income_note'] ?>">
                </div>


                <div class="form-group">
                  <label for="exampleInputAmount">Jumlah Pemasukan</label>
                  <input type="number" name="income_amount" class="form-control" id="exampleInputAmount"
                         value="<?php echo $row['income_amount'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputTime">Waktu Pemasukan</label>
                  <input type="time" name="income_time" class="form-control" id="exampleInputTime"
                         value="<?php echo $row['income_time'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputDate">Tanggal Pemasukan</label>
                  <input type="date" name="income_date" class="form-control" id="exampleInputDate"
                         value="<?php echo $row['income_date'] ?>">
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" id="update_income" class=" btn btn-primary"><i class="fa fa-check-circle"></i> Update Pemasukan</button>
              </div>
            </form>


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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">

  $(document).on('click', '#update_income', function (e) {


    $('#quickForm').validate({
      rules: {

        income_name: {
          required: true
        },
        income_note: {
          required: true,
        },
        income_amount: {
          required: true
        },
        income_time: {
          required: true
        },
        income_date: {
          required: true
        },


      },
      messages: {
        income_name: {
          required: "Mohon masukkan Nama Pemasukan"
        },
        income_note: {
          required: "Mohon masukkan Catatan Pemasukan",
        },
        income_amount: {
          required: "Mohon masukkan Total Pemasukan"
        },
        income_time: {
          required: "Mohon masukkan Waktu Pemasukan"
        },

        income_date: {
          required: "Mohon masukkan Tanggal Pemasukan"
        },

      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

  });


</script>


<script type="text/javascript">

  $(document).on('click', '#update_income', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Want to update ?',
      text: 'Are you sure?',
      icon: 'warning',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Update it!',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {

        $('#quickForm').submit();

      }
    })

  });
</script>




</body>
</html>