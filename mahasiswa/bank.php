<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 align="center">
      Informasi Saldo Anisah Studio
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SALDO</th>
                    <th width="10%">EDIT SALDO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM bank");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo "Rp. ".number_format($d['bank_saldo'])." ,-"; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_bank_<?php echo $d['bank_id'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>
                        <form action="bank_update.php" method="post">
                          <div class="modal fade" id="edit_bank_<?php echo $d['bank_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit bank</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Edit Jumlah Saldo </label>
                                    <label>Nama bank</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama bank .." value="<?php echo $d['bank_id']; ?>">
                                    <input type="number" name="saldo" style="width:100%" required="required" class="form-control" placeholder="Saldo  .." value="<?php echo $d['bank_saldo']; ?>">
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
      
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div> <!-- responsive -->
          </div> <!-- body -->

        </div><!-- row -->
      </section>

</div>
<?php include 'footer.php'; ?>