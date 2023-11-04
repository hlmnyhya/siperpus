
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Kategori Buku</h3>
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
            <form id="formTambahAnggota" action="<?= base_url('petugas_ubah_data_kategori') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Kategori Buku</label>
                    <input type="hidden" class="form-control" id="id_kategori" name="id_kategori_buku" value="<?= $user->id_kategori_buku;?>"placeholder="Masukkan Kategori Buku" required>
                    <input type="text" class="form-control" id="nama" name="kategori"  value="<?= $user->kategori;?>" placeholder="Masukkan Kategori Buku" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach; ?>
            <!-- Akhir Form Tambah Anggota -->
            </div>
        </div>
    </div>
</div>
