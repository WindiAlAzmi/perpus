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
            <form method="post" action="<?= base_url('admin/buku/tambah_buku_aksi'); ?>"  class="form-horizontal" />
            <div class="box-body">
            <div class="row">
              <div class="col-lg-5 col-lg-offset-1">
                <div class="form-group">
                    <label for="id" class="control-label">Kode</label>
                    <input type="text" class="form-control" value="<?= $id_buku; ?>" id="id" name="id" readonly>
                  </div>

                <div class="form-group">
                  <label for="nama" class="control-label">judul</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Judul Buku" value="<?= set_value('nama'); ?>">
                    <?php echo form_error('nama','<div class="text-small text-danger">','</div>'); ?>
                  </div>

                <div class="form-group">
                  <label for="pengarang" class="control-label">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="pengarang" value="<?= set_value('pengarang'); ?>">
                    <?php echo form_error('pengarang','<div class="text-small text-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="penerbit" class="control-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="penerbit" value="<?= set_value('penerbit'); ?>">
                    <?php echo form_error('penerbit','<div class="text-small text-danger">','</div>'); ?>
                </div>

              </div>

              <div class="col-lg-4 col-lg-offset-1">
                <div class="form-group">
                  <label for="tahun" class="control-label">Tahun</label>
                    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="tahun terbit" value="<?= set_value('tahun'); ?>">
                    <?php echo form_error('tahun','<div class="text-small text-danger">','</div>'); ?>
                  </div>

                <div class="form-group">
                  <label for="lokasi" class="control-label">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi"  placeholder="Lokasi Buku" value="<?= set_value('lokasi'); ?>">
                    <?php echo form_error('lokasi','<div class="text-small text-danger">','</div>'); ?>
                  </div>

                <div class="form-group">
                  <label for="jumlah" class="control-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Buku"  value="<?= set_value('jumlah'); ?>">
                    <?php echo form_error('jumlah','<div class="text-small text-danger">','</div>'); ?>
                </div>
              
                <div class="form-group" hidden>
                  <label for="id_jenisBuku" class="control-label">Jenis Buku</label>
                    <input type="number" class="form-control" name="id_jenisBuku" id="id_jenisBuku"   value="1">
                </div>

                </div>
              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/buku" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
         </div>
    </div>

    </section>
    </div>