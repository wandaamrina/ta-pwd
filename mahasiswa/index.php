<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 style="margin-top: 20px"  align="center"> Grafik Vaksinasi Mahasiswa </h1><br>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $mhs = mysqli_query($koneksi,"SELECT count(id_mhs) as total_mhs FROM mahasiswa");
            $p = mysqli_fetch_assoc($mhs);
            ?>
            <h4 style="font-weight: bolder"><?php echo $p['total_mhs'] ?></h4>
            <p>Jumlah Mahasiswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $mhs = mysqli_query($koneksi,"SELECT count(id_mhs) as total_mhs FROM mahasiswa where status_vaksinasi='SUDAH'");
            $p = mysqli_fetch_assoc($mhs);
            ?>
            <h4 style="font-weight: bolder"><?php echo $p['total_mhs'] ?></h4>
            <p>Mahasiswa yang sudah divaksin</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $mhs = mysqli_query($koneksi,"SELECT count(id_mhs) as total_mhs FROM mahasiswa where status_vaksinasi='BELUM'");
            $p = mysqli_fetch_assoc($mhs);
            ?>
            <h4 style="font-weight: bolder"><?php echo $p['total_mhs'] ?></h4>
            <p>Mahasiswa yang belum divaksin</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs pull-right">
            <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
            <li class="active"><a href="#tab1" data-toggle="tab">Vaksinasi Mahasiswa</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Grafik Data Vaksinasi Mahasiswa</h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/

            </div>
          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->



  </section>

</div>


<?php include 'footer.php'; ?>