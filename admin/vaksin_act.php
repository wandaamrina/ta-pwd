<?php 
include '../koneksi.php';
$jenis_vaksin  = $_POST['jenis_vaksin'];
$dosis = $_POST['dosis'];

$rand = rand();


	mysqli_query($koneksi, "insert into vaksin values (NULL,'$jenis_vaksin','$dosis')");
	header("location:vaksin.php");


