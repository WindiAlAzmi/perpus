<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        <?= $judul ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $isi ?></li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">

    <?php
    if(!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success col-md-12" role="alert"><?= $this->session->flashdata('info');?></div>
    <?php } ?> 

    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url()?>admin/jenis/tambah_jenis_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah <?= $isi; ?></a>
      </div>
    </div>
     <br>
        <!-- notifikasi flashdata -->
        <?php 
             if($this->session->flashdata('sukses')) {
               echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
               echo $this->session->flashdata('sukses');
               echo '</div>';
             }
             ?>
    <br>
    <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jenis Buku</th>
                  <th>Nama Jenis Buku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                   foreach($data_jenisBuku as $jenis): ?>
                    <tr>
                       <td><?php echo $no++ ?></td>
                        <td><?php echo $jenis->id_jenis ?></td>
                        <td><?php echo $jenis->nama_jenis ?></td>
                        <td>
                          <a href="<?= base_url()?>admin/jenis/update_jenis/<?= $jenis->id_jenis; ?>" class="btn btn-success btn-xs">Edit</a>
                          <a href="<?= base_url()?>admin/jenis/hapus_jenis/<?= $jenis->id_jenis; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin menghapus data ini?');">Hapus</a>
                        </td>
                      </tr>
                   <?php endforeach; ?>
            </tbody>
              </table>
            </div>
     </div>

    </section>
    <!-- /.content -->
  </div>