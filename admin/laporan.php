<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">LAPORAN PENDATAAN VAKSIN MAHASISWA UAD</h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Jenis Vaksin</label>
                    <select name="jenis_vaksin" class="form-control" required="required">
                          <?php 
                          include '../koneksi.php';
                          $no=1;
                          $data = mysqli_query($koneksi,"SELECT * FROM vaksin ORDER BY id_vaksin ASC");
                          ?>
                          <option value="semua">- Semua Jenis Vaksin -</option>
                          <?php
                          while($d = mysqli_fetch_array($data)){
                            ?>
                            <option value="<?php echo $d['id_vaksin']; ?>"><?php echo $d['jenis_vaksin']."  dosis ".$d['dosis']; ?></option>
                          <?php } ?>
                        </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pendataan Vaksin Mahasiswa UAD</h3>
          </div>
          <div class="box-body">
          
            <?php 
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
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
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

              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis_vaksin=<?php echo $jenis_vaksin ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp CETAK LAPORAN</a>
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
                    <!-- <tr>
                      <th class="text-center">PEMASUKAN</th>
                      <th class="text-center">PENGELUARAN</th>
                    </tr> -->
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
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
                      <th colspan="4" class="text-right">TOTAL MAHASISWA YANG SUDAH DIVAKSIN</th>
                      <td class="text-center text-bold text-success"><?php echo $no; ?></td>
                    </tr>
                
                  </tbody>
                </table>



              </div>

              <?php 
            }else{
              ?>

              <?php
            }
            ?>

          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>