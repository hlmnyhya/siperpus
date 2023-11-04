<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url();?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url();?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url();?>assets/images/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <img src="<?= base_url();?>assets/images/logo.png" width="80px" alt="logo" class="mb-3">
              <h4>Selamat Datang!</h4>
              <h6 class="font-weight-light">Silakan Login untuk melanjutkan.</h6>
                   <?= $this->session->flashdata('info'); ?>
              <form action="<?= base_url('login/auth') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="<?= base_url('dashboard_petugas');?>">SIGN IN</a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src=".<?= base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?= base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url();?>assets/js/template.js"></script>
  <script src="<?= base_url();?>assets/js/settings.js"></script>
  <script src="<?= base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
