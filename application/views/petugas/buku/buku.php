
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Buku</h3>
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
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah</th>
                            <th>ISBN</th>
                            <th>Cover</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kode Rak</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($buku as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->judul; ?></td>
                            <td><?php echo $user->kategori; ?></td>
                            <td><?php echo $user->tahun_terbit; ?></td>
                            <td><?php echo $user->jumlah; ?></td>
                            <td><?php echo $user->isbn; ?></td>
                            <td><img src="<?php echo base_url('./uploads/cover/'.$user->cover); ?>" width="100px" height="100px" alt="Cover"></td>
                            <td><?php echo $user->nama_pengarang; ?></td>
                            <td><?php echo $user->nama_penerbit; ?></td>
                            <td><?php echo $user->kode_rak; ?></td>
                            <td><?php echo $user->lokasi; ?></td>
                            <td>
                              <a href="<?php echo base_url('buku/ubah/'.$user->id_buku); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i> <span>Ubah</span></a>
                              <a href="<?php echo base_url('buku/hapus/'.$user->id_buku); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> <span>Hapus</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah</th>
                            <th>ISBN</th>
                            <th>Cover</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kode Rak</th>
                            <th>Lokasi</th>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('petugas_tambah_data_buku')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomor_sppb">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan Judul" required>
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
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
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
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
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
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>
