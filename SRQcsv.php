<?php
include "function.php";
$filename = 'LaporanSRQ'.date("Ymd").'.csv';
  
// Select query
$result = mysqli_query($koneksi, "SELECT * FROM riwayat");
$dataPTM = array();
// file creation
$file = fopen($filename,"w");
$no = 0;

// Header row - Remove this code if you don't want a header row in the export file.
$dataPTM = array("No", "Tanggal Pengisian","NIK","Nama Lengkap", "Tanggal Lahir", "Alamat", "No. Telepon", "Hasil Skrining", "Gejala"); 
fputcsv($file,$dataPTM); 
while($row = mysqli_fetch_array($result)){
    $no++;
    $tanggal_pengisian = $row['tanggal_pengisian'];
    $nik = $row['nik'];
    $nama_lengkap = $row['nama_lengkap'];
    $ttl = $row['ttl'];
    $alamat = $row['alamat'];
    $tlp = $row['tlp'];
    $penyakit = $row['penyakit'];
    $Gejala = $row['gejala'];
   // Write to file 
   $dataPTM = array($no, $tanggal_pengisian, $nik, $nama_lengkap,$ttl, $alamat,$tlp,$penyakit,$Gejala);
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