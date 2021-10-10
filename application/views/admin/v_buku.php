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
        <a href="<?= base_url()?>admin/buku/tambah_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Buku Bacaan</a>
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
                  <th width="5%">Kode</th>
                  <th width="30%">Judul</th>
                  <th width="10%">Pengarang</th>
                  <th width="10%">Penerbit</th>
                  <th width="5%">Tahun</th>
                  <th width="5%">Lokasi</th>
                  <th width="5%">Jumlah</th>
                  <th width="10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                   foreach($data_buku as $buku): ?>
                       <tr>
                       <?php $no++ ?>
                        <td><?php echo $buku->id?></td>
                        <td><?php echo $buku->judul ?></td>
                        <td><?php echo $buku->pengarang ?></td>
                        <td><?php echo $buku->penerbit ?></td>
                        <td><?php echo $buku->tahun ?></td>
                        <td><?php echo $buku->lokasi?></td>
                        <td><?php echo $buku->jumlah ?></td>
                        <td>
                        <a href="<?= base_url()?>admin/buku/lihat_buku_bacaan/<?= $buku->id; ?>" class="btn btn-warning btn-xs">Lihat</a>
                          <a href="<?= base_url()?>admin/buku/update_buku/<?= $buku->id; ?>" class="btn btn-success btn-xs">Edit</a>
                          <a href="<?= base_url()?>admin/buku/hapus_buku/<?= $buku->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin menghapus data ini?');">Hapus</a>
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