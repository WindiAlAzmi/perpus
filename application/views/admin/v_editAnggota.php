
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
            <form method="post" action="<?= base_url(); ?>admin/anggota/update" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="id_anggota" class="col-sm-2 control-label">Id Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $edit_anggota['id_anggota']; ?>" id="id_anggota" name="id_anggota" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nmr_induk" class="col-sm-2 control-label">NIS / NIP </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= $edit_anggota['nmr_induk']; ?>"  name="nmr_induk" id="nmr_induk" placeholder="NIS atau NIP" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="nama_anggota" class="col-sm-2 control-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $edit_anggota['nama_anggota']; ?>" name="nama_anggota" id="nama_anggota" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas" class="form-control" id="kelas" required>
                    <?php
                      if($edit_anggota['kelas'] == "VI A") { ?> 
                        <option value="VI A" selected>VI A</option>
                        <option value="VI B">VI B</option>
                        <option value="VI C">VI C</option>
                        <option value="VI D">VI D</option>
                      <?php } else if($edit_anggota['kelas'] == "VI B") { ?> 
                        <option value="VI A">VI A</option>
                        <option value="VI B" selected>VI B</option>
                        <option value="VI C">VI C</option>
                        <option value="VI D">VI D</option>
                     <?php } else if($edit_anggota['kelas'] == "VI C") { ?> 
                        <option value="VI A">VI A</option>
                        <option value="VI B">VI B</option>
                        <option value="VI C" selected>VI C</option>
                        <option value="VI D">VI D</option>
                     <?php  }else {  ?> 
                        <option value="VI A">VI A</option>
                        <option value="VI B">VI B</option>
                        <option value="VI C">VI C</option>
                        <option value="VI D" selected>VI D</option>
                     <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" value=<?= $edit_anggota['password'] ?>" name="password" id="password" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="level" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <select name="level" class="form-control" id="level" required>
                    <?php
                      if($edit_anggota['level'] == "siswa") { ?> 
                        <option value="siswa" selected>siswa</option>
                        <option value="wali kelas">wali_kelas</option>
                      <?php } else { ?> 
                      <option value="siswa">Siswa</option>
                      <option value="wali kelas" selected>Wali Kelas</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>

              <div class="box-footer">
                <a href="<?= base_url() ?>admin/anggota" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>

              </div>
            </form>
         </div>
    </div>

    </section>
    </div>