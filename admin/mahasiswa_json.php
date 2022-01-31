<?php
// menghubungkan ke database
include '../koneksi.php';
// menampilkan data tabel mahasiswa berdasarkan urutan nim
$sql="select * from mahasiswa order by nim_mhs";
$tampil = mysqli_query($koneksi,$sql);
// jika data mahasiswa ditemukan > 0
if (mysqli_num_rows($tampil) > 0) {
    $no=1;
    // membuat variabel array response untuk menampung data mahasiswa
    $response = array();
    $response["data"] = array();
    //  perulangan untuk menampilkan data
    while ($r = mysqli_fetch_array($tampil)) {
        $h['nim_mhs'] = $r['nim_mhs'];
        $h['nama_mhs'] = $r['nama_mhs'];
        $h['nik'] = $r['nik'];
        $h['alamat_mhs'] = $r['alamat_mhs'];

        // array_Push() diperlakukanarraysebagai tumpukan, 
        // dan mendorong variabel yang diteruskan ke akhir array. 
        // Panjangnyaarray bertambah dengan jumlah variabel yang didorong.
        array_push($response["data"], $h);
    }
    // json_encode digunakan untuk mengubah tipe data yang didukung PHP
    // menjadi string berformat JSON untuk dikembalikan 
    // sebagai hasil dari operasi encode JSON .
    echo json_encode($response);
}else {
    $response["message"]="tidak ada data";
    echo json_encode($response);
}
?>