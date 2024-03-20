<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "admin") {
      header("location: indexAdmin.php");
  } else if ($_SESSION['role'] == "administrator") {
    header("location: indexAdmin.php");
}
}

$tampilpasien = mysqli_query($koneksi, "SELECT * FROM user where id_user='$_SESSION[id_user]'");
$lihat = mysqli_fetch_array($tampilpasien);

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

    <title>SI PINTER</title>
    <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="gambar/favicon.ico" />


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
        <a href="user_profile.php" class="btn btn-primary btn-icon-split">
            <span class="text">Profile User</span>
        </a>
        <a href="user_generalProfile.php" class="btn btn-info btn-icon-split">
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
                <?php
                      $tampillokasi = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat,  p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar from user b, profil_user p where b.id_user=p.id_user and p.id_user='$_SESSION[id_user]' group by id_user");
                      while ($tampil = mysqli_fetch_array($tampillokasi)){
                      
                      ?>
                <?=$tampil['nama_lengkap']?><span class="font-weight-light"></span>
                </h3>
                
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"><?=$tampil['kota']?>, <?=$tampil['provinsi']?></i>
                </div>
                <?php } ?>
                
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
                <a href="user_ubahProfile.php" class="btn btn-sm btn-primary">
                    <span class="icon text-white-20">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Edit Profile</span>
                </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informasi Profile</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <?php
                      $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat, p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar, p.bpjs from user b, profil_user p where  b.nik=p.nik and b.id_user='$_SESSION[id_user]' group by nik");
                      while ($tampil = mysqli_fetch_array($tampiluser)){
                      
                      ?>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" value="<?=$tampil['nik']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="bpjs">No. BPJS</label>
                        <input type="text" id="bpjs" name="bpjs" class="form-control form-control-alternative" value="<?=$tampil['bpjs']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                        <input id="nama_lengkap" name="nama_lengkap" class="form-control form-control-alternative" value="<?=$tampil['nama_lengkap']?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ttl">Tanggal Lahir</label>
                        <input type="text" id="ttl" name="ttl" class="form-control form-control-alternative" value="<?=$tampil['ttl']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-alternative" value="<?=$tampil['jenis_kelamin']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                        <input id="alamat" name="alamat" class="form-control form-control-alternative" value="<?=$tampil['alamat']?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" class="form-control form-control-alternative" value="<?=$tampil['provinsi']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="kota">Kota/Kabupaten</label>
                        <input type="text" id="kota" name="kota" class="form-control form-control-alternative" value="<?=$tampil['kota']?>" readonly>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="tlp">No. Telepon</label>
                        <input type="text" id="tlp" name="tlp" class="form-control form-control-alternative" value="<?=$tampil['tlp']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                        <input type="text" id="pendidikan" name="pendidikan" class="form-control form-control-alternative" value="<?=$tampil['pendidikan']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control form-control-alternative" value="<?=$tampil['pekerjaan']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="status">Status Perkawinan</label>
                        <input type="text" id="status" name="status" class="form-control form-control-alternative" value="<?=$tampil['status']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="goldar">Golongan Darah</label>
                        <input type="text" id="goldar" name="goldar" class="form-control form-control-alternative" value="<?=$tampil['goldar']?>"readonly>
                      </div>
                    </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>
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