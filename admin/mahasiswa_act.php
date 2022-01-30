<?php 
include '../koneksi.php';
$nama_mhs  = $_POST['nama_mhs'];

mysqli_query($koneksi, "insert into nama_mhs values (NULL,'$nama_mhs')");
header("location:mahasiswa.php");