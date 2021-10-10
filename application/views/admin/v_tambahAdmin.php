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

    <section class="content">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url(); ?>admin/anggota/tambah_admin_aksi" class="form-horizontal">
              <div class="box-body ">


              <div class="form-group">
                  <label for="id" class="col-sm-2 control-label">Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?= $id_admin; ?>" id="id" name="id" readonly>
                  </div>
                </div>


                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Adminstrator" value="<?= set_value('nama');?>">
                    <?php echo form_error('nama','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>



                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="password">
                    <?php echo form_error('password','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>


              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/anggota" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>

              </div>
            </form>
         </div>
    </div>

    </section>
    </div>