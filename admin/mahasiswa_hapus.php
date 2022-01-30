<?php 
include '../koneksi.php';
$id_mhs  = $_GET['id'];

$mhs = mysqli_query($koneksi,"select * from user inner join mahasiswa on mahasiswa.id_user = user.user_id where mahasiswa.id_mhs='$id_mhs'");
$p = mysqli_fetch_assoc($mhs);
$id = $p['user_id'];

mysqli_query($koneksi, "delete from user where user_id='$id'");
// mysqli_query($koneksi, "delete from mahasiswa where id_mhs='$id_mhs'");
header("location:mahasiswa.php");