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
      <a href="<?= base_url()?>siswa/transaksi_buku" class="btn btn-success"><i class="fa fa-plus"></i> Pinjam Buku Bacaan</a>
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
                  <th width="5%">Status Buku</th>
                  <th width="10%">Status Transaksi</th>
                  <th width="10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=1;
                   foreach($transaksi as $tr){ 

                    $timezone = new DateTimeZone('Asia/Jakarta');
                    $tgl_kembali = new DateTime($tr->tgl_kembali);
                    $tgl_sekarang = new DateTime();
                    $selisih = $tgl_sekarang->diff($tgl_kembali)->format('%a');
    
                    ?>
                       <tr>
                       <td><?php echo $no++ ?></td>
                       <?php $tr->id_transaksi ?>
                        <td><?php echo $tr->judul ?> </td>
                        <td><?php echo $tr->tgl_pinjam ?></td>
                        <td><?php echo $tr->tgl_kembali ?></td>
                        <td>
                          <?php 
                          if ($tr->status_transaksi == "disetujui") {
                            if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
                            echo "<span class='label label-success'>Buku sedang dipinjam</span>";
                          }else{
                            echo "Terlambat <b style = 'color:red;'>".$selisih."</b> Hari <br><span class='label label-danger'>Terlambat dikembalikan</span>";
                          } 
                        }else if($tr->status_transaksi == "ditolak") {
                          echo "<span class='label label-danger'>Buku tidak bisa dipinjam</span>";
                        }else {
                          echo "<span class='label label-warning'>Buku menunggu konfirmasi </span>";
                        }
                          ?>
                        </td>
                        <td><?php echo $tr->status_transaksi?></td>
                        <td>
                        <?php if($tr->status_transaksi == "disetujui" ) { ?>
                          <a href="<?= base_url()?>siswa/riwayat_buku/kembalikan_buku/<?= $tr->id_transaksi; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin mau dikembalikan?')">kembalikan</a>
                        <?php } ?>
                          <a href="<?= base_url()?>siswa/riwayat_buku/lihat_buku/<?= $tr->id_transaksi; ?>" class="btn btn-success btn-xs">detail</a>
                          <?php if($tr->status_transaksi !== "disetujui") { ?>
                            <a href="<?= base_url()?>siswa/riwayat_buku/hard_delete/<?= $tr->id_transaksi; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau dihapus?')">hapus</a>
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