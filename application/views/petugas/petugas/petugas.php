
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Petugas</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
      <?php if ($this->session->flashdata('pesan')): ?>
          <?= $this->session->flashdata('pesan'); ?>
      <?php endif; ?>
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($petugas as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->nama; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo str_repeat('●', min(strlen($user->password), 8)); ?></td>
                            <td><?php echo $user->alamat; ?></td>
                            <td><?php echo $user->telp; ?></td>
                            <td><img src="<?php echo base_url('./uploads/profil/'.$user->foto); ?>" width="100px" height="100px" alt="Gambar User"></td>
                            <td>
                              <a type="button" href="<?php echo base_url('petugas/ubah/'.$user->id_petugas); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i> <span>Ubah</span></a>
                              <a type="button" href="<?php echo base_url('petugas/hapus/'.$user->id_petugas); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> <span>Hapus</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Foto</th>
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
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- Form Tambah Anggota -->
            <form id="formTambahAnggota" action="<?= base_url('petugas_tambah_data_petugas') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label for="nis">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <label for="telp">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>
