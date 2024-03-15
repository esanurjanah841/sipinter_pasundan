<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == "administrator") {
      header("location: indexAdmin.php");
  }
}

    $id_ptm = $_GET["id_ptm"];

    $queryPTM = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where id_ptm = '$id_ptm'");
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
<header id="header" class="header fixed-top align-items-center">
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
          <li><a class="nav-link scrollto active" href="menuPasien.php">Menu</a></li>
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
                        <table cellpadding="7" cellspacing="7" style="font-size:12px">
                        
                            <tr>
                                <td width="100">Tanggal Pengisian</td>
                                <td>:&emsp;</td>
                                <td width="600" colspan="2"><input type="text" class="form-control form-control-user " id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tampil['tanggal_pengisian']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pemeriksaan</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user " id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"   value="<?php echo $tampil['tanggal_pemeriksaan']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td >NIK</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user "  id="nik" name="nik"  value="<?php echo $tampil['nik']?>" style="font-size:12px" readonly ></td>
                            </tr>
                            <tr>
                                <td>Nama Pasien</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap"  value="<?php echo $tampil['nama_lengkap']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-6">Tanggal Lahir</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="ttl" name="ttl"  value="<?php echo $tampil['ttl']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-6">Jenis Kelamin</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin"  value="<?php echo $tampil['jenis_kelamin']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-6">Provinsi</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?php echo $tampil['provinsi']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-6">Kota/Kabupaten</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?php echo $tampil['kota']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><textarea type="text" class="form-control form-control-user" id="alamat" name="alamat"  value="<?php echo $tampil['alamat']?>" style="font-size:12px" readonly><?php echo $tampil['alamat']?></textarea></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="tlp" name="tlp"  value="<?php echo $tampil['tlp']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="pendidikan" name="pendidikan"  value="<?php echo $tampil['pendidikan']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan"  value="<?php echo $tampil['pekerjaan']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="status" name="status"  value="<?php echo $tampil['status']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="goldar" name="goldar"  value="<?php echo $tampil['goldar']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td>Riwayat Pada Keluarga</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga1" name="riwayatkeluarga1"  value="<?php echo $tampil['riwayatkeluarga1']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga2" name="riwayatkeluarga2"  value="<?php echo $tampil['riwayatkeluarga2']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatkeluarga3" name="riwayatkeluarga3"  value="<?php echo $tampil['riwayatkeluarga3']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Riwayat Pada Sendiri</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri1" name="riwayatsendiri1"  value="<?php echo $tampil['riwayatsendiri1']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri2" name="riwayatsendiri2"  value="<?php echo $tampil['riwayatsendiri2']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="riwayatsendiri3" name="riwayatsendiri3"  value="<?php echo $tampil['riwayatsendiri3']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Merokok</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="merokok" name="merokok"  value="<?= $tampil['merokok']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Aktivitas Fisik < 150 Menit/Minggu  </td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="fisik" name="fisik"  value="<?= $tampil['fisik']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Konsumsi Gula >4 Sendok Makan / Hari</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="gula" name="gula"  value="<?php echo $tampil['gula']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Konsumsi Garam >1 Sendok Teh/ Hari</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="garam" name="garam"  value="<?php echo $tampil['garam']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Konsumsi Lemak >5 Sendok Makan / Hari </td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="lemak" name="lemak"  value="<?php echo $tampil['lemak']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Konsumsi sayur dan buah ≤5 porsi/Hari</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="sayur" name="sayur"  value="<?php echo $tampil['sayur']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Konsumsi Alkohol</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="alkohol" name="alkohol"  value="<?php echo $tampil['alkohol']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Tinggi Badan (cm)</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="tinggi" name="tinggi" value="<?php echo $tampil['tinggi']?>" style="font-size:12px" readonly></td>
                            </tr>
                            <tr>
                                <td width="150">Berat Badan (kg)</td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="berat" name="berat" value="<?php echo $tampil['berat']?>" style="font-size:12px" readonly></td>
                                
                            </tr>
                            
                            <tr>
                                <td width="150">Tekanan Darah Sistol <?php echo "mmHg (<140/90)"?></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="sistol" name="sistol"  value="<?php echo $tampil['sistol']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Tekanan Darah Diastol <?php echo "(mmHg (<140/90))" ?></td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="diastol" name="diastol"  value="<?php echo $tampil['diastol']?>" style="font-size:12px" readonly>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="150">Lingkar Perut (cm)</td>
                                <td>:&emsp;</td>
                                <td colspan="2">
                                <input type="text" class="form-control form-control-user" id="lingkar" name="lingkar"  value="<?php echo $tampil['lingkar']?>" style="font-size:12px" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">Pemeriksaan Gula Darah Sewaktu <?php echo "(mg/dl (<200))" ?></td>
                                <td>:&emsp;</td>
                                <td colspan="2"><input type="text" class="form-control form-control-user" id="periksa_gula" name="periksa_gula" value="<?php echo $tampil['periksa_gula']?>" style="font-size:12px" readonly></td>
                               
                            </tr>
                            
                            <?php
                                $h_imt = $tampil['h_imt'];
                                if($h_imt == "IMT"){
                                    $edukasi = "IMT Anda menunjukan hasil di atas standar. Terapkan perilaku hidup bersih dan sehat, serta lakukan aktivitas fisik rutin minimal 30 menit/hari.";
                                ?>
                                <tr>
                                    <td width="150">Keterangan</td>
                                    <td>:&emsp;</td>
                                    <td colspan="2"><?= $edukasi?></td>
                                </tr>
                                <?php } ?>  

                                <?php
                                $h_hipertensi = $tampil['h_hipertensi'];
                                if($h_hipertensi == "Hipertensi"){
                                    $edukasi = "Pengukuran tekanan darah Anda menunjukan hasil di atas standar. Cegah dan kendalikan hipertensi dengan:<br>
                                    - Mengurangi konsumsi garam (Tidak lebih dari 1 sendok teh/hari <br>
                                    - Melakukan aktivitas fisik teratur minimal 30 menit/hari.<br>
                                    - Tidak merokok dan menghindari asap rokok.<br>
                                    - Diet dengan gizi seimbang. <br>
                                    - Mempertahankan berat badan ideal. <br>
                                    - Menghindari minuman beralkohol.";
                                ?>
                                <tr>
                                    <td width="150">Keterangan</td>
                                    <td>:&emsp;</td>
                                    <td colspan="2"><?= $edukasi?></td>
                                </tr>
                                <?php } ?> 
                                
                                <?php
                                $h_gm = $tampil['h_gm'];
                                if($h_gm == "Diabetes Melitus"){
                                    $edukasi = "Pengukuran gula darah Anda menunjukan hasil di atas standar. Cegah diabetes dengan:<br>
                                    - Mempertahankan berat badan ideal. <br>
                                    - Makan makanan sehat antara 3-5 porsi buah dan sayuran sehari, dan kurangi asupan gula, garam, dan lemak jenuh.<br>
                                    - Rutin beraktivitas fisik minimal 30 menit/hari.<br>
                                    - Kelola stress. <br>
                                    - Tidak merokok dan menghindari asap rokok.<br>
                                    - Menghindari minuman beralkohol.";

                                ?>
                                <tr>
                                    <td width="150">Keterangan</td>
                                    <td>:&emsp;</td>
                                    <td colspan="2"><?= $edukasi?></td>
                                </tr>
                                <?php } ?>

                                <?php
                                $h_obc = $tampil['h_obc'];
                                if($h_obc == "Obesitas Central"){
                                    $edukasi = "Pengukuran lingkar perut Anda menunjukan hasil di atas standar. Lemak perut berlebihan akan memicu masalah kesehatan yang serius seperti serangan jantung. Terapkan pola hidup sehat dengan:<br>
                                    - Konsumsi buah dan sayur minimal 5 porsi setiap hari.<br>
                                    - Batasi tidur berlebihan. <br>
                                    - Rutin beraktivitas fisik minimal 30 menit/hari.<br>
                                    - Batasi konsumsi gula, garam, dan lemak berlebih. <br>
                                    - Biasakan pola makan teratur sesuai kaidah Isi Piringku.<br>";
                                ?>
                                <tr>
                                    <td width="150">Keterangan</td>
                                    <td>:&emsp;</td>
                                    <td colspan="2"><?= $edukasi?></td>
                                </tr>
                                <?php } ?>

                                <?php
                                $h_normal = $tampil['h_normal'];
                                if($h_normal == "Normal"){
                                    $edukasi = "Terima kasih sudah melakukan skrining kesehatan. Selalu jaga kesehatan dan cegah penyakit tidak menular dengan CERDIK yaitu:<br>
                                    - Cek kesehatan rutin.<br>
                                    - Enyahkan asap rokok. <br>
                                    - Rajin olahraga.<br>
                                    - Diet seimbang. <br>
                                    - Kelola stress dengan baik.<br>
                                    
                                    Salam Sehat.
                                    ";
                                ?>
                                <tr>
                                    <td width="150">Keterangan</td>
                                    <td>:&emsp;</td>
                                    <td colspan="2"><?= $edukasi?></td>
                                </tr>
                                <?php } ?>
                            <tr>
                                <td width="150"><h6>Rekomendasi Dokter</h6></td>
                                <td>:&emsp;</td>
                                <td colspan="2"><?= $tampil['feedback']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td></td>
                                <td colspan="2"  style="text-align:center">UPTD PUSKESMAS PASUNDAN<br>
                                <img src="gambar/barcode_uptd.jpg" width="150" height="auto">
                                </td>
                            </tr>
                        </table>    
                                        <br>
                        <div class="modal-footer">
                            <a type=button  onclick="history.back();" class="btn btn-success" style="margin-right:10px">Kembali</a>
                            <a type="button" class="btn btn-warning" href="hasilPTMPrint.php?id_ptm=<?php echo $tampil["id_ptm"]; ?>"> Print</a>
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
    .modal-footer, .navbar, .logo, .main, .header{
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



