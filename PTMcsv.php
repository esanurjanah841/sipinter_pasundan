<?php
include "function.php";
$filename = 'LaporanPTM'.date("Ymd").'.csv';
  
// Select query
$result = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
$dataPTM = array();
// file creation
$file = fopen($filename,"w");
$no = 0;
  
// Header row - Remove this code if you don't want a header row in the export file.
$dataPTM = array("No","Tanggal Pemeriksaan","NIK","Nama Pasien", "Tanggal Lahir", "Jenis Kelamin", "Provinsi", "Kota/Kab", "Alamat", "No. Telepon", "Status Pendidikan", "Pekerjaan", "Status Perkawinan", "Golongan Darah", "Riwayat Pada Keluarga 1", "Riwayat Pada Keluarga 2","Riwayat Pada Keluarga 3","Riwayat Pada Sendiri 1", "Riwayat Pada Sendiri 2","Riwayat Pada Sendiri 3","Merokok", "Kurang Aktivitas Fisik", "Gula Berlebihan", "Garam Berlebihan", "Lemak Berlebihan", "Kurang Makan Buah dan Sayur", "Konsumsi Alkohol","Sistol", "Diastol", "Tinggi Badan (cm)", "Berat Badan (kg)",  "Lingkar Perut (cm)", "Pemeriksaan Gula"); 
fputcsv($file,$dataPTM); 
while($row = mysqli_fetch_array($result)){
    $no++;
    $tanggal_pemeriksaan = $row['tanggal_pemeriksaan'];
    $nik = $row['nik'];
    $nama_lengkap = $row['nama_lengkap'];
    $ttl = $row['ttl'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $provinsi = $row['provinsi'];
    $kota = $row['kota'];
    $alamat = $row['alamat'];
    $tlp = $row['tlp'];
    $pendidikan = $row['pendidikan'];
    $pekerjaan = $row['pekerjaan'];
    $status = $row['status'];
    $goldar = $row['goldar'];
    $riwayatkeluarga1 = $row['riwayatkeluarga1'];
    $riwayatkeluarga2 = $row['riwayatkeluarga2'];
    $riwayatkeluarga3 = $row['riwayatkeluarga3'];
    $riwayatsendiri1 = $row['riwayatsendiri1'];
    $riwayatsendiri2 = $row['riwayatsendiri2'];
    $riwayatsendiri3 = $row['riwayatsendiri3'];
    $merokok = $row['merokok'];
    $fisik = $row['fisik'];
    $gula = $row['gula'];
    $garam = $row['garam'];
    $lemak = $row['lemak'];
    $sayur = $row['sayur'];
    $alkohol = $row['alkohol'];
    $sistol = $row['sistol'];
    $diastol = $row['diastol'];
    $tinggi = $row['tinggi'];
    $berat = $row['berat'];
    $tinggi = $row['tinggi'];
    $lingkar = $row['lingkar'];
    $periksa_gula = $row['periksa_gula'];
   // Write to file 
   $dataPTM = array($no, $tanggal_pemeriksaan, $nik, $nama_lengkap,$ttl,$jenis_kelamin, $provinsi, $kota, $alamat,$tlp,$pendidikan,$pekerjaan,$status,$goldar,$riwayatkeluarga1, $riwayatkeluarga2, $riwayatkeluarga3,$riwayatsendiri1, $riwayatsendiri2, $riwayatsendiri3, $merokok, $fisik,$gula,$garam,$lemak,$sayur,$alkohol,$sistol,$diastol,$tinggi, $berat,$lingkar,$periksa_gula);
   fputcsv($file,$dataPTM); 
}
  
fclose($file);
  
// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; ");
  
readfile($filename);
  
// deleting file
unlink($filename);
exit();
?>