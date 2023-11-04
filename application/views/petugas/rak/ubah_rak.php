
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Rak Buku</h3>
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
            <form id="formTambahAnggota" action="<?= base_url('petugas_ubah_data_rak') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Kode Rak</label>
                    <input type="hidden" class="form-control" id="nama" name="id_rak" value="<?= $user->id_rak?>"placeholder="Masukkan Kode Rak Buku" required>
                    <input type="text" class="form-control" id="nama" name="kode" value="<?= $user->kode?>"placeholder="Masukkan Kode Rak Buku" required>
                </div>
                <div class="form-group">
                    <label for="nama">Lokasi</label>
                    <input type="text" class="form-control" id="nama" name="lokasi" value="<?= $user->lokasi?>"placeholder="Masukkan Lokasi Rak Buku" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach; ?>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>