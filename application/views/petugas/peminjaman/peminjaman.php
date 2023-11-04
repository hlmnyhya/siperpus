
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Peminjaman</h3>
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
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
                            <th>Telpon Anggota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($peminjaman as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->tanggal_pinjam; ?></td>
                            <td><?php echo $user->tanggal_kembali; ?></td>
                            <td><?php echo $user->nama_anggota; ?></td>
                            <td><?php echo $user->nama_petugas; ?></td>
                            <td><?php echo $user->telp_anggota; ?></td>
                            <td>
                            <a href="<?php echo base_url('petugas_peminjaman/tambah_buku/'.$user->id_peminjaman); ?>" class="btn btn-success"><i class="mdi mdi-cart-plus"></i><span>Tambah Buku</span></a>
                            <a href="<?php echo base_url('peminjaman/ubah/'.$user->id_peminjaman); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i> <span>Ubah</span></a>
                            <a href="<?php echo base_url('peminjaman/hapus/'.$user->id_peminjaman); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> <span>Hapus</span></a>
                            <a href="<?php echo base_url('peminjaman_buku/detail/'.$user->id_peminjaman); ?>" class="btn btn-info"><i class="mdi mdi-eye"></i> <span>Detail</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
                            <th>Telpon Anggota</th>
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
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('petugas_tambah_data_peminjaman')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
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
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>
