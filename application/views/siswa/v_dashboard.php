<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 style="font-size:25px; text-align:center;">
        <?= $judul ?> <?= $user['nama']?> di perpus-XII 
      </h3>
      <ol class="breadcrumb">
        
      </ol>
    </section>


<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
    
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
