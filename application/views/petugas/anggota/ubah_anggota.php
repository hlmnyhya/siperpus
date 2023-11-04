
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Anggota</h3>
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
          <!-- <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahDivisiModal">
            <i class="mdi mdi-library-plus"></i> <span>Tambah Data</span>
            </button> -->
            <!-- Form Tambah Anggota -->
            <?php foreach ($users as $user): ?>
            <form id="formTambahAnggota" action="<?= base_url('petugas_ubah_data_anggota') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="hidden" class="form-control" id="id_anggota" name="id_anggota" value="<?= $user->id_anggota?>" placeholder="Masukkan Nama" required>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama?>" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $user->nis?>"  placeholder="Masukkan NIS" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user->jenis_kelamin?>" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $user->tempat_lahir?>" placeholder="Masukkan Tempat Lahir"           required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user->tanggal_lahir?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $user->alamat?>" required></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telepon" value="<?= $user->telp?>" required>
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
