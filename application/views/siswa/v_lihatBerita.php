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
            <br>

            <form method="post" action="" >
            <?php foreach ($data_berita as $db) : ?>
              <div class="row">

              <div class="col-lg-6 col-lg-offset-1">
                <div class="form-group">
                   <label class="control-label">Judul</label>
                    <div><?= $db->judul ?></div>
                </div>

                <div class="form-group">
                   <label class="control-label">Isi</label>
                   <div><?= $db->isi?></div>
                </div>
                <br>
                
                <div class="form-group">
                    <a href="<?= base_url() ?>siswa/dashboard" class="btn btn-warning">Cancel</a>
                    </div>

                </div>
              </div>
              
            </form>
            <?php endforeach; ?>
         </div>
    </div>

    </section>
    </div>