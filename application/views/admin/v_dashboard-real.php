
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size:40px;">
        <?= $judul ?> <?= $user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $isi ?></li>
      </ol>
    </section>


<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $get_bacaan ?></h3>

              <p>Buku Bacaan yang sedang dipinjam</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?= base_url('siswa/pinjam_bacaan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $kembali_bacaan ?></h3>

              <p>Buku Bacaan yang telah dikembalikan</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?= base_url('siswa/kembali_bacaan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $get_paket ?></h3>

              <p>Buku Paket yang sedang dipinjam</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?= base_url('siswa/pinjam_paket') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $kembali_paket ?></h3>

              <p>Buku Paket yang telah dikembalikan</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?= base_url('siswa/kembali_paket') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>



      <!-- /.row -->
      <!-- Main row -->
      
    <br>
    <br>
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-left" >
                <thead>
                <tr>
                  <th width="10%">No</th>
                  <th width="50%">Judul</th>
                  <th width="20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                    foreach ($data_berita  as $row) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->judul ?></td>
                        <td>
                        <a href="<?= base_url()?>siswa/dashboard/lihat_berita/<?= $row->id; ?>" class="btn btn-warning btn-xs">Lihat</a>
                        </td>
                      </tr>
                    <?php  } ?>
            </tbody>
              </table>
            </div>
     </div>


      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
