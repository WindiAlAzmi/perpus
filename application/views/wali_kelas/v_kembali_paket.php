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
                  <th width="10%">Nama Siswa</th>
                  <th width="10%">Nama Buku</th>
                  <th width="5%">Tgl dikembalikan</th>
                  <th width="5%">Status Transaksi</th>
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
                       <?php $tr->id_pengembalian ?>
                        <td><?php echo $tr->nama ?> </td>
                        <td><?php echo $tr->judul ?></td>
                        <td><?php echo $tr->tgl_kembalikan ?></td>
                        <td><?php 
                           if($tr->status_transaksi == "diproses") { ?>
                             <select name="status_transaksi" class="badge label-warning status_transaksi">
                               <option value="<?= $tr->id_pengembalian?>diproses" selected><h4 style='font-size:5px;'>Diproses</h4></option>
                               <option value="<?= $tr->id_pengembalian?>disetujui" >Disetujui</option>
                               <option value="<?= $tr->id_pengembalian?>ditolak" >Ditolak</option>
                             </select>
                          <?php }else if($tr->status_transaksi == "disetujui") { ?>
                            <select name="status_transaksi" class="badge label-success status_transaksi">
                               <option value="<?= $tr->id_pengembalian?>diproses">Diproses</option>
                               <option value="<?= $tr->id_pengembalian?>disetujui" selected>Disetujui</option>
                               <option value="<?= $tr->id_pengembalian?>ditolak" >Ditolak</option>
                             </select>
                          <?php } else { ?>
                            <select name="status_transaksi" class="badge label-danger status_transaksi">
                               <option value="<?= $tr->id_pengembalian?>diproses">Diproses</option>
                               <option value="<?= $tr->id_pengembalian?>disetujui">Disetujui</option>
                               <option value="<?= $tr->id_pengembalian?>ditolak" selected>Ditolak</option>
                             </select>
                          <?php } ?>
                         </td>
                        <td>
                          <a href="<?= base_url()?>wali_kelas/kembali_paket/lihat_bacaan/<?= $tr->id_pengembalian; ?>" class="btn btn-success btn-xs">detail</a>
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
  <script>
    $('.status_transaksi').change(function(){
      var status_transaksi = $(this).val();
      var id_pengembalian_alert = status_transaksi.substr(0,6);
      var status_transaksi_alert = status_transaksi.substr(6,10);
      
      $.ajax({
        url:"<?= base_url()?>wali_kelas/kembali_paket/update_status",
        method:"post",
        data:{id_pengembalian_alert:id_pengembalian_alert, status_transaksi_alert:status_transaksi_alert}
      });

      location.reload();
    });
  </script>