<?php 
include '../koneksi.php';
session_start();
// $id_vaksinasi  = $_POST['id_vaksinasi'];
$tgl_vaksin = $_POST['tgl_vaksin'];
$id_vaksin  = $_POST['jenis_vaksin'];
$nik        = $_POST['nik'];
$nim       = $_POST['nim'];

$mhs = mysqli_query($koneksi,"select * from mahasiswa where nim_mhs='$nim'");
$p = mysqli_fetch_assoc($mhs);
$id = $p['id_mhs'];

$find = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nik='$nik' and id_mhs!='$id'");
$cek = mysqli_num_rows($find);

$find1 = mysqli_query($koneksi, "SELECT * FROM vaksinasi WHERE id_mhs='$id' and id_vaksin='$id_vaksin'");
$cek1 = mysqli_num_rows($find1);

if($cek > 0){
	header("location:index.php?nik=error"); 
}else if($cek1 > 0){
	header("location:index.php?nik=done"); 
}else{
    mysqli_query($koneksi, "update mahasiswa SET status_vaksinasi='SUDAH', nik='$nik' where id_mhs='$id'");

    mysqli_query($koneksi, "insert into vaksinasi values (NULL,'$tgl_vaksin','$id','$id_vaksin')");
    header("location:vaksinasi.php");

}

