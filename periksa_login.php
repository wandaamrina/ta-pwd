<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");
$cek = mysqli_num_rows($login);
$level = mysqli_fetch_assoc($login);

if($cek > 0){

	session_start();
	// $data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $level['user_id'];
	$_SESSION['username'] = $level['user_username'];

	if($level['user_level'] == 'administrator'){
		$_SESSION['status'] = "administrator_logedin";
		header("location:admin/");
	}else{
		$_SESSION['status'] = "mhs_logedin";
		header("location:mahasiswa/");
	}
	
}else{
	header("location:index.php?alert=gagal");
}
