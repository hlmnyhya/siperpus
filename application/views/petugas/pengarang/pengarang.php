
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Pengarang</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
    <div>
         <div class="card">
          <div class="card-body">
          <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahDivisiModal">
            <i class="mdi mdi-library-plus"></i> <span>Tambah Data</span>
            </button>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pengarang as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->nama; ?></td>
                            <td><?php echo $user->alamat; ?></td>
                            <td><?php echo $user->telp; ?></td>
                            <td>
                              <a href="<?php echo base_url('pengarang/ubah/'.$user->id_pengarang); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i> <span>Ubah</span></a>
                              <a href="<?php echo base_url('pengarang/hapus/'.$user->id_pengarang); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> <span>Hapus</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
   </div>

            <!-- Tambah Anggota -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Pengarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- Form Tambah Anggota -->
            <form id="formTambahAnggota" action="<?= base_url('petugas_tambah_data_pengarang') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Pengarang</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pengarang" required>
                </div>
                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" id="nama" name="alamat" placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <label for="nama">Telp</label>
                    <input type="text" class="form-control" id="nama" name="telp" placeholder="Masukkan Telp" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>
