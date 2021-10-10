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
            <!-- notifikasi kalau ada error -->
            <!-- echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>'); ?> -->
            <form method="POST" action="<?= base_url('admin/jenis/simpan'); ?>" class="form-horizontal" />
            <div class="box-body">
            <div class="row">
              <div class="col-lg-6 col-lg-offset-1">
                <div class="form-group">
                    <label for="id_jenis" class="control-label">Kode Jenis Buku</label>
                    <input type="text" class="form-control" value="<?= $id_jenis ?>" id="id_jenis" name="id_jenis" readonly>
                </div>

                <div class="form-group">
                  <label for="nama_jenis" class="control-label">Nama Jenis Buku</label>
                    <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Nama Jenis Buku">
                    <?php echo form_error('nama_jenis','<div class="text-small text-danger">','</div>'); ?>
                  </div>

              
                </div>
              </div>
            </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/jenis" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
         </div>
    </div>

    </section>
    </div>