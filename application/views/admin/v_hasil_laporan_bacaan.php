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
                   foreach($laporan as $tr){ 

                    ?>
                       <tr>
                       <td><?php echo $no++ ?></td>
                       <?php  $tr->id_pengembalian ?>
                       <td><?php echo $tr->nama ?> </td>
                        <td><?php echo $tr->judul ?> </td>
                        <td><?php echo $tr->tgl_pinjam ?></td>
                        <td><?php echo $tr->tgl_kembali ?></td>
                        <td><?php echo $tr->tgl_kembalikan ?></td>
                        <td><?php echo $tr->nama_kelas?></td>
                      </tr>
                      <?php } 
                    ?>
            </tbody>
              </table>
            </div>
    

    <!-- /.content -->
