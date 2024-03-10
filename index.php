<?php
include "function.php";
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "admin") {
      header("location: indexAdmin.php");
  } elseif ($_SESSION['role'] == "administrator") {
    header("location: indexAdmin.php");
  }elseif ($_SESSION['role'] == "pasien") {
    header("location: menuPasien.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SI PINTER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="gambar/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
          <a class="navbar-brand fw-bold" href="#page-top">
              <div class="sidebar-brand-icon">
                  <img src="gambar/Logo-Sipinter.png" width="175" height="auto" alt="logo" />
              </div>
          </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Tahapan Skrining</a></li>
          <li><a class="login" data-bs-toggle="modal" data-bs-target="#feedbackModal">Log In</a></li>
          <li><a class="register" href="register.php">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
<div style="position:fixed;left:20px;bottom:20px; z-index: 1000 !important;">
      <a href="https://wa.me/6281321251201" target="_blank">
      <img src="gambar/hotline.png" style="vertical-align:middle; max-height: 80px;"></a>
    </div>
<div class="container">
  <div class="row">
    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Ayo Skrining Kesehatan!!!</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">
        <p>Skrining kesehatan merupakan langkah penting dalam upaya pencegahan penyakit, deteksi dini, dan menjaga tubuh tetap sehat.</p>
        <p>Dengan melakukan Skrining Kesehatan, Anda dapat mengetahui kondisi kesehatan diri sendiri, serta potensi penyakit apa yang bisa Anda alami di kemudian hari.</p>
        <p>Dengan mengetahuinya sedini mungkin, Anda pun dapat melakukan tindakan pencegahan lebih cepat, sehingga resiko penyakit pun dapat diturunkan.</p>
        <p>Ayo Skrining Kesehatan untuk memastikan kebahagiaan dan kualitas hidup yang optimal bagi diri sendiri dan keluarga!!!</p></h2>
      <div data-aos="fade-up" data-aos-delay="800">
        <a href="register.php" class="btn-get-started scrollto">
              <span class="text">Yu Mulai!</span>
                  <span class="icon">
                      <i class="fas fa-play"></i>
                  </span>
        </a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
      <img src="gambar/Header-Home.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->

<main id="main">
<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Tahapan Skrining Kesehatan</h2>
      <p>Tahapan Sistem Pakar Skrining Kesehatan Aplikasi SIPINTER terdiri dari 4 tahapan yaitu:</p>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
          <img src="gambar/LogIn-Sipinter.png" class="card-img-top" alt="...">
          <h4 class="title"><a href="">1. Log In</a></h4>
          <p class="description">Pengguna harus melakukan login sebelum melakukan skrining, dan lakukan registrasi jika belum memiliki akun.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
          <img src="gambar/Profile-Sipinter.png" class="card-img-top" alt="...">
          <h4 class="title"><a href="">2. Isi Profile</a></h4>
          <p class="description">Pengguna diwajibkan mengisi kelengkapan profile user terlebih dahulu sebelum lanjut ke tahap skrining kesehatan.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
          <img src="gambar/Skrining.png" class="card-img-top" alt="...">
          <h4 class="title"><a href="">3. Tahapan Skrining</a></h4>
          <p class="description">Dalam tahap ini pengguna akan diberikan beberapa pertanyaan terkait dengan gejala yang dialami.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
          <img src="gambar/Hasil-sipinter.png" class="card-img-top" alt="...">
          <h4 class="title"><a href="">4. Hasil</a></h4>
          <p class="description">Tahap ini merupakan tahap akhir dimana pengguna selesai melaksanakan tahap skrining, pengguna akan diberikan hasil akhir dari skrining.</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Services Section -->

<footer id="footer">
<div class="container">
  <div class="row d-flex align-items-center">
    <div class="text-center">
      <div class="copyright">
        &copy; Copyright <strong>SIPINTER</strong>. Puskesmas Pasundan 2024. All Rights Reserved
      </div>
    </div>
  </div>
</div>
</footer><!-- End Footer -->
</main><!-- End #main -->

<!-- Login Modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Login Aplikasi SIPINTER</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                            <!-- Name input-->
                      <div class="modal-body">
                        <form class="tambah_pasien" id="login-form" action="function.php?act=login" method="POST">
                            <div class="form-group ">
                              <label for="nama">Username</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                  placeholder="Username" required>
                            </div>
                            <div class="my-4"></div>
                              <div class="form-group">
                                <label for="pass">Password</label>
                                  <input type="password" class="form-control form-control-user" id="password" name="password"
                                    placeholder="Password" required>
                              </div>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#LupaPassword" style="font-size:14px">Lupa Password?</a>
                              <div class="my-4"></div>
                              <div class="modal-footer">
                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                <button type="submit" name="login_btn" id="login" value="Login" class="btn btn-success">Log In</button>
                              </div>
                        </form>
                      </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- Lupa Password Modal-->
          <div class="modal fade" id="LupaPassword" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Lupa Password</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                            <!-- Name input-->
                      <div class="modal-body">
                        <form class="tambah_pasien" id="login-form" action="cekforget.php" method="POST">
                          <div class="form-group">
                            <label for="email">Inputkan Email Anda</label>
                              <input type="text" class="form-control form-control-user" id="email" name="email"
                                  placeholder="Email" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                            <button type="submit" name="submit_email" id="login" value="Login" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
              </div>
            </div>
        </div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>


