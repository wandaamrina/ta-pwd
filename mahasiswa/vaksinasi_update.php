<?php 
include '../koneksi.php';
$id_vaksinasi  = $_POST['id_vaksinasi'];
$tgl_vaksin  = $_POST['tgl_vaksin'];

mysqli_query($koneksi, "update vaksinasi set id_vaksinasi='$id_vaksinasi', tgl_vaksin='$tgl_vaksin' where id_vaksinasi='$id_vaksinasi'") or die(mysqli_error($koneksi));
header("location:vaksinasi.php");