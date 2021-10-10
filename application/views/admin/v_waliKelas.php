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

<!-- Main content -->
    <section class="content">
  
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url()?>admin/anggota/tambah_wali" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Wali Kelas</a>
      </div>
    </div>
    <br>
        <!-- notifikasi flashdata -->
   

        <?php 
             if($this->session->flashdata('sukses')) {
               echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
               echo $this->session->flashdata('sukses');
               echo '</div>';
             }
             ?>
    <br>
    <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Wali Kelas</th>
                  <th>Nama </th>
                  <th>NIP</th>
                  <th>Password</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                   foreach($data_wali as $dw): ?>
                       <tr>
                       <td><?= $no++ ?></td>
                        <td><?php echo $dw->id ?></td>
                        <td><?php echo $dw->nama ?></td>
                        <td><?php echo $dw->nip ?></td>
                        <td><?php echo $dw->password ?></td>
                        <td><?php echo $dw->nama_kelas ?></td>
                        <td>
                          <a href="<?= base_url()?>admin/anggota/update_wali/<?= $dw->id; ?>" class="btn btn-success btn-xs">Edit</a>
                          <a href="<?= base_url()?>admin/anggota/hapus_wali/<?= $dw->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin menghapus data ini?');">Hapus</a>
                        </td>
                      </tr>
                   <?php endforeach; ?>
            </tbody>
              </table>
            </div>
     </div>

    </section>
    <!-- /.content -->
  </div>