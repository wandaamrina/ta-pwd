<?php 
include '../koneksi.php';
$id_mhs  = $_POST['id_mhs'];
$status_vaksinasi  = $_POST['status_vaksinasi'];

mysqli_query($koneksi, "update mahasiswa SET status_vaksinasi='$status_vaksinasi' where id_mhs='$id_mhs'");
header("location:mahasiswa.php");