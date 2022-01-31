<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">Data Vaksinasi</h1>
    <ol class="breadcrumb">
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <center><h3 class="box-title">Tambah Data Vaksinasi</h3></center><br>
            <?php 
                if(isset($_GET['nik'])){
                  if($_GET['nik'] == "done"){
                    echo "<p style='color:red'>Pendaftaran data vaksinaasi telah dilakukan !</p>";
                  }
                }
            ?> 
          </div>
          <div class="box-body">
            <form action="vaksinasi_act.php" method="post" enctype="multipart/form-data">
              <?php 
                $id_user = $_SESSION['id'];
                $profil = mysqli_query($koneksi,"select * from mahasiswa where id_user='$id_user'");
                $profil = mysqli_fetch_assoc($profil);
              ?>
              <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" required="required" class="form-control" value="<?php echo $profil['nim_mhs']; ?>" readonly>
              </div>

              <div class="form-group">
                <label>NIK</label>
                <input type="number" name="nik" required="required" class="form-control" value="<?php echo $profil['nik']; ?>" placeholder="<?php if($profil['nik'] == '-'){ echo "Masukkan NIK Mahasiswa .."; }else{ echo $profil['nik']; }  ?>">
                <?php 
                if(isset($_GET['nik'])){
                  if($_GET['nik'] == "error"){
                    echo "<p style='color:red'>NIK sudah terdaftar !</p>";
                  }
                }
                ?>
              </div>
              
              <div class="form-group">
                <label>Tanggal Vaksin</label>
                <input type="date" name="tgl_vaksin" required="required" class="form-control" placeholder="Pilih tanggal vaksinasi ..">
              </div>

              <div class="form-group">
                <label>Jenis Vaksin</label>
                <!-- <input type="number" name="nominal" required="required"  placeholder="Masukkan ID Vaksin .."> -->
                <select name="jenis_vaksin" class="form-control">
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM vaksin ORDER BY id_vaksin ASC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $d['id_vaksin']; ?>"><?php echo $d['jenis_vaksin']."  dosis ".$d['dosis']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <center><button type="submit" class="btn btn-primary">Simpan</button></center>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>