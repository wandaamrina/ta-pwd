 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Sistem Pendataan Vaksinasi Mahasiswa UAD</title>

</head>
<body>

  <style type="text/css">

  </style>

  <center>
    <h4>LAPORAN <br/> Sistem Pendataan Vaksin Mahasiswa UAD</h4>
  </center>

  <?php 
  include '../koneksi.php';
  // error_reporting(0);
  error_reporting(E_ALL ^ E_DEPRECATED);
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['jenis_vaksin'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    $jenis_vaksin = $_GET['jenis_vaksin'];
    ?>

    <table>
      <tr>
        <th width="25%">DARI TANGGAL</th>
        <th width="5%">:</th>
        <td><?php echo date('d-m-Y',strtotime($tgl_dari)); ?></td>
      </tr>
      <tr>
        <th>SAMPAI TANGGAL</th>
        <th>:</th>
        <td><?php echo date('d-m-Y',strtotime($tgl_sampai)); ?></td>
      </tr>
      <tr>
        <th>JENIS VAKSIN</th>
        <th>:</th>
        <td><?php 
        if($jenis_vaksin== "semua"){
          echo "SEMUA JENIS VAKSIN";
        }else{
          $k = mysqli_query($koneksi,"select * from vaksin where id_vaksin='$jenis_vaksin'");
          $kk = mysqli_fetch_assoc($k);
          echo $kk['jenis_vaksin'];
        }
        ?></td>
      </tr>
    </table>

    <br/>

    <table border="1" style="width: 100%">
      <tr>
        <th rowspan="2">NO</th>
        <th rowspan="2">TANGGAL</th>
        <th rowspan="2">NIM</th>
        <th rowspan="2">NAMA</th>
        <th rowspan="2">JENIS VAKSIN</th>
        <th rowspan="2">DOSIS</th>
      </tr>
      <?php 
      
      $no=1;
      $total_pemasukan=0;
      $total_pengeluaran=0;
      if($jenis_vaksin == "semua"){
        $data = mysqli_query($koneksi,"SELECT * FROM vaksin inner join vaksinasi on vaksin.id_vaksin = vaksinasi.id_vaksin inner join mahasiswa on mahasiswa.id_mhs = vaksinasi.id_mhs");
      }else{
        $data = mysqli_query($koneksi,"SELECT * FROM vaksin,vaksinasi,mahasiswa where id_vaksin= vaksinasi.id_vaksin and vaksinasi.id_mhs = mahasiswa.id_mhs and status_vaksinasi='SUDAH' and jenis_vaksin='$jenis_vaksin' where id_vaksin='$jenis_vaksin'");
      }
      while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
          <td><?php echo $d['nim_mhs']; ?></td>
          <td><?php echo $d['nama_mhs']; ?></td>
          <td><?php echo $d['jenis_vaksin']; ?></td>
          <td><?php echo $d['dosis']; ?></td>
        </tr>
        <?php 
      }
      ?>
      <tr>
        <th colspan="4" class="text-right">TOTAL MAHASISWA YANG SUDAH DIVAKSIN</th>
        <td class="text-center text-bold text-success"><?php echo $no; ?></td>
      </tr>
    </table>

    <?php 
  }else{
    ?>

    <div class="alert alert-info text-center">
      Silahkan Filter Laporan Terlebih Dulu.
    </div>

    <?php
  }
  ?>

  <?php 
  require_once '../library/dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $dompdf = new Dompdf(); 
  $dompdf->loadHtml(ob_get_clean());
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render();
  $dompdf->stream("Laporan.pdf");    
  ?>

  <?php 
  // require_once("../library/dompdf/dompdf_config.inc.php");
  // $dompdf = new DOMPDF();
  // $dompdf->load_html(ob_get_clean());
  // $dompdf->set_paper("A4", 'portrait');
  // $dompdf->render();
  // $dompdf->stream("Laporan.pdf");    
  ?>

</body>
</html>
