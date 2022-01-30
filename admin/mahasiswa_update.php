<?php 
include '../koneksi.php';
$id_mhs  = $_POST['id_mhs'];
$nama_mhs  = $_POST['nama_mhs'];

mysqli_query($koneksi, "update mahasiswa set nama_mhs='$nama_mhs' where id_mhs='$id_mhs'");
header("location:mahasiswa.php");