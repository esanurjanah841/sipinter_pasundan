<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menuPasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    $queryPasien = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
    $no=0;

    $filename = 'LaporanPTM'.date("Ymd").'.xls';
    header("Content-type: application/vnd-ms-excel");
    header("Content-disposition: attachment; filename=$filename");

?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Data PTM</h1>                    
        <div class="my-4"></div>
            <table border="1" width="100%" cellspacing="0" style="font-size: 14px;">
                <thead style="text-align:center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengisian</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Pekerjaan</th>
                        <th>Status Perkawinan</th>
                        <th>Golongan Darah</th>
                        <th>Riwayat Pada Keluarga 1</th>
                        <th>Riwayat Pada Keluarga 2</th>
                        <th>Riwayat Pada Keluarga 3</th>
                        <th>Riwayat Pada Sendiri 1</th>
                        <th>Riwayat Pada Sendiri 2</th>
                        <th>Riwayat Pada Sendiri 3</th>
                        <th>Merokok</th>
                        <th>Aktivitas Fisik</th>
                        <th>Konsumsi Gula</th>
                        <th>>Konsumsi Garam</th>
                        <th>Konsumsi Lemak</th>
                        <th>Konsumsi sayur dan buah</th>
                        <th>Konsumsi Alkohol</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Sistol</th>
                        <th>Diastol</th>
                        <th>Lingkar Perut</th>
                        <th>Pemeriksaan Gula Darah Sewaktu</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if (isset($_POST['filter'])) {
                    $tgl_a = mysqli_real_escape_string($koneksi, $_POST['tgl_a']);
                    $tgl_b = mysqli_real_escape_string($koneksi, $_POST['tgl_b']);
                    $data = mysqli_query($koneksi, "SELECT * FROM ptm_hasil WHERE tanggal_pemeriksaan BETWEEN '$tgl_a' AND '$tgl_b'");
                 } else{
                    $data = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
                 }
                
                while ($lihat = mysqli_fetch_assoc($data)) {
                    $no++; ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $lihat['tanggal_pengisian']; ?></td>
                        <td><?= $lihat['tanggal_pemeriksaan']; ?></td>
                        <td>'<?= $lihat['nik']; ?></td>
                        <td><?= $lihat['nama_lengkap']; ?></td>
                        <td><?= $lihat['ttl']; ?></td>
                        <td><?= $lihat['jenis_kelamin']; ?></td>
                        <td><?= $lihat['provinsi']; ?></td>
                        <td><?= $lihat['kota']; ?></td>
                        <td><?= $lihat['alamat']; ?></td>
                        <td>'<?= $lihat['tlp']; ?></td>
                        <td><?= $lihat['pendidikan']; ?></td>
                        <td><?= $lihat['pekerjaan']; ?></td>
                        <td><?= $lihat['status']; ?></td>
                        <td><?= $lihat['goldar']; ?></td>
                        <td><?= $lihat['riwayatkeluarga1']; ?></td>
                        <td><?= $lihat['riwayatkeluarga2']; ?></td>
                        <td><?= $lihat['riwayatkeluarga3']; ?></td>
                        <td><?= $lihat['riwayatsendiri1']; ?></td>
                        <td><?= $lihat['riwayatsendiri2']; ?></td>
                        <td><?= $lihat['riwayatsendiri3']; ?></td>
                        <td><?= $lihat['merokok']; ?></td>
                        <td><?= $lihat['fisik']; ?></td>
                        <td><?= $lihat['gula']; ?></td>
                        <td><?= $lihat['garam']; ?></td>
                        <td><?= $lihat['lemak']; ?></td>
                        <td><?= $lihat['sayur']; ?></td>
                        <td><?= $lihat['alkohol']; ?></td>
                        <td><?= $lihat['tinggi']; ?></td>
                        <td><?= $lihat['berat']; ?></td>
                        <td><?= $lihat['sistol']; ?></td>
                        <td><?= $lihat['diastol']; ?></td>
                        <td><?= $lihat['lingkar']; ?></td>
                        <td><?= $lihat['periksa_gula']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
</div>



</body>

</html>
