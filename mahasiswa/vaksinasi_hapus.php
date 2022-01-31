<?php 
include '../koneksi.php';
$id_vaksinasi  = $_GET['id_vaksinasi'];


mysqli_query($koneksi, "delete from vaksinasi where id_vaksinasi='$id_vaksinasi'");
header("location:vaksinasi.php");