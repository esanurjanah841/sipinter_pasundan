<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("location: indexAdminbiasa.php");
    } else if ($_SESSION['role'] == "administrator") {
      header("location: indexadmin.php");
  }
}


    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal= strftime("%A, %d %B %Y");


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
  <?php

if(($nik)==1){
 echo "<script>
 alert('Data Profile belum ditambahkan!');
 document.location.href = 'menupasien.php.php'</script>";
}else{
 echo false;
}

?>
<main id="main">
<section class="test mt-5">
<div class="">
        <div class="solid">
            <div class="form-row">
                <div class="panel-heading">
                <center>
                <img src="gambar/kartu-logo.png" width="600" height="90" style="margin-bottom: 50px"></center>
                    <h3 style="font-family: poppins; margin-top: 20px; text-align:center;"></h3>
                    <a style="font-family: poppins; margin-top: 20px"></a>
                </div>
                <div class="panel-body">
                <div class="box-body table-responsive"><?php 
                                    $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat, p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar from user b, profil_user p where b.nik=p.nik and b.id_user='$_SESSION[id_user]' group by nik");
                                    while($tampil = mysqli_fetch_array($tampiluser)){
                                ?>
                    <form action="function.php?act=tambahPTM" id="tambah" method="POST" class="tambah_pasien">
                        <table cellpadding="7" cellspacing="7">
                        <input type="hidden" id="id_user" name="id_user"   value="<?php echo $tampil['id_user']?>">
                        <input type="hidden" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tanggal;?>" >
                            <tr>
                                <td width="500">NIK</td>
                                <td>:&emsp;</td>
                                <td width="500"><input type="text" class="form-control form-control-user "  id="nik" name="nik"  value="<?php echo $tampil['nik']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Nama Pasien</td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap"  value="<?php echo $tampil['nama_lengkap']?>" readonly></td>
                            </tr>
                            <tr>
                                <td width="150" class="col-lg-6">Tanggal Lahir</td>
                                <td>:&emsp;</td>
                                <td><input type="date" class="form-control form-control-user" id="ttl" name="ttl"  value="<?php echo $tampil['ttl']?>" readonly></td>
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
                                <td width="150">Alamat Lengkap</td>
                                <td>:&emsp;</td>
                                <td><textarea type="text" class="form-control form-control-user" id="alamat" name="alamat"  value="<?php echo $tampil['alamat']?>"></textarea></td>
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
                                <td width="150">Riwayat Pada Keluarga </td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatkeluarga1" id="riwayatkeluarga1" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatkeluarga2" id="riwayatkeluarga2" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatkeluarga3" id="riwayatkeluarga3" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Riwayat Pada Diri Sendiri</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatsendiri1" id="riwayatsendiri1" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatsendiri2" id="riwayatsendiri2" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="riwayatsendiri3" id="riwayatsendiri3" class="form-control form-control-user" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                    <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                    <option value="Penyakit Asma">Penyakit Asma</option>
                                    <option value="Penyakit Jantung">Penyakit Jantung</option>
                                    <option value="Penyakit Stroke">Penyakit Stroke</option>
                                    <option value="Penyakit Kanker">Penyakit Kanker</option>
                                    <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Merokok</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="merokok" id="merokok" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Aktivitas Fisik < 150 Menit/Minggu  </td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="fisik" id="fisik" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Gula >4 Sendok Makan / Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="gula" id="gula" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Garam >1 Sendok Teh/ Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="garam" id="garam" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Lemak >5 Sendok Makan / Hari </td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="lemak" id="lemak" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi sayur dan buah ≤5 porsi/Hari</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="sayur" id="sayur" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Konsumsi Alkohol</td>
                                <td>:&emsp;</td>
                                <td>
                                <select name="alkohol" id="alkohol" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Tinggi Badan </td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" id="tinggi" name="tinggi"></td>
                                <td>cm</td>
                            </tr>
                            <tr>
                                <td width="150">Berat Badan </td>
                                <td>:&emsp;</td>
                                <td><input type="text" class="form-control form-control-user" style="width:20" id="berat" name="berat" ></td>
                                <td>kg</td>
                            </tr>
                            
                            <input type="hidden" id="status_post" name="status_post"   value="Menunggu Validasi">
                        </table>    
                                        <br>
                        <div class="modal-footer">
                            <button type="button" style="margin:5px" class="btn btn-danger" onclick="history.back();">Batal</button>
                            <button type="submit" style="margin:5px" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
                            <button type="button" style="margin:5px;color:white;" class="btn btn-warning" onclick="window.print()"><i class="fas fa-print" > Print</i></button>
                        </div>
                    </form>
                    <?php } ?>
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
    .modal-footer, .navbar, .logo, .main, header {
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



