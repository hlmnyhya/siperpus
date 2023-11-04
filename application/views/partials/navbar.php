 <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand ml-3 mt-2" href="index.html"><img src="<?= base_url();?>assets/images/logo.png" width="35px" height="75px" alt="logo"/><br>
        <span><h5 class="mt-2">SIPERPUS</h5></span></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button> -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown"><span> <br>
            <?= $this->session->userdata('username') ?>
          </span>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
             <img src="<?php echo base_url('./uploads/profil/' . $this->session->userdata('foto')); ?>" alt="user" class="rounded-circle" width="31">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <!-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">