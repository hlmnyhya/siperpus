
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Peminjaman</h3>
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
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('petugas_ubah_data_peminjaman')?>" method="POST"
                    enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Pinjam</label>
                        <input type="hidden" class="form-control" id="tanggal_pinjam" name="id_peminjaman" value="<?= $user->id_peminjaman?>"required>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $user->tanggal_pinjam?>"required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"  value="<?= $user->tanggal_kembali?>"required>
                    </div>
                    <div class="form-group">
                    <label for="id_anggota">Anggota</label>
                    <select class="form-control" id="id_anggota" name="id_anggota" required>
                        <option value="">Pilih Anggota</option>
                        <?php foreach ($anggota as $row): ?>
                            <option value="<?= $row->id_anggota; ?>"><?= $row->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="id_petugas">Petugas</label>
                    <select class="form-control" id="id_petugas" name="id_petugas" required>
                        <option value="">Pilih Petugas</option>
                        <?php foreach ($petugas as $row): ?>
                            <option value="<?= $row->id_petugas; ?>"><?= $row->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <?php endforeach; ?>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>
