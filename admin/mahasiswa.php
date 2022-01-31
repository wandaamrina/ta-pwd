<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">Data Mahasiswa</h1>

    <ol class="breadcrumb">
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <div class="btn-group pull-left">          
              <a href="mahasiswa_json.php" class="btn btn-success btn-sm pull-right">JSON</a>
              <a href="mahasiswa_xml.php" class="btn btn-danger btn-sm pull-right">XML</a>
            </div>
            <div class="btn-group pull-right">            
              <a href="mahasiswa_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Mahasiswa</a> 
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%" class="text-center">NO</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">STATUS VAKSINASI</th>
                    <th width="10%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM mahasiswa ORDER BY nim_mhs ASC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['nim_mhs']; ?></td>
                      <td><?php echo $d['nama_mhs']; ?></td>
                      <td><?php echo $d['nik']; ?></td>
                      <td><?php echo $d['alamat_mhs']; ?></td>
                      <td class="text-center"><?php echo $d['status_vaksinasi']; ?></td>
                      <td class="text-center">     
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_mhs_<?php echo $d['id_mhs'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_mhs_<?php echo $d['id_mhs'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <form action="mahasiswa_update.php" method="post">
                          <div class="modal fade" id="edit_mhs_<?php echo $d['id_mhs'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%">
                                    <label>Status Vaksinasi</label>
                                    <input type="hidden" name="id_mhs" required="required" class="form-control" placeholder="Status Vaksinasi .." value="<?php echo $d['id_mhs']; ?>">
                                    <input type="text" name="status_vaksinasi" required="required" class="form-control" placeholder="Status Vaksinasi .." value="<?php echo $d['status_vaksinasi']; ?>" style="width:100%">
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_mhs_<?php echo $d['id_mhs'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="mahasiswa_hapus.php?id=<?php echo $d['id_mhs'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>