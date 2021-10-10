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
            <form method="post" action="<?= base_url(); ?>admin/buku/update" class="form-horizontal">
              <div class="box-body">
              <div class="row">
               
               <div class="col-lg-5 col-lg-offset-1">
                 <div class="form-group">
                     <label for="id_buku" class="control-label">Kode</label>
                     <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $edit_buku['id_buku']; ?>" readonly>
                 </div>
 
                 <div class="form-group">
                   <label for="nama_buku" class="control-label">judul</label>
                     <input type="text" class="form-control" name="nama_buku" id="nama_buku" value="<?= $edit_buku['nama_buku']; ?>" placeholder="Judul Buku" required>
                 </div>
 
      
                 <div class="form-group">
                   <label for="pengarang" class="control-label">Pengarang</label>
                     <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="pengarang" value="<?= $edit_buku['pengarang']; ?>" required>
                 </div>
 
                 <div class="form-group">
                   <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                     <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="penerbit" value="<?= $edit_buku['penerbit']; ?>" required>
                 </div>
 
               </div>
 
               <div class="col-lg-4 col-lg-offset-1">
                 <div class="form-group">
                   <label for="tahun_terbit" class="control-label">Tahun</label>
                     <input type="text" class="form-control" name="tahun_terbit" id="tahun terbit" placeholder="tahun terbit" value="<?= $edit_buku['tahun_terbit']; ?>" required>
                 </div>

                <div class="form-group">
                  <label for="jenis_buku" class="control-label">Jenis</label>
                    <select name="jenis_buku" class="form-control" id="jenis_buku" required>
                    <?php
                      if($edit_buku['jenis_buku'] == "buku bacaan") { ?> 
                        <option value="buku bacaan" selected>buku bacaan</option>
                        <option value="buku mata pelajaran">buku mata pelajaran</option>
                      <?php } else { ?> 
                      <option value="buku bacaan">buku bacaan</option>
                      <option value="buku mata pelajaran" selected>buku mata pelajaran</option>
                      <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                  <label for="lokasi_buku" class="control-label">Lokasi</label>
                    <input type="text" class="form-control" value="<?= $edit_buku['lokasi_buku']; ?>" name="lokasi_buku" id="lokasi_buku" required>
                </div>

                <div class="form-group">
                  <label for="jumlah" class="control-label">Jumlah</label>
                    <input type="text" class="form-control" value="<?= $edit_buku['jumlah']; ?>" name="jumlah" id="jumlah" required>
                </div>

                </div>
              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/buku" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
         </div>
    </div>

    </section>
    </div>