
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Pengarang</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
    <div>
         <div class="card">
          <div class="card-body">
            <?php foreach ($users as $user) : ?>
            <!-- Form Tambah Anggota -->
            <form id="formTambahAnggota" action="<?= base_url('petugas_ubah_data_pengarang') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Pengarang</label>
                    <input type="hidden" class="form-control" id="nama" name="id_pengarang" value="<?= $user->id_pengarang?>" placeholder="Masukkan Nama Pengarang" required>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama?>" placeholder="Masukkan Nama Pengarang" required>
                </div>
                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" id="nama" name="alamat" value="<?= $user->alamat?>"placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <label for="nama">Telp</label>
                    <input type="text" class="form-control" id="nama" name="telp" value="<?= $user->telp?>" placeholder="Masukkan Telp" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach; ?>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>
