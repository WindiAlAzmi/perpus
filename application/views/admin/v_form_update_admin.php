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
        
                    
              <div class="box-body">
                <?php foreach ($admin as $ad ) : ?>
              <form method="post" action="<?= base_url('admin/anggota/update_admin_aksi') ?>" class="form-horizontal">
              <div class="row">

              <div class="col-lg-6 col-lg-offset-1">
                <div class="form-group">
                    <label for="id" class="control-label">Id </label>
                    <input type="text" class="form-control" value="<?= $ad->id ?>" id="id" name="id" readonly>
                </div>

                <div class="form-group">
                  <label for="nama" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $ad->nama?>" >
                   <?php echo form_error('nama','<div class="text-small text-danger">','</div>'); ?>
                </div>
                
                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                    <input type="text" class="form-control" name="password" id="password" value="<?= $ad->password?>" >
                   <?php echo form_error('password','<div class="text-small text-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                <a href="<?= base_url() ?>admin/anggota" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              
                </div>
              </div>
              </form>
           <?php endforeach; ?>
            </div>
    
        
         </div>
    </div>

    </section>
    </div>