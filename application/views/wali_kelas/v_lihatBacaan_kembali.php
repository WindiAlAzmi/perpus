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
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action=""  class="form-horizontal" />
            <?php foreach ($data_buku as $db) : ?>
            <div class="box-body">
            <div class="row">
              <div class="col-lg-5 col-lg-offset-1">

              <div class="form-group">
                    <label class="control-label">Nama Siswa</label>
                    <div><?php echo $db->nama?></div>
                  </div>


                <div class="form-group">
                    <label class="control-label">Nama Buku</label>
                    <div><?php echo $db->judul?></div>
                  </div>

                 <div class="form-group">
                  <label class="control-label">Pengarang</label>
                    <div><?php echo $db->pengarang?></div>
                  </div>

                  <div class="form-group">
                    <label  class="control-label">Penerbit</label>
                    <div><?php echo $db->penerbit?></div>
                  </div>

                  <div class="form-group">
                    <label  class="control-label">Tahun</label>
                    <div><?php echo $db->tahun?></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Lokasi</label>
                    <div><?php echo $db->lokasi ?></div>
                  </div>

              </div>

              <div class="col-lg-4 col-lg-offset-1">
                <div class="form-group">
                  <label for="tgl_pinjam" class="control-label">Tanggal Pinjam</label>
                  <div><?php echo $db->tgl_pinjam ?></div>
                  </div>

                <div class="form-group">
                  <label for="tgl_kembali" class="control-label">Tanggal Kembali</label>
                  <div><?php echo $db->tgl_kembali ?></div>
                  </div>

                  <div class="form-group">
                    <label for="tgl_kembali" class="control-label">Tangga dikembalikan</label>
                    <div><?php echo $db->tgl_kembalikan ?></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Jenis Buku</label>
                    <div><?php echo $db->nama_jenis ?></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Status</label>
                    <div><?php echo $db->status_transaksi ?></div>
                  </div>


                </div>
              </div>
              <?php endforeach; ?>
              <div class="box-footer">
                <a href="<?= base_url() ?>wali_kelas/kembali_bacaan" class="btn btn-warning">Cancel</a>
              </div>
            </form>
         </div>
    </div>

    </section>
    </div>