<?php
include 'function.php';
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "admin") {
      header("location: indexAdmin.php");
  } else if ($_SESSION['role'] == "administrator") {
    header("location: indexAdmin.php");
}
}

$id_user = $_GET["id_user"];

$tampilpasien = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id_user'");
$tampil = mysqli_fetch_array($tampilpasien);

include 'header-user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI PINTAR</title>
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-profile.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

</head>

<body>
<main id="main">
<section id="contact" class="d-flex align-items-center">
<div class="main-content">
    <!-- Page Heading -->
    <div class="container-fluid mt--7">
        <h1 class="mb-0 text-gray-800">Profile User</h1>
            <div class="my-4"></div>
        <a href="user_profile.php" class="btn btn-info btn-icon-split">
            <span class="text">Profile User</span>
        </a>
        <a href="user_generalProfile.php" class="btn btn-primary btn-icon-split">
            <span class="text">General User</span>
        </a>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
            </div>
            <div class="button-center">
              
            </div>
            <div class="text-center">
                <h3>
                <?=$tampil['nik']?><span class="font-weight-light"></span>
                </h3>
                
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2">Anda bisa mengubah profile yang sudah Anda tambahkan. Ubahlah data dengan lengkap dan benar karena semua kelengkapan data Anda akan tersimpan di database Puskesmas sebagai informasi pasien.</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-judul bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profile</h3>
                </div>
                <div class="col-4 text-right">
                
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="function.php?act=ubahProfile&id_user=<?= $tampil['id_user']; ?>"  id="ubah" method="POST" class="tambah_pasien">
                <h6 class="heading-small text-muted mb-4">Informasi General</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama">Username</label>
                        <input type="text" id="nama" name="nama" class="form-control form-control-alternative" value="<?=$tampil['nama']?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" value="<?=$tampil['nik']?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value="<?=$tampil['email']?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ttl">Tanggal Lahir</label>
                        <input type="date" id="ttl" name="ttl" class="form-control form-control-alternative" value="<?=$tampil['ttl']?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-alternative" value="<?=$tampil['password']?>" required>
                      </div>
                    </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <button type="submit" name="simpan" id="ubah" value="Simpan Data" class="registerbtn btn btn-primary">Update</button>
                <button type="button" onclick="history.back();" class="registerbtn btn btn-secondary">Batal</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>

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
</main>



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