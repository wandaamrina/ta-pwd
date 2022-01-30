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
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Mahasiswa
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="mahasiswa_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>NIM Mahasiswa</label>
                        <input type="text" name="nim_mhs" required="required" class="form-control" placeholder="NIM Mahasiswa ..">
                      </div>
                      <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" required="required" class="form-control" placeholder="Nama Mahasiswa ..">
                      </div>
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" required="required" class="form-control" placeholder="NIK ..">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_mhs" required="required" class="form-control" placeholder="Alamat ..">
                      </div>
                      <div class="form-group">
                        <label>Status Vaksinasi</label>
                        <input type="text" name="status_vaksinasi" required="required" class="form-control" placeholder="Status Vaksinasi ..">
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


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>NIK</th>
                    <th>ALAMAT</th>
                    <th>STATUS VAKSINASI</th>
                    <th width="10%">OPSI</th>
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
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nim_mhs']; ?></td>
                      <td><?php echo $d['nama_mhs']; ?></td>
                      <td><?php echo $d['nik']; ?></td>
                      <td><?php echo $d['alamat_mhs']; ?></td>
                      <td><?php echo $d['status_vaksinasi']; ?></td>
                      <td>     
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