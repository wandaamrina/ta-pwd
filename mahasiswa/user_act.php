<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();


	mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password')");
	header("location:user.php");


