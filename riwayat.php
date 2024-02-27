<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "admin") {
      header("location: indexAdminbiasa.php");
  } else if ($_SESSION['role'] == "administrator") {
    header("location: indexadmin.php");
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
  <link href="css/sb-admin-2.css" rel="stylesheet">

      <!-- Custom styles for this page -->
      <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
          <a class="navbar-brand fw-bold" href="menupasien.php">
              <div class="sidebar-brand-icon">
                  <img src="gambar/Logo-Sipinter.png" width="175" height="auto" alt="logo" />
              </div>
          </a>
       
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="menupasien.php">Menu</a></li>
          <li><a class="nav-link scrollto" href="riwayat.php">Riwayat</a></li>
          <li class="dropdown"><a href="#"><span>User Pasien</span> <i class="fas fa-user"></i></a>
            <ul>
              <li><a href="user_profile.php"><span>Profile</span> <i class="fas fa-address-card"></i></a></li>
              <li><a href="logout.php"><span>Log Out</span> <i class="fas fa-door-open"></i></a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<main id="main">
<!-- ======= Services Section ======= -->
<section class="services" style="margin-top: 70px;">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Riwayat Pasien</h2>
      <i>Riwayat Hasil Skrining Pasien</i>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Riwayat SRQ</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 70px; font-family:poppins; font-size:14px;">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pengisian</th>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Lahir</th>
              <th>No. Telepon</th>
              <th>Hasil Skrining</th>
              <th>Gejala</th>
              <th>Kelola</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $no= 0;
          $queryRiwayat = mysqli_query($koneksi, "SELECT DISTINCT b.tanggal_pengisian, b.nama_lengkap, b.ttl, b.alamat, b.tlp, b.penyakit, b.nik, b.gejala, b.id_riwayat FROM user p, riwayat b where b.nik = p.nik and id_user='$_SESSION[id_user]' group by id_riwayat");
          while ($data = mysqli_fetch_array($queryRiwayat)) { 
          $no ++;?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $data['tanggal_pengisian']; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $data['nama_lengkap']; ?></td>
              <td><?= $data['ttl']; ?></td>
              <td><?= $data['tlp']; ?></td>
              <td><?= $data['penyakit']; ?></td>
              <td><?= $data['gejala']; ?></td>
              <td>
                <a href="function.php?act=hapusRiwayat&id_riwayat=<?= $data['id_riwayat']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split">
                  <span class="text">Hapus</span>
                </a>
                <a href="detailSRQ.php?id_riwayat=<?php echo $data['id_riwayat']; ?>" class="btn btn-warning btn-icon-split">
                  <span class="text">Lihat</span>
                </a>
              </td>
            </tr>
            <?php } ?> 
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
  
</section><!-- End Services Section -->

<section class="services" style="margin-top: -50px;">
  <div class="container">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data PTM Terkirim</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 70px; font-family:poppins; font-size:14px;">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pengisian</th>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Lahir</th>
              <th>No. Telepon</th>
              <th>Status</th>
              <th>Kelola</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $nourut = 0;
          $queryPTM = mysqli_query($koneksi, "SELECT DISTINCT  b.id_ptm, b.tanggal_pengisian, b.nik, b.nama_lengkap, b.tlp, b.ttl, b.status_post FROM ptm_pasien b, user p where p.nik = b.nik and b.id_user='$_SESSION[id_user]' group by id_ptm");
          while ($hasil = mysqli_fetch_array($queryPTM)) { 
          $nourut ++;?>
          
              <td><?= $nourut ?></td>
              <td><?= $hasil['tanggal_pengisian']; ?></td>
              <td><?= $hasil['nik']; ?></td>
              <td><?= $hasil['nama_lengkap']; ?></td>
              <td><?= $hasil['ttl']; ?></td>
              <td><?= $hasil['tlp']; ?></td>
              <td>
              <?php
                $status_post = $hasil['status_post'];
                if($status_post == "Menunggu Validasi"){
                  echo "<a class=\"btn btn-danger btn-icon-split\" style=\"font-size:12px; padding:5px\">
                    <span>
                      $status_post
                    </span>
                   </a>";
                  }elseif($status_post == "Sudah Validasi"){
                    echo "<a class=\"btn btn-success btn-icon-split\" style=\"font-size:12px; padding:5px\">
                      <span>
                        $status_post
                          </span>
                      </a>";
                  }
              ?>                
              </td>
              <td>
                <a href="function.php?act=hapusPTM&id_ptm=<?= $hasil['id_ptm']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split">
                  <span class="text">Hapus</span>
                </a>
                <a href="hasilskrining.php?id_ptm=<?php echo $hasil['id_ptm']; ?>" class="btn btn-warning btn-icon-split">
                  <span class="text">Lihat</span>
                </a>
              </td>
            </tr>
            <?php } ?> 
          </tbody>
        </table>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>