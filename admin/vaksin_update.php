<?php 
include '../koneksi.php';
$id_vaksin  = $_POST['id_vaksin'];
$jenis_vaksin  = $_POST['jenis_vaksin'];
$dosis  = $_POST['dosis'];


 mysqli_query($koneksi, "update vaksin set jenis_vaksin='$jenis_vaksin', dosis='$dosis' where id_vaksin='$id_vaksin'") or die(mysqli_error($koneksi));
header("location:vaksin.php"); 