
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Data Pengembalian</h3>
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
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php $no = 1; $prevIdPeminjaman = null; foreach ($pengembalian as $user): ?>
        <?php if ($user->id_peminjaman != $prevIdPeminjaman): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $user->nis; ?></td>
                <td><?php echo $user->nama_anggota; ?></td>
                <td><?php echo $user->nama_petugas; ?></td>
                <td><?php echo date('d F Y', strtotime($user->tanggal_pinjam)); ?></td>
                <td><?php echo date('d F Y', strtotime($user->tanggal_kembali)); ?></td>
                <td>
                    <?php if ($user->status == "Belum Kembali"): ?>
    <?php if ($user->id_peminjaman): ?>
        <a href="<?= base_url('pengembalian/ubah_buku/'.$user->id_peminjaman); ?>" class="btn btn-success">
            <i class="mdi mdi-library-plus"></i><span>Tandai Kembali</span>
        </a>
    <?php endif; ?>
                    <?php elseif ($user->status == "Sudah Kembali"): ?>
                        <span class="btn btn-success">Buku Telah Selesai Dipinjam</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
        <?php $prevIdPeminjaman = $user->id_peminjaman; ?>
    <?php endforeach; ?>
</tbody>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
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
<div class="modal fade" id="tambahKembaliBuku" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('petugas_tambah_data_pengembalian_real')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="text" class="form-control" id="id_pengembalian" name="id_pengembalian" value="<?php echo $user->id_peminjaman;?>" readonly>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $user->tanggal_pinjam;?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo $user->tanggal_kembali;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" readonly>
                    </div>
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
                </form>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<!-- <div class="modal fade" id="tambahKembaliBuku222" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahUser" action="<?= base_url('petugas_tambah_data_pengembalian_real')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo $user->tanggal_pinjam;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" readonly>
                    </div>
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
                </form>
            </div>
        </div>
    </div>-->

<script>
document.getElementById('tanggal_pengembalian').addEventListener('change', function() {
    var tanggalKembali = new Date('<?php echo $user->tanggal_kembali;?>');
    var tanggalPengembalian = new Date(this.value);
    tanggalKembali.setHours(0, 0, 0, 0);
    tanggalPengembalian.setHours(0, 0, 0, 0);
    var selisihHari = Math.floor((tanggalPengembalian - tanggalKembali) / (1000 * 60 * 60 * 24));
    var denda = 0;
    if (selisihHari > 0) {
        denda = selisihHari * 1000;
    }
    var formattedDenda = denda;
    document.getElementById('denda').value = formattedDenda;
});
</script>

<script>
$('#formTambahUser').submit(function(e) {
    e.preventDefault();
    var tanggalPengembalian = document.getElementById('tanggal_pengembalian').value;
    var denda = parseInt(tanggalPengembalian.replace(/[^\d]/g, ''));
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url("petugas_tambah_data_pengembalian"); ?>',
        data: { tanggal_pengembalian: tanggalPengembalian, denda: denda, id_peminjaman: $('#id_peminjaman').val(), id_anggota: $('#id_anggota').val(), id_petugas: $('#id_petugas').val() },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
});
</script>
