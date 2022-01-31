<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from vaksin where id_vaksin='$id'");
header("location:vaksin.php");
