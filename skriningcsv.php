<?php


include "function.php";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "pasien") {
        header("location: menupasien.php");
    }
} else {
    header("location:index.php");
}


$jumlahPasien = mysqli_query($koneksi, "SELECT COUNT('id_user') as jml_pasien FROM profil_user");
$pasien = mysqli_fetch_assoc($jumlahPasien);

$jumlahPenyakit = mysqli_query($koneksi, "SELECT COUNT('id_penyakit') as jml_penyakit FROM penyakit");
$penyakit = mysqli_fetch_assoc($jumlahPenyakit);

$jumlahGejala = mysqli_query($koneksi, "SELECT COUNT('id_gejala') as jml_gejala FROM gejala");
$gejala = mysqli_fetch_assoc($jumlahGejala);

$jumlahLaporan = mysqli_query($koneksi, "SELECT COUNT('id_riwayat') as jml_riwayat FROM riwayat");
$laporan = mysqli_fetch_assoc($jumlahLaporan);

$jumlahLaporan = mysqli_query($koneksi, "SELECT COUNT('id_riwayat') as jml_riwayat FROM riwayat");
$laporan = mysqli_fetch_assoc($jumlahLaporan);
    
echo $pasien['jml_pasien'];

$jenis_kelamin = $pasien['jml_pasien'];
$jenis_kelamin == "Laki-laki";

echo $jenis_kelamin;

$jumlahPas = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where jenis_kelamin = 'Laki-laki'");
$pas = mysqli_num_rows($jumlahPas);

echo $pas;

$jumlahPas = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where jenis_kelamin = 'Perempuan'");
$pas = mysqli_num_rows($jumlahPas);

echo $pas;


?>