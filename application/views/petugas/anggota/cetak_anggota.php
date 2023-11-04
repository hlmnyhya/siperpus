<style>
    .card {
        width: 500px;
        height: 300px; /* Menyesuaikan tinggi kartu */
        border: 1px solid #000;
        display: flex;
        flex-direction: column; /* Menyusun elemen secara vertikal */
        align-items: center; /* Mengatur elemen secara horisontal di tengah kartu */
        justify-content: space-around; /* Menyusun elemen secara merata */
        /* text-align: center;  */
    }

    .card .logo {
        text-align: center;
        display: flex;
        align-items: center;
        margin-top: 20px;
        border-bottom: 1px solid #000; /* Menambahkan garis di bawah kop */
        padding-bottom: 10px; /* Menambahkan ruang di bawah garis */
    }

    .card .logo img {
        width: 50px;
        margin-right: 10px;
        border-radius: 50%;
    }

    .card .content {
        display: flex;
        flex-direction: row; /* Menyusun elemen secara horizontal */
        align-items: center;
    }

    .card .content .left img {
        margin-right: 10px;
        width: 100px;
        border-radius: 50%;
    }

    .card .right {
        padding: 10px;
        margin-top: 10px;
        margin-left: 30px;
        display: flex;
        flex-direction: column;
    }

    .card .right p {
        margin: 5px 0;
        display: flex;
    }

    .card .right p strong {
        min-width: 150px;
        display: inline-block;
    }
</style>

<script>
    window.onload = print_d();

    function print_d() {
        window.print();
    }

    window.onfocus = function() {
        window.close();
    }
</script>

<div class="card">
    <div class="logo">
        <img src="<?= base_url();?>assets/images/logo.png" alt="Logo" />
        <div>
            <h5>SMP 4 KURAU</h5>
            <h5>KARTU ANGGOTA PERPUSTAKAAN</h5>
        </div>
    </div>
    <div class="content">
        <div class="left">
             <img src="<?= base_url('./uploads/profil/'.$anggota->foto); ?>" alt="FOTO">
        </div>
        <div class="right">
            <p><strong>Nama</strong> : <?= $anggota->nama; ?></p>
            <p><strong>NIS</strong> : <?= $anggota->nis; ?></p>
            <p><strong>Jenis Kelamin</strong> : <?= $anggota->jenis_kelamin; ?></p>
            <p><strong>Tempat, Tanggal Lahir</strong> : <?= $anggota->tempat_lahir; ?>, <?= $anggota->tanggal_lahir; ?></p>
            <p><strong>Alamat</strong> : <?= $anggota->alamat; ?></p>
            <p><strong>Telepon</strong> : <?= $anggota->telp; ?></p>
        </div>
    </div>
</div>
