 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Sistem Pendataan Vaksin Mahasiswa UAD</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 </head>
 <body>

 	<center>
 		<h4>LAPORAN</h4>
 		<h4>SISTEM PENDATAAN VAKSIN MAHASISWA UAD</h4>
 	</center>


 	<?php 
 	include '../koneksi.php';
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['jenis_vaksin'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		$jenis_vaksin = $_GET['jenis_vaksin'];
 		?>

 		<div class="row">
 			<div class="col-lg-6">
 				<table class="table table-bordered">
 					<tr>
 						<th width="30%">DARI TANGGAL</th>
 						<th width="1%">:</th>
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
 						<td>
 							<?php 
 							if($jenis_vaksin == "semua"){
 								echo "SEMUA JENIS VAKSIN";
 							}else{
 								$k = mysqli_query($koneksi,"select * from vaksin where id_vaksin='$jenis_vaksin'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['jenis_vaksin'];
 							}
 							?>

 						</td>
 					</tr>
 				</table>

 			</div>
 		</div>

 		<div class="table-responsive">
 			<table class="table table-bordered table-striped">
 				<thead>
 					<tr>
 						<th width="1%" rowspan="2">NO</th>
 						<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
 						<th rowspan="2" class="text-center">NIM</th>
 						<th rowspan="2" class="text-center">NAMA</th>
 						<th rowspan="2" class="text-center">JENIS VAKSIN</th>
 						<th rowspan="2" class="text-center">DOSIS</th>
 					</tr>
 				</thead>
 				<tbody>
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
							<td class="text-center"><?php echo $no++; ?></td>
                        	<td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_vaksin'])); ?></td>
                        	<td><?php echo $d['nim_mhs']; ?></td>
                        	<td><?php echo $d['nama_mhs']; ?></td>
                        	<td><?php echo $d['jenis_vaksin']; ?></td>
                        	<td><?php echo $d['dosis']; ?></td>
                      </tr>
 						<?php 
 					}
 					?>
 					<tr>
 						<th colspan="4" class="text-right">TOTAL</th>
 						<td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($no)." ,-"; ?></td>
 					</tr>
 				</tbody>
 			</table>



 		</div>

 		<?php 
 	}else{
 		?>

 		<div class="alert alert-info text-center">
 			Silahkan Filter Laporan Terlebih Dulu.
 		</div>

 		<?php
 	}
 	?>


 	<script>

 		window.print();
 		
 	</script>

 </body>
 </html>
