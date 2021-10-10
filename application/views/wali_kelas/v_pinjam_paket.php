
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
                  <th width="5%">Tgl Pinjam</th>
                  <th width="10%">Status Buku</th>
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
                       <?php $tr->id_transaksi ?>
                        <td><?php echo $tr->nama ?> </td>
                        <td><?php echo $tr->judul ?></td>
                        <td><?php echo $tr->tgl_pinjam ?></td>
                        <td>
                          <?php 
                          if ($tr->status_transaksi == "disetujui") {
                            if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
                            echo "<h3 class='label label-success' style='font-size:13px;'>Buku sedang dipinjam</h3>";
                          }else{
                            if($tr->id_status == 2 ) {
                            echo "<h3 class='label label-warning' style='font-size:13px;'>Buku dikembalikan tapi belum dikonfirmasi</h3>";
                            } else {
                              echo "Terlambat <b style = 'color:red;'>".$selisih."</b> Hari <br><h3 class='label label-danger' style='font-size:13px;'>Terlambat dikembalikan</h3>";
                            }
                          } 
                        }else if($tr->status_transaksi == "ditolak") {
                          echo "<h3 class='label label-danger' style='font-size:13px;' >Buku tidak bisa dipinjam</h3>";
                        }else {
                          echo "<h3 class='label label-warning' style='font-size:13px;'>Buku menunggu konfirmasi</h3>";
                        }
                          ?>
                        </td>
                        <td><?php 
                           if($tr->status_transaksi == "diproses") { ?>
                             <select name="status_transaksi" class="badge label-warning status_transaksi">
                               <option value="<?= $tr->id_transaksi?>diproses" selected><h4 style='font-size:5px;'>Diproses</h4></option>
                               <option value="<?= $tr->id_transaksi?>disetujui" >Disetujui</option>
                               <option value="<?= $tr->id_transaksi?>ditolak" >Ditolak</option>
                             </select>
                          <?php }else if($tr->status_transaksi == "disetujui") { ?>
                            <select name="status_transaksi" class="badge label-success status_transaksi">
                               <option value="<?= $tr->id_transaksi?>diproses">Diproses</option>
                               <option value="<?= $tr->id_transaksi?>disetujui" selected>Disetujui</option>
                               <option value="<?= $tr->id_transaksi?>ditolak" >Ditolak</option>
                             </select>
                          <?php } else { ?>
                            <select name="status_transaksi" class="badge label-danger status_transaksi">
                               <option value="<?= $tr->id_transaksi?>diproses">Diproses</option>
                               <option value="<?= $tr->id_transaksi?>disetujui">Disetujui</option>
                               <option value="<?= $tr->id_transaksi?>ditolak" selected>Ditolak</option>
                             </select>
                          <?php } ?>
                         </td>
                        <td>
                          <a href="<?= base_url()?>wali_kelas/pinjam_paket/lihat_bacaan/<?= $tr->id_transaksi; ?>" class="btn btn-success btn-xs">detail</a>
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
      var id_transaksi_alert = status_transaksi.substr(0,6);
      var status_transaksi_alert = status_transaksi.substr(6,10);
      
      $.ajax({
        url:"<?= base_url()?>wali_kelas/pinjam_paket/update_status",
        method:"post",
        data:{id_transaksi_alert:id_transaksi_alert, status_transaksi_alert:status_transaksi_alert}
      });

      location.reload();
    });
  </script>