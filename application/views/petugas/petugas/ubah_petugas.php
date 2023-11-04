
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Petugas</h3>
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
            <?php foreach ($users as $user) : ?>
            <!-- Form Tambah Anggota -->
            <form id="formTambahAnggota" action="<?= base_url('petugas_ubah_data_petugas') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?= $user->id_petugas;?>" placeholder="Masukkan Nama" required>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama;?>" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $user->telp;?>" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label for="nis">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username;?>"placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $user->password;?>" placeholder="Masukkan Password" required>
                </div>
                  <img src="<?php echo base_url('./uploads/profil/'.$user->foto); ?>" width="100px" height="100px" alt="Gambar User">
                <br>
                <div class="form-group">
                    <label for="telp">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach; ?>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>
