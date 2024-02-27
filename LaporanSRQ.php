<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    $queryPasien = mysqli_query($koneksi, "SELECT * FROM riwayat");
    $no=0;

    
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
                                            <th>No. BPJS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Hasil Skrining</th>
                                            <th>Gejala</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($data = mysqli_fetch_assoc($queryPasien)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['tanggal_pengisian']; ?></td>
                                            <td><?= $data['nik']; ?></td>
                                            <td><?= $data['bpjs']; ?></td>
                                            <td><?= $data['nama_lengkap']; ?></td>
                                            <td><?= $data['ttl']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['tlp']; ?></td>
                                            <td><?= $data['penyakit']; ?></td>
                                            <td><?= $data['gejala']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                           

   
<script>
 window.print();
</script>
</body>


</html>


