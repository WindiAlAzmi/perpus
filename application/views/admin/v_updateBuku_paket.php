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
            <?php foreach ($data_buku_paket as $db ) : ?>
            <form method="post" action="<?= base_url(); ?>admin/buku/update_buku_paket_aksi" class="form-horizontal">
              <div class="box-body">
              <div class="row">
               
               <div class="col-lg-5 col-lg-offset-1">
                 <div class="form-group">
                     <label for="id" class="control-label">Kode</label>
                     <input type="text" class="form-control" id="id" name="id" value="<?= $db->id ?>" readonly>
                 </div>
 
                 <div class="form-group">
                   <label for="nama" class="control-label">judul</label>
                     <input type="text" class="form-control" name="nama" id="nama" value="<?= $db->judul ?>">
                     <?php echo form_error('nama','<div class="text-small text-danger">','</div>'); ?>
                 </div>
 
      
                 <div class="form-group">
                   <label for="pengarang" class="control-label">Pengarang</label>
                     <input type="text" class="form-control" name="pengarang" id="pengarang"  value="<?= $db->pengarang ?>" >
                     <?php echo form_error('pengarang','<div class="text-small text-danger">','</div>'); ?>
                 </div>
 
                 <div class="form-group">
                   <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                     <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $db->penerbit ?>" >
                     <?php echo form_error('penerbit','<div class="text-small text-danger">','</div>'); ?>
                 </div>
 
               </div>
 
               <div class="col-lg-4 col-lg-offset-1">
                 <div class="form-group">
                   <label for="tahun" class="control-label">Tahun</label>
                     <input type="text" class="form-control" name="tahun" id="tahun"  value="<?= $db->tahun ?>">
                     <?php echo form_error('tahun','<div class="text-small text-danger">','</div>'); ?>
                 </div>


                <div class="form-group">
                  <label for="lokasi" class="control-label">Lokasi</label>
                    <input type="text" class="form-control" value="<?= $db->lokasi ?>" name="lokasi" id="lokasi">
                    <?php echo form_error('lokasi','<div class="text-small text-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="jumlah" class="control-label">Jumlah</label>
                    <input type="text" class="form-control" value="<?= $db->jumlah ?>" name="jumlah" id="jumlah">
                    <?php echo form_error('jumlah','<div class="text-small text-danger">','</div>'); ?>
                </div>

                <div class="form-group" hidden>
                    <input type="text" class="form-control" name="id_jenisBuku" id="id_jenisBuku"  value="<?= $db->id_jenisBuku ?>">
                  </div>

                </div>
              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/buku/data_paket" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            <?php endforeach; ?>
         </div>
    </div>

    </section>
    </div>