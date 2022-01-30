<?php 
include '../koneksi.php';
$nim_mhs  = $_POST['nim_mhs'];
$username  = $_POST['nim_mhs'];
$pass  = $_POST['nim_mhs'];
$nama_mhs  = $_POST['nama_mhs'];
$nik  = $_POST['nik'];
$alamat_mhs  = $_POST['alamat_mhs'];
$status_vaksinasi  = $_POST['status_vaksinasi'];


mysqli_query($koneksi, "insert into user values (NULL,'$username','$pass','mahasiswa')");
$mhs = mysqli_query($koneksi,"select * from user where user_username='$username'");
$p = mysqli_fetch_assoc($mhs);
$id = $p['user_id'];

mysqli_query($koneksi, "insert into mahasiswa values (NULL,'$nim_mhs','$nama_mhs','$nik','$alamat_mhs','$status_vaksinasi','$id')");
header("location:mahasiswa.php");
