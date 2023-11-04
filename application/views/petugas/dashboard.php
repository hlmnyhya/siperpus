
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang!</h3>
                        <h6 class="font-weight-normal mb-0">Sistem Informasi Perpustakaan <span class="text-primary"></span></h6>
                    </div>
                </div>
            </div>
        </div>

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card card-inverse-info">
                <div class="card-body">
                    <p class="mb-4">Total Anggota</p>
                    <p class="fs-30 mb-2"><?= $total_anggota ?></p>
                    <!-- <p>10.00% (30 days)</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-inverse-warning">
                <div class="card-body">
                    <p class="mb-4">Total Buku</p>
                    <p class="fs-30 mb-2"><?= $total_buku ?></p>
                    <!-- <p>10.00% (30 days)</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-inverse-success">
                <div class="card-body">
                    <p class="mb-4">Total Peminjaman</p>
                    <p class="fs-30 mb-2"><?= $total_peminjaman ?></p>
                    <!-- <p>10.00% (30 days)</p> -->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-inverse-danger">
                <div class="card-body">
                    <p class="mb-4">Total Denda</p>
                    <p class="fs-30 mb-2">Rp.<?= $total_denda ?></p>
                    <!-- <p>10.00% (30 days)</p> -->
                </div>
            </div>
        </div>
    </div>
</div>
