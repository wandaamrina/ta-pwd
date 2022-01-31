<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$saldo  = $_POST['saldo'];


 mysqli_query($koneksi, "update bank set bank_saldo='$saldo' where bank_id='$id'") or die(mysqli_error($koneksi));
header("location:bank.php"); 