 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?= $judul ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?= $isi ?></a></li>
      </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
    <div class="col-md-12">
    <?php 
             if($this->session->flashdata('message')) {
               echo '<div class="alert alert-danger"></i>';
               echo $this->session->flashdata('message');
               echo '</div>';
             }
             ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header ">
          
        </div>

        <form method="post" action="" >
            <?php foreach ($data_berita as $db) : ?>
              <div class="row">

              <div class="col-lg-6 col-lg-offset-1">
              <div class="form-group">
                   <label class="control-label">Kode</label>
                    <div><?= $db->id ?></div>
                </div>

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
                    <a href="<?= base_url() ?>admin/berita" class="btn btn-warning">Cancel</a>
                    </div>

                </div>
              </div>
              
            </form>
            <?php endforeach; ?>
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
