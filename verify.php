<?php
include('db_connect.php');

//$id = $_GET['id'];
//$t = $_GET['token']; 

$token=$_GET['t'];
$sql_cek=mysqli_query($con,"SELECT * FROM users WHERE token='".$token."' ");

$jml_data = mysqli_num_rows($sql_cek);

    if($jml_data > 0 ){
        mysqli_query($con,"UPDATE users SET verifikasi = 'Aktif' WHERE token='".$t."' ");
        echo 'Registrasi berhasil, silahkan login di Link berikut <a href="login.php">Login</a>';
    
    } else {
        echo "Verifikasi Gagal :(";
    }

?>