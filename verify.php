<?php
include('db_connect.php');

$id = $_GET['id'];
$token = $_GET['token']; 

$update = "UPDATE users SET verifikasi = 'Aktif' WHERE id = '$id' AND token = '$token'";

    if (mysqli_query($con,$update)){
        echo 'Registrasi berhasil, silahkan login di Link berikut <a href="login.php">Login</a>';    
    } else {
        echo "Verifikasi Gagal :(" . mysqli_error($conn);
    }

mysqli_close($con);
?>