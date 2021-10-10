<section class="content">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url(); ?>admin/laporan/peminjaman_bacaan" class="form-horizontal">
              <div class="box-body ">


              <div class="form-group">
                  <label class="col-sm-2 control-label">Dari Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="dari">
                    <?php echo form_error('dari','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Sampai Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="sampai">
                    <?php echo form_error('sampai','<div class="text-small text-danger">','</div>'); ?>
                  </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary" style="margin-left:39%;">Tampilkan Data</button>
             
                <div class="btn-group">
                    <a href="<?= base_url()?>admin/laporan/cetak_laporan" class="btn btn-sm btn-success" target="_blank">Cetak Data</a>
                </div>
                </div>
              </form>
                 <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th width="5%">No</th>
                  <th width="5%">Nama Siswa</th>
                  <th width="10%">Nama Buku </th>
                  <th width="10%">Tgl Pinjam</th>
                  <th width="5%">Tgl Kembali</th>
                  <th width="5%">Tgl dikembalikan</th>
                  <th width="5%">Kelas</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=1;
                   foreach($laporan as $tr):
                    $tr    = get_object_vars($tr);
                    ?>
                       <tr>
                       <td><?php echo $no++ ?></td>
                       <?php  $tr['id_pengembalian'] ?>
                       <td><?php echo $tr['nama'] ?> </td>
                        <td><?php echo $tr['judul'] ?> </td>
                        <td><?php echo mediumdate_indo($tr['tgl_pinjam']) ?></td>
                        <td><?php echo mediumdate_indo($tr['tgl_kembali']) ?></td>
                        <td><?php echo mediumdate_indo($tr['tgl_kembalikan']) ?></td>
                        <td><?php echo $tr['nama_kelas'] ?></td>
                      </tr>
                      <?php endforeach; ?>
              
            </tbody>
              </table>
            </div>
    

    <!-- /.content -->

              
  
            
            
       
 


  