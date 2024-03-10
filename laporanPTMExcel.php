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
                <?php while ($data = mysqli_fetch_assoc($queryPasien)) {
                    $no++; ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['tanggal_pengisian']; ?></td>
                        <td><?= $data['tanggal_pemeriksaan']; ?></td>
                        <td><?= $data['nik']; ?></td>
                        <td><?= $data['nama_lengkap']; ?></td>
                        <td><?= $data['ttl']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td><?= $data['provinsi']; ?></td>
                        <td><?= $data['kota']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['tlp']; ?></td>
                        <td><?= $data['pendidikan']; ?></td>
                        <td><?= $data['pekerjaan']; ?></td>
                        <td><?= $data['status']; ?></td>
                        <td><?= $data['goldar']; ?></td>
                        <td><?= $data['riwayatkeluarga1']; ?></td>
                        <td><?= $data['riwayatkeluarga2']; ?></td>
                        <td><?= $data['riwayatkeluarga3']; ?></td>
                        <td><?= $data['riwayatsendiri1']; ?></td>
                        <td><?= $data['riwayatsendiri2']; ?></td>
                        <td><?= $data['riwayatsendiri3']; ?></td>
                        <td><?= $data['merokok']; ?></td>
                        <td><?= $data['fisik']; ?></td>
                        <td><?= $data['gula']; ?></td>
                        <td><?= $data['garam']; ?></td>
                        <td><?= $data['lemak']; ?></td>
                        <td><?= $data['sayur']; ?></td>
                        <td><?= $data['alkohol']; ?></td>
                        <td><?= $data['tinggi']; ?></td>
                        <td><?= $data['berat']; ?></td>
                        <td><?= $data['sistol']; ?></td>
                        <td><?= $data['diastol']; ?></td>
                        <td><?= $data['lingkar']; ?></td>
                        <td><?= $data['periksa_gula']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
</div>



</body>

</html>
