
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
  <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Buku</th>
            <th>Tanggal Pesan</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Kembali Riil</th>
            <th colspan="2">Denda</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $user->judul ?></td>
                <td><?php echo date('d F Y', strtotime($user->tanggal_pinjam)); ?></td>
                <td><?php echo date('d F Y', strtotime($user->tanggal_kembali)); ?></td>
                <td>
                    <form id="formTambahUser" action="<?= base_url('Petugas/Peminjaman/update_data_aksi_buku/'.$user->id_buku)?>" method="POST"
    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control tanggal_pengembalian" name="id_peminjaman" required value=" <?php echo $user->id_peminjaman; ?>">
                        <input type="hidden" class="form-control tanggal_pengembalian" name="id_buku" required value=" <?php echo $user->id_buku; ?>">
                        <input type="date" class="form-control tanggal_pengembalian" name="tanggal_pengembalian"
                            required data-tanggal-kembali="<?php echo $user->tanggal_kembali; ?>">
                    </div>
                </td>
               <td colspan="2">
                   <div class="form-group">
                       <input type="text" class="form-control denda" name="denda" readonly>
                    </div>
                </td>
                <td>
                <!-- <a href="<?= base_url('Petugas/Peminjaman/update_data_aksi_buku/'.$user->id_buku)?>" class="btn btn-success"><i class="mdi mdi-library-plus"></i><span>Tandai Kembali</span></a> -->
                    <button type="submit" class="btn btn-success">Simpan</button>
</form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

     <tfoot>
        <tr>
            <th>NO</th>
            <th>Buku</th>
            <th>Tanggal Pesan</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Kembali Riil</th>
            <th colspan="2">Denda</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>


                <!-- Akhir Form Tambah User -->
            </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.tanggal_pengembalian').forEach(function (element) {
        element.addEventListener('change', function () {
            var tanggalKembali = new Date(this.getAttribute('data-tanggal-kembali'));
            var tanggalPengembalian = new Date(this.value);
            tanggalKembali.setHours(0, 0, 0, 0);
            tanggalPengembalian.setHours(0, 0, 0, 0);
            var selisihHari = Math.floor((tanggalPengembalian - tanggalKembali) / (1000 * 60 * 60 * 24));
            var denda = selisihHari >= 3 ? Math.ceil(selisihHari / 3) * 1000 : 0;
            this.closest('tr').querySelector('.denda').value = denda;
        });
    });
</script>

<script>
    document.querySelectorAll('.tandai-kembali').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();

            var idBuku = this.getAttribute('data-id-buku');
            var idPeminjaman = this.getAttribute('data-id-peminjaman');
            var tanggalPengembalian = this.closest('tr').querySelector('.tanggal_pengembalian').value;
            var denda = this.closest('tr').querySelector('.denda').value;

            // Make an Ajax request
            $.ajax({
                url: '<?= base_url('petugas_tambah_data_pengembalian_real'); ?>',
                type: 'POST',
                data: {
                    id_buku: idBuku,
                    id_peminjaman: idPeminjaman,
                    tanggal_pengembalian: tanggalPengembalian,
                    denda: denda,
                    // Add other data you need to send
                },
                success: function (response) {
                    // Handle the response from the server
                    alert('Book marked as returned!');
                    // You can also update the UI or do other actions based on the response
                },
                error: function () {
                    alert('Error marking book as returned.');
                }
            });
        });
    });
</script>


