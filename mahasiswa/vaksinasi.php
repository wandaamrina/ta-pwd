<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">Data Vaksinasi</h1>

    <ol class="breadcrumb">
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th width="1%">Tanggal Vaksin</th>
                    <th width="1%">Jenis Vaksin</th>
                    <th width="1%">Dosis</th>
                    <th width="10%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM vaksinasi inner join mahasiswa on  mahasiswa.id_mhs = vaksinasi.id_mhs inner join vaksin on vaksin.id_vaksin = vaksinasi.id_vaksin where mahasiswa.id_user = '$_SESSION[id]' ORDER BY id_vaksinasi ASC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d F Y', strtotime($d['tgl_vaksin'])); ?></td>
                      <td><?php echo $d['jenis_vaksin']; ?></td>
                      <td><?php echo $d['dosis']; ?></td>
                      <td>
                        <center>     
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_vaksinasi_<?php echo $d['id_vaksinasi'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_vaksinasi_<?php echo $d['id_vaksinasi'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                        </center>

                        <form action="vaksinasi_update.php" method="post">
                          <div class="modal fade" id="edit_vaksinasi_<?php echo $d['id_vaksinasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Vaksinasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%">
                                    <label>Tanggal Vaksinasi</label>
                                    <input type="hidden" name="id_vaksinasi" required="required" class="form-control" placeholder="Tanggal Vaksinasi .." value="<?php echo $d['id_vaksinasi']; ?>">
                                    <input type="text" name="tgl_vaksin" required="required" class="form-control" placeholder="Tanggal Vaksinasi .." value="<?php echo $d['tgl_vaksin']; ?>" style="width:100%">
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
                        <div class="modal fade" id="hapus_vaksinasi_<?php echo $d['id_vaksinasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="vaksinasi_hapus.php?id_vaksinasi=<?php echo $d['id_vaksinasi'] ?>" class="btn btn-primary">Hapus</a>
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