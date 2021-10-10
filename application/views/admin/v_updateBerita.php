
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
            <?php foreach ($data_berita as $db ) : ?>
            <form method="post" action="<?= base_url(); ?>admin/berita/update_berita_aksi" class="form-horizontal">
              <div class="box-body">

              <div class="form-group">
                <label for="id" class="col-sm-2  control-label">Kode Berita</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?= $db->id; ?>" id="id" name="id" readonly>
                </div>
                </div>
              
            
                <div class="form-group">
                  <label for="judul" class="col-sm-2 control-label">Judul </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $db->judul?>">
                    <?php echo form_error('judul','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>


                <div class="form-group">
                  <label for="isi" class="col-sm-2 control-label">Isi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="isi" id="isi"style="height:200px;"><?= $db->isi ?></textarea>
                    <?php echo form_error('isi','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>


              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/berita" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>

              </div>
            </form>
            <?php endforeach; ?>
         </div>
    </div>

    </section>
    </div>