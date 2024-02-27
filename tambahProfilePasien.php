<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "admin") {
      header("location: indexAdminbiasa.php");
  } else if ($_SESSION['role'] == "administrator") {
    header("location: indexadmin.php");
}
}

    $tampilpasien = mysqli_query($koneksi, "SELECT * FROM user where id_user='$_SESSION[id_user]'");
    $lihat = mysqli_fetch_array($tampilpasien);

    $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT b.nik, b.id_user, p.nik, p.id_user FROM profil_user b, user p WHERE b.nik = p.nik and b.id_user='$_SESSION[id_user]'");
    $tampil = mysqli_fetch_array($tampiluser);
    
    $nik = $tampil['nik'];
    

include 'header-user.php';
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

  <link href="css/sb-profile.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<main id="main">

<?php

 if($nik==0){
  echo include 'tambahprofileuji.php';
}else{
  echo include 'user_profileread.php';
}

?>

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

</body>

</html>


