<?php 
    $tgl_pinjam = date('Y-m-d');

    $tujuh_hari = mktime(0,0,0,date("n"),date("j") + 7, date("Y"));
    $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>
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
    <br>
    <section class="content">
    <div class="col-md-12">
      
    <?php 
             if($this->session->flashdata('message')) {
               echo '<div class="alert alert-danger"></i>';
               echo $this->session->flashdata('message');
               echo '</div>';
             }
             ?>
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url('siswa/transaksi_buku/tambah_transaksi_aksi'); ?>"  class="form-horizontal" />
            <div class="box-body">
            <div class="row">
              <div class="col-lg-5 col-lg-offset-1">
                <div class="form-group" hidden>
                    <label for="id_transaksi" class="control-label">Kode Transaksi</label>
                    <input type="text" class="form-control" value="<?= $id_trans; ?>" id="id_transaksi" name="id_transaksi" readonly>
                  </div>

                <input type="hidden" name="id_siswa" value="<?= $user['id'] ?>">

                <div class="form-group">
                  <label for="nama" class="control-label">Nama Siswa</label>
                    <input type="text" class="form-control" value="<?= $user['nama'] ?>"  name="nama" id="nama" readonly>
        
                  </div>

      
                <div class="form-group">
                <label for="id_buku" class="control-label">Judul</label>
                    <select class="form-control" name="id_buku" id="id_buku">
                      <option value="" selected> -- Pilih Judul Buku -- </option>
                      <?php
                        foreach($data_buku as $buku) { ?>
                         <option value="<?= $buku->id ?>" > <?= $buku->judul; ?> </option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('id_buku','<div class="text-small text-danger">','</div>'); ?>
                </div>



              </div>

              <div class="col-lg-4 col-lg-offset-1">
                <div class="form-group">
                  <label for="tgl_pinjam" class="control-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= $tgl_pinjam ?>">
                    <?php echo form_error('tgl_pinjam','<div class="text-small text-danger">','</div>'); ?>
                  </div>

                <div class="form-group">
                  <label for="tgl_kembali" class="control-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?= $tgl_kembali ?>">
                    <?php echo form_error('tgl_kembali','<div class="text-small text-danger">','</div>'); ?>
                  </div>

                  <div class="form-group" hidden>
                    <input type="text" class="form-control" name="status_transaksi" id="status_transaksi"  value="diproses">
                  </div>

                  <div class="form-group" hidden>
                    <input type="text" class="form-control" name="status" id="status"  value="1">
                  </div>

                </div>
              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>siswa/riwayat_buku" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
         </div>
    </div>

    </section>
    </div>

    <script>
      $('#id_buku').change(function(){
        var id = $(this).val();
        $.ajax({
          url: '<?= base_url()?>siswa/transaksi_buku/jumlah_buku',
          data:{id:id},
          method:'post',
          dataType:'json',
          success:function(hasil){
            var jumlah = JSON.stringify(hasil.jumlah);
            var jumlah1 = jumlah.split('"').join('');
            if(jumlah1 <= 0) {
              alert('Maaf, stok untuk buku ini sedang kosong');
              location.reload();
            }

          }
        });
     });
    </script>