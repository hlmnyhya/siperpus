
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Peminjaman</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
    <div>
         <div class="card">
          <div class="card-body">
                  <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->judul; ?></td>
                            <td><?php echo $user->isbn; ?></td>
                            <td><?php echo $user->tanggal_pinjam; ?></td>
                            <td><?php echo $user->tanggal_kembali; ?></td>
                            <td>
                              <a href="<?php echo base_url('peminjaman/ubah_buku/'.$user->id_peminjaman); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i><span>Ubah</span></a>
                              <a href="<?php echo base_url('peminjaman/hapus_buku/'.$user->id_peminjaman); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i><span>Hapus</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
