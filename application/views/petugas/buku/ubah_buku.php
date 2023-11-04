
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Ubah Data Buku</h3>
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
                <form id="formTambahUser" action="<?= base_url('petugas_ubah_data_buku')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomor_sppb">Judul</label>
                        <input type="hidden" class="form-control" id="judul" name="id_buku" value="<?= $user->id_buku?>" placeholder="Masukkan Judul" required>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $user->judul?>"placeholder="Masukkan Judul" required>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Kategori</label>
                    <select class="form-control" id="id_kategori_buku" name="id_kategori_buku" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $row): ?>
                            <option value="<?= $row->id_kategori_buku; ?>"><?= $row->kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sppb">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" value="<?= $user->tahun_terbit?>" name="tahun_terbit"
                            placeholder="Masukkan Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Pengarang</label>
                    <select class="form-control" id="id_pengarang" name="id_pengarang" required>
                        <option value="">Pilih Pengarang</option>
                        <?php foreach ($pengarang as $row): ?>
                            <option value="<?= $row->id_pengarang; ?>"><?= $row->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Penerbit</label>
                    <select class="form-control" id="id_penerbit" name="id_penerbit" required>
                        <option value="">Pilih Penerbit</option>
                        <?php foreach ($penerbit as $row): ?>
                            <option value="<?= $row->id_penerbit; ?>"><?= $row->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $user->isbn?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $user->jumlah?>"required>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Rak</label>
                    <select class="form-control" id="id_rak" name="id_rak" required>
                        <option value="">Pilih Rak</option>
                        <?php foreach ($rak as $row): ?>
                            <option value="<?= $row->id_rak; ?>"><?= $row->kode; ?>-<?= $row->lokasi; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <!-- Tambahkan bidang lain sesuai kebutuhan -->
                    <!-- ... -->
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <?php endforeach; ?>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>
