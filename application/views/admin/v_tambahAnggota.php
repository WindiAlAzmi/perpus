
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
            <form method="post" action="<?= base_url(); ?>admin/anggota/simpan" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="id_anggota" class="col-sm-2 control-label">Id Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $id_anggota; ?>" id="id_anggota" name="id_anggota" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nmr_induk" class="col-sm-2 control-label">NIS / NIP </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nmr_induk" id="nmr_induk" placeholder="NIS atau NIP" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="nama_anggota" class="col-sm-2 control-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas" class="form-control" id="kelas" required>
                      <option value=""> - Pilih Kelas - </option>
                      <option value="VI A">VI A</option>
                      <option value="VI B">VI B</option>
                      <option value="VI C">VI C</option>
                      <option value="VI D">VI D</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="level" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <select name="level" class="form-control" id="level" required>
                      <option value=""> - Pilih level - </option>
                      <option value="siswa">Siswa</option>
                      <option value="wali kelas">Wali Kelas</option>
                    </select>
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