<?php
session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
	echo " ";
else {
	header("location:index.php");

}

include ('db_connect.php');

$id=$_GET['id'];

$delete=mysqli_query($con,"DELETE FROM income WHERE income_id='$id'");

if($delete)
{
	echo "<script>alert('Pemasukan Terhapus!')</script>";
	echo "<script>window.open('income.php','_self')</script>";
}

else
{
	echo "<script>alert('Gagal!')</script>";
	echo "<script>window.open('incomee.php','_self')</script>";
}


?>