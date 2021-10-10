
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
            <form method="post" action="<?= base_url(); ?>admin/berita/update" class="form-horizontal">
              <div class="box-body">

              <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control"  value="<?= $edit_berita['id_pemberitahuan']; ?>"  name="id_pemberitahuan" readonly>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="judul" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= $edit_berita['judul']; ?>"  name="judul" id="judul" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="isiBerita" class="col-sm-2 control-label">Isi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $edit_berita['isi']; ?>" name="isi" id="isiBerita" required>
                  </div>
                </div>


              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/berita" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>

              </div>
            </form>
         </div>
    </div>

    </section>
    </div>