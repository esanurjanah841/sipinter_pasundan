<?php 
include 'function.php';
if (isset($_SESSION['role'])) 
    if ($_SESSION['role'] == "admin") {
        header("location: indexAdmin.php");
    }

    $id_ptm = $_GET["id_ptm"];

    $queryPTM = mysqli_query($koneksi, "SELECT * FROM ptm_pasien where id_ptm = '$id_ptm'");
    $tampil = mysqli_fetch_assoc($queryPTM);
   

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
  <link rel="stylesheet" href="custom.css" />
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
<section class="test mt-5">
<div class="">
        <div class="solid">
            <div class="form-row">
                <div class="panel-heading">
                <center>
                <img src="gambar/kartu-logo.png" width="600" height="90" style="margin-bottom: 50px"></center>
                </div>
                <div class="panel-body">
                <div class="box-body table-responsive">
                  
                    <form action="" id="tambah" method="POST" class="tambah_pasien">
                        <table cellpadding="7" cellspacing="7">
                        
                            <tr>
                                <td width="100">Tanggal Pengisian</td>
                                <td>:&emsp;</td>
                                <td width="600"><input type="text" class="form-control form-control-user " id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tampil['tanggal_pengisian']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">NIK</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user "  id="nik" name="nik"  value="<?php echo $tampil['nik']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Nama Pasien</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap"  value="<?php echo $tampil['nama_lengkap']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150" class="col-lg-6">Tanggal Lahir</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="ttl" name="ttl"  value="<?php echo $tampil['ttl']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150" class="col-lg-6">Jenis Kelamin</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin"  value="<?php echo $tampil['jenis_kelamin']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150" class="col-lg-6">Provinsi</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?php echo $tampil['provinsi']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150" class="col-lg-6">Kota/Kabupaten</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?php echo $tampil['kota']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Alamat</td>
                                <td>:&emsp;</td>
                                <td><textarea type="text" class="form-control form-control-user" id="alamat" name="alamat"  value="<?php echo $tampil['alamat']?>" readonly><?php echo $tampil['alamat']?></textarea></td>
                            </tr>
                            <tr>
                                <td width="150">No. Telepon</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="tlp" name="tlp"  value="<?php echo $tampil['tlp']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Pendidikan Terakhir</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="pendidikan" name="pendidikan"  value="<?php echo $tampil['pendidikan']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Pekerjaan</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan"  value="<?php echo $tampil['pekerjaan']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Status Perkawinan</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="status" name="status"  value="<?php echo $tampil['status']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Golongan Darah</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="goldar" name="goldar"  value="<?php echo $tampil['goldar']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Riwayat Pada Keluarga</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga1" name="riwayatkeluarga1"  value="<?php echo $tampil['riwayatkeluarga1']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga2" name="riwayatkeluarga2"  value="<?php echo $tampil['riwayatkeluarga2']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga3" name="riwayatkeluarga3"  value="<?php echo $tampil['riwayatkeluarga3']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Riwayat Pada Sendiri</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri1" name="riwayatsendiri1"  value="<?php echo $tampil['riwayatsendiri1']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri2" name="riwayatsendiri2"  value="<?php echo $tampil['riwayatsendiri2']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri3" name="riwayatsendiri3"  value="<?php echo $tampil['riwayatsendiri3']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Merokok</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="merokok" name="merokok"  value="<?= $tampil['merokok']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Aktivitas Fisik < 150 Menit/Minggu  </td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="fisik" name="fisik"  value="<?= $tampil['fisik']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Gula >4 Sendok Makan / Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="gula" name="gula"  value="<?php echo $tampil['gula']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Garam >1 Sendok Teh/ Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="garam" name="garam"  value="<?php echo $tampil['garam']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Lemak >5 Sendok Makan / Hari </td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="lemak" name="lemak"  value="<?php echo $tampil['lemak']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi sayur dan buah ≤5 porsi/Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="sayur" name="sayur"  value="<?php echo $tampil['sayur']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Alkohol</td>
                                <td>:&emsp;</td>
                                <td>
                                <input type="text" class="form-control form-control-user" id="alkohol" name="alkohol"  value="<?php echo $tampil['alkohol']?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Tinggi Badan </td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="tinggi" name="tinggi" value="<?php echo $tampil['tinggi']?>"></td>
                                <td>cm</td>
                            </tr>
                            <tr>
                                <td width="150">Berat Badan </td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="berat" name="berat" value="<?php echo $tampil['berat']?>"></td>
                                <td>kg</td>
                            </tr>
                            
                            
                            
                        </table>    
                                        <br>
                        <div class="modal-footer">
                            <a type=button  onclick="history.back();" class="btn btn-success" style="margin-right:10px">Kembali</a>
                            <button type="button" class="btn btn-warning" onclick="window.print()" style="color:white;"><i class="fas fa-print" > Print</i></button>
                        </div>
                    </form>

                </div>
                
</section>    
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}

</script>
 
<style>
    @media print {
    .modal-footer, .navbar, .logo, .main, header{
      display: none;
    }
}

.solid {
    border: solid;
    padding : 25px;
    margin : 20px;
    }


.form-group{
    font-family : "poppins";
    font-size: 16px;
    margin-top : 10px;
    
}

.label-text{
    margin-top:15px;
    margin-bottom : 10px;

}

.text {
    margin-top:30px;
    margin-bottom : 10px;
}

.form-control{
    
}

</style>
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



