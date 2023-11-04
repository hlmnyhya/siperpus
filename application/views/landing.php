<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?= base_url();?>assets/images/logo.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>assets2/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="#">SIPERPUS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Buku</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>SISTEM INFORMASI PERPUSTAKAAN</h1>
          <h2>SMPN 4 KURAU</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="<?= base_url('login');?>" class="btn-get-started scrollto">Login</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="<?= base_url();?>assets/images/logo.png" width="400px" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tersedia Buku</h2>
        </div>

        <div class="row">
        <?php 
        // Acak urutan buku
        shuffle($buku);

        // Ambil 5 buku pertama
        $buku_terpilih = array_slice($buku, 0, 4);

        foreach ($buku_terpilih as $b) :
        ?>
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
                <div class="icon"></div>
                <h4><a><?php echo $b->judul; ?></a></h4>
                <img src="<?php echo base_url('./uploads/cover/'.$b->cover); ?>" width="250px" height="350px" alt="Cover">
                <hr>
                <br>
                <h6><a>Penulis : <?php echo $b->nama_pengarang; ?></a></h6>
                <h6><a>Penerbit : <?php echo $b->nama_penerbit; ?></a></h6>
                <h6><a>Tahun : <?php echo $b->tahun_terbit; ?></a></h6>
            </div>
        </div>
        <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End Services Section -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12">
            <center>
            <p>
              Selamat datang di SISTEM INFORMASI PERPUSTAKAAN SMPN 4 KURAU – tempat di mana pengetahuan bertemu dengan inovasi! Kami hadir untuk membawa dunia literasi ke jari Anda. Dengan koleksi buku yang beragam dan layanan yang ramah, kami membantu Anda menjelajahi cerita-cerita tak terbatas dan mengeksplorasi ilmu pengetahuan yang luas.
              <br>
              Apa pun minat dan ketertarikan Anda, kami memiliki buku-buku terbaik untuk memenuhi keinginan literasi Anda. Dari fiksi hingga non-fiksi, dari sejarah hingga sains, kami menghadirkan berbagai judul terbaru dan klasik untuk memperkaya pikiran Anda. Sistem Informasi Perpustakaan kami memudahkan Anda mencari, meminjam, dan mengevaluasi buku dengan cepat dan mudah.
              <br>
              Di SMPN 4 KURAU, kami percaya bahwa membaca adalah kunci untuk membuka pintu pengetahuan. Oleh karena itu, kami berkomitmen untuk menyediakan akses yang mudah dan menyenangkan ke dunia buku-buku cemerlang. Jadilah bagian dari komunitas literasi kami dan temukan keajaiban kata-kata di setiap halaman.
              <br>
              Sistem Informasi Perpustakaan kami dirancang untuk memudahkan pengguna dalam menelusuri buku-buku, mengatur peminjaman, dan mendapatkan rekomendasi berdasarkan minat baca Anda. Bersama kami, mari jelajahi dunia pengetahuan, membaca cerita-cerita luar biasa, dan menginspirasi diri Anda setiap hari.
              <br>
              Selamat membaca dan selamat menemukan petualangan baru di dunia literasi SMPN 4 KURAU!
            </p>
            </center>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>KONTAK</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Alamat:</h4>
                <p>Kurau, Tanah Laut, Kal-Sel</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>smpn4kurau@gmail.com</p>
              </div>


             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15926.223438934914!2d114.6509583!3d-3.6879986!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6933bb3bdecef%3A0xe5169de9f3e265f0!2sSMPN%204%20KURAU!5e0!3m2!1sen!2sid!4v1699009818906!5m2!1sen!2sid" width="470" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subjek</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Pesan</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SIPERPUS</h3>
            <p>
              Kurau, <br>
              Tanah Laut,<br>
              Kalimantan Selatan <br><br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>SIPERPUS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>assets2/vendor/aos/aos.js"></script>
  <script src="<?= base_url();?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url();?>assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url();?>assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url();?>assets2/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= base_url();?>assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>assets2/js/main.js"></script>

</body>

</html>