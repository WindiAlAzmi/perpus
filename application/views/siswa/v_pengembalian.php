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
     
    </div>
    <br>
    <br>
        <!-- notifikasi flashdata -->
        <?php 
             if($this->session->flashdata('sukses')) {
               echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
               echo $this->session->flashdata('sukses');
               echo '</div>';
             }
             ?>
    <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th width="5%">No</th>
                  <th width="10%">Nama Buku </th>
                  <th width="10%">Tgl Pinjam</th>
                  <th width="5%">Tgl Kembali</th>
                  <th width="5%">Tgl dikembalikan</th>
                  <th width="10%">Status Transaksi</th>
                  <th width="10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=1;
                   foreach($transaksi as $tr){ 

                    ?>
                       <tr>
                       <td><?php echo $no++ ?></td>
                       <?php  $tr->id_pengembalian ?>
                        <td><?php echo $tr->judul ?> </td>
                        <td><?php echo $tr->tgl_pinjam ?></td>
                        <td><?php echo $tr->tgl_kembali ?></td>
                        <td><?php echo $tr->tgl_kembalikan ?></td>
                        <td><?php echo $tr->status_transaksi?></td>
                        <td>
                          <a href="<?= base_url()?>siswa/pengembalian/lihat_buku/<?= $tr->id_pengembalian; ?>" class="btn btn-success btn-xs">detail</a>
                        <?php if($tr->status_transaksi == 'disetujui') { ?>
                          <a href="<?= base_url()?>siswa/pengembalian/soft_delete/<?= $tr->id_pengembalian; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau dihapus?')">hapus</a>
                        <?php } ?>
                        </td>
                      </tr>
                      <?php } 
                    ?>
            </tbody>
              </table>
            </div>
     </div>

    </section>
    <!-- /.content -->
  </div>