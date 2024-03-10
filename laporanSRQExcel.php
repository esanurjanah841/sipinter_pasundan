<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menuPasien.php");
        }
    } else {
        header("location:index.php");
    }
    

    $no=0;


    $filename = 'LaporanSRQ'.date("Ymd").'.xls';
    header("Content-type: application/vnd-ms-excel");
    header("Content-disposition: attachment; filename=$filename");

    if (isset($_POST{['filter']})) {
        $tgl_a = $_POST['tgl_a'];
        $tgl_b = $_POST['tgl_b'];
        $data = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE tanggal_pemeriksaan BETWEEN '$tgl_a' AND '$tgl_b'");
     } else{
        $data = mysqli_query($koneksi, "SELECT * FROM riwayat");
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Si Pinter</title>
    <link rel="icon" type="image/x-icon" href="gambar/favicon.ico" />

<style>
    body{
        font-size:12px;
    }
    table, th, td {
    border:1px solid;
    }
</style>
</head>

<body>

<h1 class="h3 mb-2 text-gray-800" style="text-align:center">Laporan Data SRQ</h1>                    
                                    <div class="my-4"></div>
                                <table border="1" style="width: 100%">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pengisian</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Hasil Skrining</th>
                                            <th>Gejala</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($ambil_data = mysqli_fetch_array($data)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $ambil_data['tanggal_pengisian']; ?></td>
                                            <td><?= $ambil_data['nik']; ?></td>
                                            <td><?= $ambil_data['nama_lengkap']; ?></td>
                                            <td><?= $ambil_data['ttl']; ?></td>
                                            <td><?= $ambil_data['alamat']; ?></td>
                                            <td><?= $ambil_data['tlp']; ?></td>
                                            <td><?= $ambil_data['penyakit']; ?></td>
                                            <td><?= $ambil_data['gejala']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                           
</body>


</html>