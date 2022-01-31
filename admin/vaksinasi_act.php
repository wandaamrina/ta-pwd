<?php 
include '../koneksi.php';
// $id_vaksinasi  = $_POST['id_vaksinasi'];
$tgl_vaksin  = $_POST['tgl_vaksin'];
$nim  = $_POST['nim_mhs'];
$id_vaksin  = $_POST['jenis_vaksin'];

$mhs = mysqli_query($koneksi,"select * from mahasiswa where nim_mhs='$nim'");
$p = mysqli_fetch_assoc($mhs);
$id = $p['id_mhs'];

mysqli_query($koneksi, "insert into vaksinasi values (NULL,'$tgl_vaksin','$id','$id_vaksin')");
header("location:vaksinasi.php");
