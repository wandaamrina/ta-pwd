<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
if(isset($nama)){
	if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
		header("location:user_tambah.php?nama=error"); 
	}else{
		mysqli_query($koneksi, "insert into user values (NULL,'$username','$password','administrator')");
		$mhs = mysqli_query($koneksi,"select * from user order by user_id desc limit 1");
		$p = mysqli_fetch_assoc($mhs);
		$id = $p['user_id'];

		mysqli_query($koneksi, "insert into admin values (NULL,'$nama','','$id')");
		header("location:user.php");
	}
}


$rand = rand();


