
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-1">
                        <h3 class="font-weight-bold">Kartu Anggota</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6> -->
                    </div>
                <!-- </div> -->
            <!-- </div>
        </div> -->

   <div class="container-fluid">
    <div>
         <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-2 m-3">
                    <img style="width: 200px" src="<?= base_url('./uploads/profil/'.$anggota->foto); ?>" alt="Gambar User">
                </div>
                <div class="col-md-4">
                    <table class="table">
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>:</td>
                            <td><?= $anggota->nama; ?></td>
                        </tr>
                        <tr>
                            <td><strong>NIS</strong></td>
                            <td>:</td>
                            <td><?= $anggota->nis; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td>:</td>
                            <td><?= $anggota->jenis_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat, Tanggal Lahir</strong></td>
                            <td>:</td>  
                            <td><?= $anggota->tempat_lahir; ?>, <?= $anggota->tanggal_lahir; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>:</td>
                             <td><?= $anggota->alamat; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telpon</strong></td>
                            <td>:</td>
                             <td><?= $anggota->telp; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
