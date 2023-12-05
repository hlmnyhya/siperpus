
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
                            <th>Tanggal Kembali Real</th>
                            <th>Denda</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pengembalian as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->tanggal_pinjam;?></td>
                            <td><?php echo $user->tanggal_kembali;?></td>
                            <td>
                                <?php 
                                if ($user->tanggal_kembali >= date('Y-m-d') && $user->tanggal_pengembalian == NULL) {
                                    echo "Buku belum dikembalikan <br> Hari ini (Batas terakhir pengembalian)";
                                } elseif ($user->tanggal_kembali != NULL) {
                                    echo $user->tanggal_pengembalian;
                                } else {
                                    echo "Buku belum dikembalikan";
                                }
                                ?>
                            </td>
                            <td><?php echo $user->denda; ?></td>
                            <td><?php echo $user->nama_anggota; ?></td>
                            <td><?php echo $user->nama_petugas; ?></td>
                            <td>
                            <a href="<?php echo base_url('pengembalian_buku/hapus/'.$user->id_peminjaman); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> <span>Hapus</span></a>
                            <a href="<?php echo base_url('pengembalian_buku/detail/'.$user->id_peminjaman); ?>" class="btn btn-info"><i class="mdi mdi-eye"></i> <span>Detail</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Tanggal Kembali Real</th>
                            <th>Denda</th>
                            <th>Nama Anggota</th>
                            <th>Nama Petugas</th>
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
                <form id="formTambahUser" action="<?= base_url('petugas_tambah_data_pengembalian')?>" method="POST"
                    enctype="multipart/form-data">
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
                        <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?php echo $user->id_peminjaman;?>"                    required>
                        <input type="hidden" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo $user->id_anggota;?>" required>
                        <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?php echo $user->id_petugas;?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>

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
