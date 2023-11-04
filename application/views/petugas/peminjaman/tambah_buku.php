
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Peminjaman Buku</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
    <div>
         <div class="card">
          <div class="card-body">
          <!-- <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahDivisiModal">
            <i class="mdi mdi-library-plus"></i> <span>Tambah Data</span>
            </button> -->
                <!-- Form Tambah User -->
                <?php foreach ($users as $user) : ?>
                <form id="formTambahUser" action="<?= base_url('tambah_perminjaman_buku')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggal_lahir">Buku</label>
                        <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?php echo $user->id_peminjaman; ?>" required>
                        <select class="form-control" id="id_buku" name="id_buku" required>
                        <option value="">Pilih Buku</option>
                        <?php foreach ($buku as $row): ?>
                            <option value="<?= $row->id_buku; ?>"><?= $row->judul; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                <?php endforeach; ?>
                </form>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>
