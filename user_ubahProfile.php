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
        <a href="user_profile.php" class="btn btn-primary btn-icon-split">
            <span class="text">Profile User</span>
        </a>
        <a href="user_generalprofile.php" class="btn btn-info btn-icon-split">
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
                <?=$lihat['nama_lengkap']?><span class="font-weight-light"></span>
                </h3>
                <?php
                      $tampillokasi = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat,  p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar from user b, profil_user p where b.id_user=p.id_user and p.id_user='$_SESSION[id_user]' group by id_user");
                      while ($tampil = mysqli_fetch_array($tampillokasi)){
                      
                      ?>
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
                
                </div>
              </div>
            </div>
            <div class="card-body">
            <h6 class="heading-small text-muted mb-4">Informasi Profile</h6>
            <?php
            $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat, p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar, p.bpjs from user b, profil_user p where b.nik=p.nik and b.id_user='$_SESSION[id_user]' group by nik");
            while($tampil = mysqli_fetch_array($tampiluser)){
            ?>
              <form action="function.php?act=ubahProfilePasien&id_user=<?= $tampil['id_user']; ?>"  id="ubah" method="POST" class="tambah_pasien">
                
                <div class="pl-lg-4">
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $tampil['id_user']?>">    
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" value="<?=$tampil['nik']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="bpjs">No. BPJS</label>
                        <input type="text" id="bpjs" name="bpjs" class="form-control form-control-alternative" minlength="13" maxlength="13" value="<?=$tampil['bpjs']?>">
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
                        <input type="date" id="ttl" name="ttl" class="form-control form-control-alternative" value="<?=$tampil['ttl']?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Pilih salah satu</option>
                            <option value="Laki-laki" <?php if ($tampil['jenis_kelamin'] == "Laki-laki") echo "selected" ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if ($tampil['jenis_kelamin'] == "Perempuan") echo "selected" ?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                        <input id="alamat" name="alamat" class="form-control form-control-alternative" value="<?=$tampil['alamat']?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" class="form-control form-control-alternative" value="<?=$tampil['provinsi']?>">
                      </div>
                    </div>
                  
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="kota">Kota</label>
                        <input type="text" id="kota" name="kota" class="form-control form-control-alternative" value="<?=$tampil['kota']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="tlp">No. Telepon</label>
                        <input type="text" id="tlp" name="tlp" class="form-control form-control-alternative" value="<?=$tampil['tlp']?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                        <select name="pendidikan" id="pendidikan" class="form-control form-control-user" aria-label="Default select example" required>
                        <option selected>Pilih Pendidikan Terakhir</option>
                        <option value="Tidak Sekolah" <?php if ($tampil['pendidikan'] == "Tidak Sekolah") echo "selected" ?>>Tidak Sekolah</option>
                        <option value="SD/SLTP" <?php if ($tampil['pendidikan'] == "SD/SLTP") echo "selected" ?>>SD/SLTP</option>
                        <option value="SLTA" <?php if ($tampil['pendidikan'] == "SLTA") echo "selected" ?>>SLTA</option>
                        <option value="Diploma" <?php if ($tampil['pendidikan'] == "Diploma") echo "selected" ?>>Diploma</option>
                        <option value="Sarjana" <?php if ($tampil['pendidikan'] == "Sarjana") echo "selected" ?>>Sarjana</option>
                        <option value="Pascasarjana" <?php if ($tampil['pendidikan'] == "Pascasarjana") echo "selected" ?>>Pascasarjana</option>
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                      <select name="pekerjaan" id="pekerjaan" class="form-control form-control-user" aria-label="Default select example" required>
                          <option selected>Pilih Pekerjaan</option>
                          <option value="Petani" <?php if ($tampil['pekerjaan'] == "Petani") echo "selected" ?>>Petani</option>
                          <option value="Pedagang / Wiraswasta" <?php if ($tampil['pekerjaan'] == "Pedagang / Wiraswasta") echo "selected" ?>>Pedagang / Wiraswasta</option>
                          <option value="Nelayan" <?php if ($tampil['pekerjaan'] == "Nelayan") echo "selected" ?>>Nelayan</option>
                          <option value="Pendidikan" <?php if ($tampil['pekerjaan'] == "Pendidikan") echo "selected" ?>>Pendidikan</option>
                          <option value="Pengemudi" <?php if ($tampil['pekerjaan'] == "Pengemudi") echo "selected" ?>>Pengemudi</option>
                          <option value="Pensiunan" <?php if ($tampil['pekerjaan'] == "Pensiunan") echo "selected" ?>>Pensiunan</option>
                          <option value="TNI/Polri" <?php if ($tampil['pekerjaan'] == "TNI/Polri") echo "selected" ?>>TNI/Polri</option>
                          <option value="PNS" <?php if ($tampil['pekerjaan'] == "PNS") echo "selected" ?>>PNS</option>
                          <option value="Buruh" <?php if ($tampil['pekerjaan'] == "Buruh") echo "selected" ?>>Buruh</option>
                          <option value="Dosen/Guru" <?php if ($tampil['pekerjaan'] == "Dosen/Guru") echo "selected" ?>>Dosen/Guru</option>
                          <option value="Ibu Rumah Tangga" <?php if ($tampil['pekerjaan'] == "Ibu Rumah Tangga") echo "selected" ?>>Ibu Rumah Tangga</option>
                          <option value="Karyawan / Pegawai" <?php if ($tampil['pekerjaan'] == "Karyawan / Pegawai") echo "selected" ?>>Karyawan / Pegawai</option>
                          <option value="Belum Bekerja" <?php if ($tampil['pekerjaan'] == "Belum Bekerja") echo "selected" ?>>Belum Bekerja</option>
                          <option value="Dokter/Bidan" <?php if ($tampil['pekerjaan'] == "Dokter/Bidan") echo "selected" ?>>Dokter/Bidan</option>
                          <option value="Pelajar" <?php if ($tampil['pekerjaan'] == "Pelajar") echo "selected" ?>>Pelajar</option>
                          <option value="Lainnya" <?php if ($tampil['pekerjaan'] == "Lainnya") echo "selected" ?>>Lainnya</option>
                        </select> 
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="status">Status Perkawinan</label>
                        <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                        <option selected>Pilih Status Perkawinan</option>
                        <option value="Menikah" <?php if ($tampil['status'] == "Menikah") echo "selected" ?>>Menikah</option>
                        <option value="Belum Menikah" <?php if ($tampil['status'] == "Belum Menikah") echo "selected" ?>>Belum Menikah</option>
                        <option value="Janda/Duda" <?php if ($tampil['status'] == "Janda/Duda") echo "selected" ?>>Belum Kawin</option>
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="goldar">Golongan Darah</label>
                        <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                        <option selected>Pilih Golongan Darah</option>
                        <option value="A" <?php if ($tampil['goldar'] == "A") echo "selected" ?>>A</option>
                        <option value="B" <?php if ($tampil['goldar'] == "B") echo "selected" ?>>B</option>
                        <option value="AB" <?php if ($tampil['goldar'] == "AB") echo "selected" ?>>AB</option>
                        <option value="O" <?php if ($tampil['goldar'] == "O") echo "selected" ?>>O</option>
                    </select>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="simpan" id="ubah" value="Simpan Data" class="registerbtn btn btn-primary">Update</button>
                <button type="button" onclick="history.back();" class="registerbtn btn btn-secondary">Batal</button>
              </form>
              <?php } ?>
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