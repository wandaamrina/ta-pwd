<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">
      Informasi Vaksin
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Vaksin
              </button>
            </div>
          </div>
        
          <div class="box-body">
            
            <!-- Modal -->
            <form action="vaksin_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Vaksin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Jenis Vaksin</label>
                        <input type="text" name="jenis_vaksin" required="required" class="form-control" placeholder="Jenis Vaksin ..">
                      </div>
                      <div class="form-group">
                        <label>Dosis</label>
                        <input type="number" name="dosis" required="required" class="form-control" placeholder="Dosis ..">
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
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Vaksin</th>
                    <th>Dosis</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM vaksin");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $d['jenis_vaksin']; ?></td>
                      <td><?php echo $d['dosis']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_vaksin_<?php echo $d['id_vaksin'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>
                        
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_vaksin_<?php echo $d['id_vaksin'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <form action="vaksin_update.php" method="post">
                          <div class="modal fade" id="edit_vaksin_<?php echo $d['id_vaksin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Vaksin</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Jenis Vaksin</label>
                                    <input type="hidden" name="id_vaksin" required="required" class="form-control" placeholder=".." value="<?php echo $d['id_vaksin']; ?>">
                                    <input type="text" name="jenis_vaksin" style="width:100%" required="required" class="form-control" placeholder="Jenis Vaksin  .." value="<?php echo $d['jenis_vaksin']; ?>">
                                  </div>
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Dosis</label>
                                    <input type="number" name="dosis" style="width:100%" required="required" class="form-control" placeholder="Dosis  .." value="<?php echo $d['dosis']; ?>">
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
                        <div class="modal fade" id="hapus_vaksin_<?php echo $d['id_vaksin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="vaksin_hapus.php?id=<?php echo $d['id_vaksin'] ?>" class="btn btn-primary">Hapus</a>
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
            </div> <!-- responsive -->
          </div> <!-- body -->
                </div>
        </div><!-- row -->
      </section>

</div>
<?php include 'footer.php'; ?>