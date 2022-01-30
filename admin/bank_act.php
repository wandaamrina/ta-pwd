<?php 
include '../koneksi.php';
$saldo  = $_POST['saldo'];

mysqli_query($koneksi, "insert into bank values (NULL,'$saldo')");
header("location:bank.php");