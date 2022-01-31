<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">
      Data Mahasiswa
    </h1>
    <ol class="breadcrumb">
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Tambah Mahasiswa</h3>
            <a href="mahasiswa.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="mahasiswa_act.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIM Mahasiswa</label>
                    <input type="number" name="nim_mhs" required="required" class="form-control" placeholder="NIM Mahasiswa ..">
                </div>
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" required="required" class="form-control" placeholder="Nama Mahasiswa ..">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_mhs" required="required" class="form-control" placeholder="Alamat ..">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>